SELECT
  db_kkostrub.film.id_genre AS 'id_genre', 
  db_kkostrub.genre.name AS 'name_genre', 
  db_kkostrub.film.id_distrib AS 'id_distrib', 
  db_kkostrub.distrib.name AS 'name_distrib', 
  db_kkostrub.film.title AS 'title_film'
FROM db_kkostrub.film LEFT JOIN db_kkostrub.distrib ON db_kkostrub.film.id_distrib = db_kkostrub.distrib.id_distrib 
  LEFT JOIN db_kkostrub.genre ON db_kkostrub.film.id_genre = db_kkostrub.genre.id_genre
WHERE db_kkostrub.film.id_genre BETWEEN 4 AND 8;