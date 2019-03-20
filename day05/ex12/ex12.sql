SELECT `last_name`, `first_name`
FROM db_kkostrub.user_card
WHERE `last_name` LIKE '%-%' OR `first_name` LIKE '%-%'
ORDER BY `first_name`, `last_name`;