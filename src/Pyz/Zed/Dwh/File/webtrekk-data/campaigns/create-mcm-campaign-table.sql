CREATE TABLE webtrekk_tmp.mcm_campaign (
  wmc              INTEGER PRIMARY KEY,
  publication_id   SMALLINT,
  publication_name VARCHAR(126) NOT NULL,
  partner_id       SMALLINT     NOT NULL,
  partner_name     VARCHAR(126) NOT NULL
);


