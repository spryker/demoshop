DROP SCHEMA IF EXISTS util CASCADE;

CREATE SCHEMA util;


-- adds a primary key to a table
CREATE FUNCTION util.add_pk(schema_name VARCHAR,
                            table_name  VARCHAR)
  RETURNS VOID AS $$
BEGIN
  EXECUTE 'ALTER TABLE ' || $1 || '.' || $2 ||
          ' ADD PRIMARY KEY (' || $2 || '_id);';
END;
$$ LANGUAGE 'plpgsql';


-- adds a unique constraint to a table
CREATE FUNCTION util.add_unique(schema_name VARCHAR,
                                table_name  VARCHAR,
                                column_name VARCHAR)
  RETURNS VOID AS $$
BEGIN
  RAISE NOTICE '.. adding unique index %', $2 || '__' || $3 || '_unique';
  EXECUTE 'CREATE UNIQUE INDEX ' || $2 || '__' || $3 || '_unique
                ON ' || $1 || '.' || $2 || ' (' || $3 || ');';
END;
$$ LANGUAGE 'plpgsql';


-- adds an index to a table
CREATE FUNCTION util.add_index(schema_name VARCHAR,
                               table_name  VARCHAR,
                               column_name VARCHAR)
  RETURNS VOID AS $$
BEGIN
  RAISE NOTICE '.. adding index %', $2 || '__' || $3;
  EXECUTE 'CREATE INDEX ' || $2 || '__' || $3 ||
          ' ON ' || $1 || '.' || $2 || ' (' || $3 || ');';
END;
$$ LANGUAGE 'plpgsql';


-- adds an index to a table if it does not exist yet
CREATE FUNCTION util.add_index_if_not_exists(schema_name VARCHAR,
                                             table_name  VARCHAR,
                                             column_name VARCHAR)
  RETURNS VOID AS $$
BEGIN
  IF NOT EXISTS(
      SELECT
        1
      FROM pg_class c
        JOIN pg_namespace n
          ON n.oid = c.relnamespace
      WHERE c.relname = $2 || '__' || $3
            AND n.nspname = $1
  )
  THEN

      PERFORM util.add_index($1, $2, $3);
  END IF;
END;
$$ LANGUAGE 'plpgsql';


-- adds a foreign key from on table to another table
-- if the other table is called foo, then for foreign key has
--  to be named foo_fk and the primary key foo_id
CREATE FUNCTION util.add_fk(schema_name        VARCHAR,
                            table_name         VARCHAR,
                            target_schema_name VARCHAR,
                            target_table_name  VARCHAR)
  RETURNS VOID AS $$
BEGIN
  EXECUTE 'ALTER TABLE ' || $1 || '.' || $2 ||
          ' ADD FOREIGN KEY (' || $4 || '_fk)' ||
          ' REFERENCES ' || $3 || '.' || $4 || ' (' || $4 || '_id);';
END;
$$ LANGUAGE 'plpgsql';


CREATE FUNCTION util.get_columns(schema_name VARCHAR,
                                 table_name  VARCHAR,
                                 pattern     VARCHAR)
  RETURNS SETOF VARCHAR AS $$
BEGIN
    RETURN QUERY EXECUTE 'SELECT column_name::VARCHAR
                          FROM information_schema.columns
                          WHERE table_catalog = (SELECT * from information_schema.information_schema_catalog_name)
                               AND table_schema = ' || quote_literal($1) || '
                               AND columns.table_name = ' || quote_literal($2) || '
                               AND column_name LIKE ' || quote_literal($3);
END;
$$ LANGUAGE 'plpgsql';


-- adds indexes to all foreign keys of a table (column name = '*_fk')
CREATE FUNCTION util.add_indexes_on_all_fks(schema_name VARCHAR,
                                            table_name  VARCHAR,
                                            every_nth   INTEGER DEFAULT 1,
                                            out_of      INTEGER DEFAULT 1
)
  RETURNS VOID AS $$
DECLARE
  row RECORD;
BEGIN
  FOR row IN
  SELECT
    column_name,
    ordinal_position
  FROM information_schema.columns
  WHERE table_catalog = (SELECT
                           *
                         FROM information_schema.information_schema_catalog_name)
        AND table_schema = $1
        AND columns.table_name = $2
        AND column_name LIKE '%_fk'
        AND ordinal_position % $4 = $3 - 1

  LOOP
    EXECUTE 'SELECT util.add_index(' || quote_literal($1) || ',' || quote_literal($2)
            || ',' || quote_literal(row.column_name) || ');';
  END LOOP;
END;
$$ LANGUAGE 'plpgsql';


-- adds indexes to all id columns of a table (column name = '*_id')
CREATE FUNCTION util.add_indexes_on_all_ids(schema_name VARCHAR,
                                            table_name  VARCHAR,
                                            every_nth   INTEGER DEFAULT 1,
                                            out_of      INTEGER DEFAULT 1
)
  RETURNS VOID AS $$
DECLARE
  row RECORD;
BEGIN
  FOR row IN
  SELECT
    column_name,
    ordinal_position
  FROM information_schema.columns
  WHERE table_catalog = (SELECT
                           *
                         FROM information_schema.information_schema_catalog_name)
        AND table_schema = $1
        AND columns.table_name = $2
        AND column_name LIKE '%_id'
        AND ordinal_position % $4 = $3 - 1

  LOOP
    EXECUTE 'SELECT util.add_index(' || quote_literal($1) || ',' || quote_literal($2)
            || ',' || quote_literal(row.column_name) || ');';
  END LOOP;
END;
$$ LANGUAGE 'plpgsql';


CREATE FUNCTION util.get_fk_columns(schema_name VARCHAR,
                                    table_name  VARCHAR)
  RETURNS SETOF VARCHAR AS $$
BEGIN
  RETURN QUERY EXECUTE 'SELECT column_name::VARCHAR
                          FROM information_schema.columns
                          WHERE table_catalog = (SELECT * from information_schema.information_schema_catalog_name)
                               AND table_schema = ' || quote_literal($1) || '
                               AND columns.table_name = ' || quote_literal($2) || '
                               AND column_name LIKE ''%_fk''';
END;
$$ LANGUAGE 'plpgsql';


-- replaces a schema with the tables from another schema
CREATE FUNCTION util.replace_schema(new_schema VARCHAR,
                                    old_schema VARCHAR)
  RETURNS VOID AS $$
DECLARE
  row RECORD;
BEGIN
  EXECUTE 'DROP SCHEMA IF EXISTS ' || $1 || ' CASCADE;';
  EXECUTE 'CREATE SCHEMA ' || $1 || ';';

  FOR row IN
  SELECT
    table_name
  FROM information_schema.tables
  WHERE table_schema = $2
        AND table_catalog = (SELECT
                               *
                             FROM information_schema.information_schema_catalog_name)
  LOOP
    EXECUTE 'ALTER TABLE ' || $2 || '.' || row.table_name ||
            ' SET SCHEMA ' || $1 || ';';
    EXECUTE 'ANALYZE ' || $1 || '.' || row.table_name || ';';
  END LOOP;

  EXECUTE 'DROP SCHEMA ' || $2 || ' CASCADE;';
END;
$$ LANGUAGE 'plpgsql';


-- move all tables from all dim schemas to a 'combined' schema for drawing
CREATE FUNCTION util.create_combined_schema_for_drawing()
  RETURNS VOID AS $$
DECLARE
  row RECORD;
BEGIN
  EXECUTE 'DROP SCHEMA IF EXISTS combined CASCADE;';
  EXECUTE 'CREATE SCHEMA combined;';

  FOR row IN
  SELECT
    table_name,
    table_schema
  FROM information_schema.tables
  WHERE table_catalog = (SELECT
                           *
                         FROM information_schema.information_schema_catalog_name)
        AND table_schema LIKE '%dim%'
  LOOP
    EXECUTE 'ALTER TABLE ' || row.table_schema || '.' || row.table_name ||
            ' SET SCHEMA combined;';
  END LOOP;

END;
$$ LANGUAGE 'plpgsql';


-- raises a warning when a boolean expression does not evaluate to t
CREATE FUNCTION util.assert(description VARCHAR, query VARCHAR)
  RETURNS BOOLEAN AS $$
DECLARE
  succeeded BOOLEAN;
BEGIN
  EXECUTE query
  INTO succeeded;
  IF NOT succeeded
  THEN
    RAISE WARNING 'assertion failed:
# % #
%', description, query;
  END IF;
  RETURN succeeded;
END
$$ LANGUAGE 'plpgsql';


-- raises a warning when the evaluation of two number-returning queries does not satisfy the given constraint
CREATE FUNCTION util.assert_relation(description VARCHAR,
                                     query1      VARCHAR, query2 VARCHAR,
                                     relation    VARCHAR)
  RETURNS BOOLEAN AS $$
DECLARE
  result1   NUMERIC;
  result2   NUMERIC;
  succeeded BOOLEAN;
BEGIN
  EXECUTE query1
  INTO result1;
  EXECUTE query2
  INTO result2;
  EXECUTE 'SELECT ' || result1 || ' ' || relation || ' ' || result2
  INTO succeeded;
  IF NOT succeeded
  THEN
    RAISE WARNING '%
assertion failed: % % %
%: (%)
%: (%)', description, result1, relation, result2, result1, query1, result2, query2;
  END IF;
  RETURN succeeded;
END
$$ LANGUAGE 'plpgsql';


-- raises a warning when the evaluation of two number-returning queries does not lead to the same result
CREATE FUNCTION util.assert_equal(description VARCHAR, query1 VARCHAR, query2 VARCHAR)
  RETURNS BOOLEAN AS $$
BEGIN
  RETURN util.assert_relation(description, query1, query2, '=');
END
$$ LANGUAGE 'plpgsql';


-- raises a warning when the evaluation of query is bigger than the result of query 2
CREATE FUNCTION util.assert_smaller_than_or_equal(description VARCHAR, query1 VARCHAR, query2 VARCHAR)
  RETURNS BOOLEAN AS $$
BEGIN
  RETURN util.assert_relation(description, query1, query2, '<=');
END
$$ LANGUAGE 'plpgsql';


-- raises a warning when the absolute difference between the evaluation
-- of two number-returning queries is bigger than a delta
CREATE FUNCTION util.assert_almost_equal(description VARCHAR,
                                         query1      VARCHAR,
                                         query2      VARCHAR,
                                         delta       DECIMAL)
  RETURNS BOOLEAN AS $$
DECLARE
  result1   NUMERIC;
  result2   NUMERIC;
  succeeded BOOLEAN;
BEGIN
  EXECUTE query1
  INTO result1;
  EXECUTE query2
  INTO result2;
  EXECUTE 'SELECT abs(' || result1 || ' - ' || result2 || ') < ' || delta
  INTO succeeded;
  IF NOT succeeded
  THEN
    RAISE WARNING '%
assertion failed: abs(% - %) < %
%: (%)
%: (%)', description, result1, result2, delta, result1, query1, result2, query2;
  END IF;
  RETURN succeeded;
END
$$ LANGUAGE 'plpgsql';


-- returns the foreign key into the dim.day table for yesterday
CREATE FUNCTION util.yesterday()
  RETURNS INTEGER AS $$
BEGIN
  RETURN to_char('yesterday' :: TIMESTAMP WITH TIME ZONE, 'YYYYMMDD') :: INTEGER;
END
$$ LANGUAGE 'plpgsql';


-- returns the foreign key into the dim.day table for 2 days ago
CREATE FUNCTION util.the_day_before_yesterday()
  RETURNS INTEGER AS $$
BEGIN
  RETURN to_char('yesterday' :: TIMESTAMP WITH TIME ZONE - INTERVAL '1 day', 'YYYYMMDD') :: INTEGER;
END
$$ LANGUAGE 'plpgsql';
