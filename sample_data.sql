
/*
SAMPLE DATA
Load database_gen.sql first!
Warning: This will clear out whatever is currently in your database!
*/

DELETE FROM game_list;
DELETE FROM review;
DELETE FROM game;
DELETE FROM gamer_banned;
DELETE FROM company;
DELETE FROM blogged;
DELETE FROM admins;
DELETE FROM news_item;
DELETE FROM friend_of;
DELETE FROM payment_info;
DELETE FROM gamer;
DELETE FROM game_reviewer;

/* broken, need to create admins first */

/*-----------------
	ADMINS
-----------------*/

INSERT INTO admins VALUES ("kta",
							"123456");

/*-----------------
	COMPANY
-----------------*/
INSERT INTO company VALUES ("Nintendo",
						"mario",
						"Japan",
						"kta",
						"Good");
						
INSERT INTO company VALUES ("Valve",
						"three",
						"America",
						"kta",
						"Active");

/*-----------------
	GAMES
-----------------*/

INSERT INTO game VALUES ( default,
				"Super Mario World -1", 
				24.99, 
				"Mario like you never seen before!", 
				'1998-04-01',
				"Platformer",
				'',
				'INSERTGAMEHERE',
				"Nintendo",
				"1.0");

				
INSERT INTO game VALUES ( default,
				"KingDeDeDe Adventures", 
				49.99, 
				"Guess who's back?", 
				'2015-02-12',
				"Action",
				'2015-04-01',
				'INSERTGAMEHERE',
				"Nintendo",
				"1.2");
				
INSERT INTO game VALUES ( default,
				"Half-Life 3", 
				999.99, 
				"Just kidding.", 
				'9999-12-31',
				"Everything",
				'',
				'INSERTGAMEHERE',
				"Valve",
				"3.3");
				
/*-----------------
	GAMERS
-----------------*/			
INSERT INTO gamer VALUES (	"Eternith",
							"hunter123",
							"Active" );
							
INSERT INTO gamer VALUES (	"bob",
							"123456",
							"Active");
							
/*-----------------
	GAME LIST
-----------------*/				

INSERT INTO game_list VALUES ( 	"bob",
								"1")				