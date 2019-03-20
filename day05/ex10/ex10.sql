SELECT `title` AS 'Title', `summary` AS 'Summary', `prod_year`
FROM db_kkostrub.film
INNER JOIN db_kkostrub.genre ON db_kkostrub.film.id_genre = db_kkostrub.genre.id_genre
WHERE db_kkostrub.genre.name = 'erotic'
ORDER BY `prod_year` DESC;