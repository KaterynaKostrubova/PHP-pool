SELECT DATEDIFF(MAX(DATE(date)),  MIN(DATE(date))) AS 'uptime'
FROM db_kkostrub.member_history;