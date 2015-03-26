DROP TABLE IF EXISTS gamer;
CREATE TABLE gamer (
	g_user VARCHAR(20), 
	password VARCHAR(20), 
	status VARCHAR(10), 
	PRIMARY KEY (g_user)
	);

DROP TABLE IF EXISTS friend_of;
CREATE TABLE friend_of (f1_user VARCHAR(20), f2_user VARCHAR(20), FOREIGN KEY (f2_uer) REFERENCES
