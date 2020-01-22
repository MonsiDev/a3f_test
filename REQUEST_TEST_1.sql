SELECT id_user, COUNT(id_friends) AS ID_FRIENDS
FROM (
	SELECT id AS id_user,contact_id AS id_friends FROM contacts_friend JOIN contacts ON friend_id = id
	UNION
	SELECT id AS id_user,friend_id AS id_friends FROM contacts_friend JOIN contacts ON contact_id = id
  ) t
  GROUP BY id_user
  HAVING COUNT(id_friends) > 5;