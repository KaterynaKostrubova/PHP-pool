SELECT UCASE(`last_name`) AS 'NAME', `first_name`, db_kkostrub.subscription.price
FROM db_kkostrub.member 
JOIN db_kkostrub.subscription ON db_kkostrub.member.id_sub = db_kkostrub.subscription.id_sub
JOIN db_kkostrub.user_card ON db_kkostrub.user_card.id_user = db_kkostrub.member.id_user_card
WHERE db_kkostrub.subscription.price > 42
ORDER BY `last_name` ASC, `first_name` ASC;