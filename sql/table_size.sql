#size of all table in database
SELECT
  TABLE_SCHEMA AS `Database`,
  TABLE_NAME AS `Table`,
  ROUND((DATA_LENGTH + INDEX_LENGTH) / 1024) AS `Size (KB)`
FROM
  information_schema.TABLES
WHERE
	TABLE_SCHEMA = "dispecer_taskuri"
ORDER BY
  (DATA_LENGTH + INDEX_LENGTH)
DESC;
