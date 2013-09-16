CREATE TABLE mailchimp_tmp.list (
  list_id     INTEGER      NOT NULL,
  original_id VARCHAR(126) NOT NULL
);

CREATE TABLE mailchimp_dim_next.list (
  list_id    INTEGER PRIMARY KEY,
  list_name  VARCHAR(126) NOT NULL,
  created_at INTEGER,
  times      INTEGER
);


CREATE TABLE mailchimp_dim_next.list_activity (
  list_activity_id INTEGER NOT NULL,
  list_fk          INTEGER NOT NULL,
  recipient_fk     INTEGER NOT NULL,
  confirm_time     INTEGER,
  lat              VARCHAR(126),
  lon              VARCHAR(126),
  country          VARCHAR(126),
  region           VARCHAR(126)
);
