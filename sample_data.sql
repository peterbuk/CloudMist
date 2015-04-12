
/*
SAMPLE DATA
Load database_gen.sql first!
Warning: This will clear out whatever is currently in your database!
*/

DELETE FROM game_list;
DELETE FROM review;
DELETE FROM game;
DELETE FROM company;
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
						"Approved");
						
INSERT INTO company VALUES ("Valve",
						"three",
						"America",
						"kta",
						"Approved");
						
INSERT INTO company VALUES ("Newbies",
							"12356",
							"Canada",
							null,
							"Pending");
						
/*-----------------
	NEWS_ITEM
-----------------*/

INSERT INTO news_item VALUES ( default,
								"test blog please ignore",
								"Please stop reading!",
								'2015-03-25 8:45:25',
								"kta");

INSERT INTO news_item VALUES ( default,
								"Welcome to CloudMist!",
								"Welcome to our new platform, we hope you enjoy!",
								'2015-04-10 12:00:00',
								"kta");

/*-----------------
	GAME
-----------------*/

INSERT INTO game VALUES ( default,
				"Super Mario World -1", 
				24.99, 
				"Mario like you never seen before!", 
				'1998-04-01',
				"Platformer",
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
				'INSERTGAMEHERE',
				"Valve",
				"3.3");
				
/*-----------------
	GAMER
-----------------*/			
INSERT INTO gamer VALUES (	"Eternith",
							"hunter123",
							"Active",
							null);
							
INSERT INTO gamer VALUES (	"bob",
							"123456",
							"Active",
							null);

INSERT INTO gamer VALUES (	"cindy",
							"123456",
							"Banned",
							"kta");

INSERT INTO gamer VALUES (	"alice",
							"123456",
							"Active",
							null);							
/*-----------------
	FRIEND_OF
-----------------*/		

INSERT INTO friend_of VALUES ( "Eternith",
								"bob");
								
INSERT INTO friend_of VALUES ( "alice",
								"cindy");
								
INSERT INTO friend_of VALUES ( "cindy",
								"alice");
								
INSERT INTO friend_of VALUES ( "cindy",
								"bob");								
/*-----------------
	GAME LIST
-----------------*/				

INSERT INTO game_list VALUES ( 	"bob",
								"1");

/*-----------------
	PAYMENT_INFO
-----------------*/	

INSERT INTO payment_info VALUES ( "1234567812341234",
							"12 Main Street",
							"Eternith");

/*-----------------
	GAME_REVIEWER
-----------------*/	

INSERT INTO game_reviewer VALUES ( "gamestop",
									"123456" );

/*-----------------
	REVIEW
-----------------*/	

INSERT INTO review VALUES ( default,
							"THIS GAME IS AWESOME 10/10",
							10,
							1,
							"gamestop");