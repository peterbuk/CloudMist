
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


/*-----------------
	ADMINS
-----------------*/

INSERT INTO admins VALUES ("kta",
							"123456");
							
INSERT INTO admins VALUES ("collier",
							"123456");

/*-----------------
	COMPANY
-----------------*/
INSERT INTO company VALUES ("Nintendo",
						"123456",
						"Japan",
						"kta",
						"Approved");
						
INSERT INTO company VALUES ("Valve",
						"123456",
						"America",
						"kta",
						"Approved");
				
INSERT INTO company VALUES ("Boom Games",
							"123456",
							"Canada",
							"collier",
							"Approved");
							
INSERT INTO company VALUES ("MiSoNi",
							"123456",
							"Antarctica",
							"collier",
							"Approved");
							
INSERT INTO company VALUES ("IamIndie",
							"123456",
							"Canada",
							null,
							"Pending");
						
/*-----------------
	NEWS_ITEM
-----------------*/

INSERT INTO news_item VALUES ( default,
								"New Game",
								"From the two man team of Boom Games, they present their first game, BombBot! A potential friendship breaking game about collaboration.",
								'2015-04-12 09:00:00',
								"kta");

INSERT INTO news_item VALUES ( default,
								"Hello World",
								"I am your new admin, collier. Bow down before me. Jk. I will not misuse my banhammer...yet.",
								'2015-03-30 16:00:00',
								"collier");
								
INSERT INTO news_item VALUES ( default,
								"New Game: Button Mash!",
								"We are not responsible for any broken controllers or keyboards.",
								'2015-02-11 09:00:00',
								"kta");
								
INSERT INTO news_item VALUES ( default,
								"New Game: Half-Life 3",
								"April Fools!",
								'2015-04-01 09:00:00',
								"kta");
								
INSERT INTO news_item VALUES ( default,
								"Scheduled Maintenance",
								"We are set for our yearly maintenance tonight. We expect the system to be down for somewhere between 2 hours to 124 hours. Depending if Joe spills his coffee on the server again or not. Thank you for your paitence.",
								'2015-04-20 09:00:00',
								"kta");
								
INSERT INTO news_item VALUES ( default,
								"test blog please ignore",
								"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at nunc eu felis aliquet venenatis eu sit amet erat. Sed blandit, metus quis semper consequat, dui dui lacinia diam, vel elementum quam sapien sit amet velit. Nunc auctor felis id neque vehicula tempor. Vestibulum non felis in elit feugiat commodo. Aenean mattis interdum lectus. Quisque posuere vestibulum risus, non blandit velit varius eu. Pellentesque varius tincidunt luctus. Fusce convallis at magna vel tincidunt.",
								'2011-01-04 12:00:00',
								"kta");

INSERT INTO news_item VALUES ( default,
								"Welcome to CloudMist!",
								"Welcome to our new game platform, we hope you enjoy!",
								'2011-01-11 12:00:00',
								"kta");
								


/*-----------------
	GAME
-----------------*/

INSERT INTO game VALUES ( default,
				"Super Deluxe Mega Mario Party Kart World 5", 
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
				'INSERTGAMEHERE',
				"Nintendo",
				"1.2");
				
INSERT INTO game VALUES ( default,
				"Portal: You can (not) Escape", 
				59.99, 
				"The never ending portal.", 
				'2014-05-11',
				"Puzzle",
				'INSERTGAMEHERE',
				"Valve",
				"2.1");
				
INSERT INTO game VALUES ( default,
				"Right 5 Live", 
				39.99, 
				"The Angel invasion comtinues!", 
				'2012-11-23',
				"Adventure",
				'INSERTGAMEHERE',
				"Valve",
				"2.1");
				
INSERT INTO game VALUES ( default,
				"Half-Life 3", 
				999.99, 
				"Just kidding.", 
				'9999-12-31',
				"Action",
				'INSERTGAMEHERE',
				"Valve",
				"3.3");
				
INSERT INTO game VALUES ( default,
				"Dot Set", 
				1.99, 
				"Simple puzzle game beep boop.", 
				'2014-04-10',
				"Puzzle",
				'INSERTGAMEHERE',
				"MiSoNi",
				"0.2");
				
INSERT INTO game VALUES ( default,
				"Jump Quest", 
				1.99, 
				"Jump! Just do it!", 
				'2012-08-16',
				"Platformer",
				'INSERTGAMEHERE',
				"MiSoNi",
				"0.5");
				
INSERT INTO game VALUES ( default,
				"First Fantasy", 
				10.99, 
				"Before the final comes the first", 
				'2014-09-1',
				"RPG",
				'INSERTGAMEHERE',
				"MiSoNi",
				"0.7");
				
INSERT INTO game VALUES ( default,
				"Button Mash", 
				0.99, 
				"Just like any other fighting game.", 
				'2015-02-11',
				"Fighting",
				'INSERTGAMEHERE',
				"MiSoNi",
				"5.1");
				
INSERT INTO game VALUES ( default,
				"BombBot", 
				0.99, 
				"Collborative bomb defusing game", 
				'2015-04-12',
				"Strategy",
				'INSERTGAMEHERE',
				"Boom Games",
				"1.0");
				
/*-----------------
	GAMER
-----------------*/			
INSERT INTO gamer VALUES (	"Eternith",
							"123456",
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

INSERT INTO gamer VALUES (	"Yipster",
							"123456",
							"Active",
							null);

							
/*-----------------
	FRIEND_OF
-----------------*/		

INSERT INTO friend_of VALUES ( "Eternith",
								"Yipster");
								
INSERT INTO friend_of VALUES ( "Yipster",
								"Eternith");
								
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
								
INSERT INTO game_list VALUES ( 	"bob",
								"2");
								
INSERT INTO game_list VALUES ( 	"bob",
								"3");
								
INSERT INTO game_list VALUES ( 	"bob",
								"5");
								
INSERT INTO game_list VALUES ( 	"bob",
								"7");
								
INSERT INTO game_list VALUES ( 	"bob",
								"9");

INSERT INTO game_list VALUES ( 	"Eternith",
								"4");
								
INSERT INTO game_list VALUES ( 	"Eternith",
								"10");
								
INSERT INTO game_list VALUES ( 	"Yipster",
								"3");
								
INSERT INTO game_list VALUES ( 	"Yipster",
								"4");
								
INSERT INTO game_list VALUES ( 	"Yipster",
								"8");
								
INSERT INTO game_list VALUES ( 	"Yipster",
								"9");
/*-----------------
	PAYMENT_INFO
-----------------*/	

INSERT INTO payment_info VALUES ( "1234567812341234",
							"12 Main Street",
							"bob");
							
INSERT INTO payment_info VALUES ( "1234567812341234",
							"612 Ghetto Lands",
							"Eternith");
							
INSERT INTO payment_info VALUES ( "1234567812341234",
							"5132 EdgeofCity Way",
							"Yipster");

/*-----------------
	GAME_REVIEWER
-----------------*/	

INSERT INTO game_reviewer VALUES ( "gamestop",
									"123456" );
									
INSERT INTO game_reviewer VALUES ( "game-rants-r-us",
									"123456" );
									
INSERT INTO game_reviewer VALUES ( "fuyu",
									"123456" );

/*-----------------
	REVIEW
-----------------*/	

INSERT INTO review VALUES ( default,
							"I feel like I've played this game before. Must be nostalgia",
							9,
							1,
							"gamestop");
							
INSERT INTO review VALUES ( default,
							"An amazing spinoff to the successful Portal series.",
							9,
							3,
							"gamestop");
							
INSERT INTO review VALUES ( default,
							"Am I dreaming?",
							9,
							5,
							"gamestop");
							
INSERT INTO review VALUES ( default,
							"Creative game that almost sounds like a school project",
							7,
							10,
							"gamestop");
							
INSERT INTO review VALUES ( default,
							"NINTENDO PLS THIS GAME IS SUCH A RIPOFF! I WANT MY MONEY BACK",
							1,
							1,
							"game-rants-r-us");	

INSERT INTO review VALUES ( default,
							"The only adventure this game will have is to the discount bin",
							1,
							2,
							"game-rants-r-us");	

INSERT INTO review VALUES ( default,
							"The easiest way to escape is ALT+F4.",
							1,
							3,
							"game-rants-r-us");	

INSERT INTO review VALUES ( default,
							"I don't want to live anymore in a world with this game",
							1,
							4,
							"game-rants-r-us");		

INSERT INTO review VALUES ( default,
							"HAHAHA VERY FUNNY VALVE",
							1,
							5,
							"game-rants-r-us");	

INSERT INTO review VALUES ( default,
							"Simple enough for 2 year olds to enjoy!",
							1,
							6,
							"game-rants-r-us");		

INSERT INTO review VALUES ( default,
							"coughMarioClonecough",
							1,
							7,
							"game-rants-r-us");	

INSERT INTO review VALUES ( default,
							"Even worst than FF14.",
							1,
							8,
							"game-rants-r-us");	
							
INSERT INTO review VALUES ( default,
							"ABABABABABABBABB you win!",
							1,
							9,
							"game-rants-r-us");	
							
INSERT INTO review VALUES ( default,
							"I wish the game would actually explode.",
							1,
							10,
							"game-rants-r-us");	