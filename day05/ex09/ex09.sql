SELECT COUNT(*) AS 'nb_short-films'
FROM db_kkostrub.film
WHERE `duration` <= 42;