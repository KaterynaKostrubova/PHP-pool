SELECT `title`, `summary`
FROM db_kkostrub.film
WHERE LCASE(`summary`) LIKE LCASE('%Vincent%')
ORDER BY `id_film` ASC;
