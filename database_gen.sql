CREATE DATABASE cloud_mist;
USE cloud_mist;

DROP TABLE IF EXISTS game;
CREATE TABLE game ( game_id INT, 
					name VARCHAR(100), 
					price FLOAT,
					description VARCHAR(500),
					release_date DATE,
					genre VARCHAR(20),
					on_sale DATE,
					game_data BLOB,
					c_name VARCHAR(30),
					patch_version VARCHAR(10),
					PRIMARY KEY (game_id),
					FOREIGN KEY (c_name) REFERENCES company (c_name)
				  );

DROP TABLE IF EXISTS company;
CREATE TABLE company (	c_name VARCHAR (30),
						location VARCHAR (30),
						status VARCHAR (10),
						a_user VARCHAR (20),
						PRIMARY KEY (c_name),
						FOREIGN KEY (a_user) REFERENCES admins (a_user) 
					 );
					 
DROP TABLE IF EXISTS c_banned;
CREATE TABLE c_banned (	a_user VARCHAR (20),
						c_name VARCHAR (30),
						PRIMARY KEY (a_user, c_name),
						FOREIGN KEY (a_user) REFERENCES admins (a_user),
						FOREIGN KEY (c_name) REFERENCES company (c_name)
						);
					 
DROP TABLE IF EXISTS admins;
CREATE TABLE admins (		
					 );











INSERT INTO employees (id, first_name, last_name) VALUES (1, 'John', 'Doe');
INSERT INTO employees (id, first_name, last_name) VALUES (2, 'Bob', 'Smith');
INSERT INTO employees (id, first_name, last_name) VALUES (3, 'Jane', 'Doe');
SELECT * FROM employees;


