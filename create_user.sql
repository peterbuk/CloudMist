CREATE USER 'user'@'localhost' IDENTIFIED BY 'root';
GRANT ALL PRIVILEGES ON * . * TO 'user'@'root';
FLUSH PRIVILEGES;	/* reload privileges */