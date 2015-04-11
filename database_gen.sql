CREATE DATABASE cloud_mist;
USE cloud_mist;


DROP TABLE IF EXISTS admins;
CREATE TABLE admins (	a_user VARCHAR(20) NOT NULL,
						password VARCHAR(20) NOT NULL,
						PRIMARY KEY (a_user)
					 );		

DROP TABLE IF EXISTS company;
CREATE TABLE company (	c_name VARCHAR(30) NOT NULL,
						password VARCHAR(20) NOT NULL,
						location VARCHAR(30),
						a_user VARCHAR(20),
						status VARCHAR(10) NOT NULL,
						PRIMARY KEY (c_name),
						FOREIGN KEY (a_user) REFERENCES admins (a_user)
					 );
					 


DROP TABLE IF EXISTS news_item;
CREATE TABLE news_item (	article_no int AUTO_INCREMENT NOT NULL,
							title VARCHAR(30) NOT NULL,
							content TEXT,
							date_written DATETIME,
							a_user VARCHAR(20) NOT NULL,
							FOREIGN KEY (a_user) REFERENCES admins (a_user),
							PRIMARY KEY (article_no)
						);
				
		
DROP TABLE IF EXISTS game;
CREATE TABLE game ( game_id INT AUTO_INCREMENT NOT NULL, 
					name VARCHAR(100) NOT NULL, 
					price FLOAT(4,2) NOT NULL,
					description TEXT,
					release_date DATE,
					genre VARCHAR(20),
					on_sale DATE,
					game_data BLOB,
					c_name VARCHAR(30) NOT NULL,
					patch_version VARCHAR(10),
					PRIMARY KEY (game_id),
					FOREIGN KEY (c_name) REFERENCES company (c_name)
				  );


DROP TABLE IF EXISTS gamer;
CREATE TABLE gamer (	g_user VARCHAR(20) NOT NULL, 
						password VARCHAR(20) NOT NULL, 
						status VARCHAR(10) NOT NULL, 
						a_user VARCHAR(20),
						FOREIGN KEY (a_user) REFERENCES admins (a_user),
						PRIMARY KEY (g_user)
					);

					
DROP TABLE IF EXISTS friend_of;
CREATE TABLE friend_of (	f1_user VARCHAR(20) NOT NULL, 
							f2_user VARCHAR(20)  NOT NULL, 
							PRIMARY KEY (f1_user, f2_user),
							FOREIGN KEY (f1_user) REFERENCES gamer (g_user),
							FOREIGN KEY (f2_user) REFERENCES gamer (g_user)
						);
						
DROP TABLE IF EXISTS game_list;
CREATE TABLE game_list (	g_user VARCHAR(20) NOT NULL,
							game_id INT NOT NULL, 
							PRIMARY KEY(g_user, game_id),
							FOREIGN KEY (g_user) REFERENCES gamer(g_user),
							FOREIGN KEY (game_id) REFERENCES game(game_id)
						);
						

DROP TABLE IF EXISTS payment_info;
CREATE TABLE payment_info (	credit_card VARCHAR(20) NOT NULL,
							billing_address VARCHAR(100) NOT NULL,
							g_user VARCHAR(20) NOT NULL,
							PRIMARY KEY (credit_card, g_user),
							FOREIGN KEY (g_user) REFERENCES gamer (g_user)
							);
							
DROP TABLE IF EXISTS game_reviewer;
CREATE TABLE game_reviewer (	r_user VARCHAR(20) NOT NULL,
								password VARCHAR(20) NOT NULL,
								PRIMARY KEY (r_user)
							);	

DROP TABLE IF EXISTS review;
CREATE TABLE review (	review_no int AUTO_INCREMENT,
						content TEXT NOT NULL,
						score int NOT NULL,
						game_id int NOT NULL,
						r_user VARCHAR(20) NOT NULL,
						PRIMARY KEY (review_no),
						FOREIGN KEY (game_id) REFERENCES game (game_id),
						FOREIGN KEY (r_user) REFERENCES game_reviewer (r_user)
					);
