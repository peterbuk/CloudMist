
/*
SAMPLE DATA
Load database_gen.sql first!
Warning: This will clear out whatever is currently in your database!
*/

DELETE FROM game;
DELETE FROM company;

INSERT INTO company VALUES ("Nintendo",
						"Japan",
						"Good");
						
INSERT INTO company VALUES ("Valve",
						"America",
						"Good");


INSERT INTO game VALUES (1, 
				"Super Mario World -1", 
				24.99, 
				"Mario like you never seen before!", 
				'1998-04-01',
				"Platformer",
				'',
				'INSERTGAMEHERE',
				"Nintendo",
				"1.0");
				
INSERT INTO game VALUES (2, 
				"KingDeDeDe Adventures", 
				49.99, 
				"Guess who's back?", 
				'2015-02-12',
				"Action",
				'2015-04-01',
				'INSERTGAMEHERE',
				"Nintendo",
				"1.2");
				
INSERT INTO game VALUES (3, 
				"Half-Life 3", 
				999.99, 
				"Just kidding.", 
				'9999-12-31',
				"Everything",
				'',
				'INSERTGAMEHERE',
				"Valve",
				"3.3");