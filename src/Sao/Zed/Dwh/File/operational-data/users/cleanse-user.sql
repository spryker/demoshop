UPDATE tmp.user
SET created_at = last_modified
WHERE created_at IS NULL;