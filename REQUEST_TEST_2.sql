SELECT DISTINCT CONCAT('(', LEAST(f1.contact_id, f2.contact_id), ',', GREATEST(f1.friend_id, f2.friend_id), ')') AS RFW
FROM  contacts_friend f1 
join  contacts_friend f2 on  f1.contact_id = f2.friend_id  and f1.friend_id = f2.contact_id where f1.contact_id in (select id from contacts);