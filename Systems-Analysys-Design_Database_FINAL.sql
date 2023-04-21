-- DROP DATABASE IF EXISTS DishMonitoring;
CREATE DATABASE DishMonitoring;
USE DishMonitoring;

CREATE TABLE user(
	id int NOT NULL auto_increment primary key,
    userTypeID int NOT NULL,
    firstName VARCHAR(20) NOT NULL,
    lastName VARCHAR(20) NOT NULL,
    phone VARCHAR(10) NOT NULL,
    email VARCHAR(100) NOT NULL,
    address VARCHAR(20) NOT NULL,
    city VARCHAR(20) NOT NULL,
    state VARCHAR(2) NOT NULL,
    zip VARCHAR(5) NOT NULL,
    password VARCHAR(20) NOT NULL,
    isActive boolean );
    
CREATE TABLE monitor(
	id int NOT NULL auto_increment primary key,
    userID int NOT NULL,
    animalCount int NULL, 
    foodWeightFull double NOT NULL,
    foodWeightEmpty float NOT NULL,
    foodLevelAlert float NOT NULL,
    waterWeightFull float NOT NULL,
    waterWeightEmpty float NOT NULL,
    waterLevelAlert float NOT NULL,
    feedingTime datetime NULL,
    timeBetweenFeedings int NULL, -- hours!
    animalType int NOT NULL, -- set a temporary "type" if type not in system yet
    location VARCHAR(30) NULL,
    notes VARCHAR(300) not null,
    feedType VARCHAR(30) NULL );
    
CREATE TABLE monitorHistory (
	id int not null auto_increment primary key,
	monitorID int not null,
    foodLevel float not null,
    waterLevel float not null,
    dateTimeChecked datetime not null -- DEFAULT NOW   
    );
    ALTER TABLE monitorHistory
    CHANGE COLUMN foodLevel foodLevel float DEFAULT NULL, CHANGE COLUMN waterLevel waterLevel float DEFAULT NULL;
CREATE TABLE weatherRelay(
	id int NOT NULL auto_increment primary key,
	degrees double NOT NULL,
    expectedAlert VARCHAR(50) NULL, -- clear info if no weather alert present
	city VARCHAR(20) NOT NULL, 
    state VARCHAR(20) NOT NULL,
    zip VARCHAR(5) NOT NULL 
    );
CREATE TABLE weatherHistory(
	id int not null auto_increment primary key,
    relayID int not null,
	degrees double NOT NULL, -- default Fahrenheit
    expectedAlert VARCHAR(50) NULL, -- null if no weather alert present
	timeDateChecked datetime not null   
    );
    
CREATE TABLE animalType(
	id int NOT NULL auto_increment primary key,
	description VARCHAR(15) NOT NULL, -- type of animal, common name - Quail, Chicken, dog...?
	recommendedFood VARCHAR(100) NULL
);
    
 CREATE TABLE userType(
	id int NOT NULL auto_increment primary key,
	description VARCHAR(15) NOT NULL
 );
    
DROP USER IF EXISTS lk_main@localhost;
CREATE USER lk_main@localhost IDENTIFIED BY 'progress';
GRANT SELECT, INSERT, DELETE, UPDATE
ON DishMonitoring.*
TO lk_main@localhost;
    
    
INSERT INTO userType VALUES
	(1, 'User'),
    (2, 'ADMIN');
    
    
INSERT INTO animalType VALUES
	(1, 'Quail', 'all-flock style solid pelets or course ground pelets'),
	(2, 'Chicken', 'all-flock or medicated chicken blend'),
    (3, 'Rabbit', 'Misc. Rabbit-blend pellets with officional vegetables as treats');

INSERT INTO weatherRelay VALUES
	(1, 28, 'SNOW WARNING', 'conrath', 'WI', '11111'),
	(2, 25, '', 'Ladysmith', 'WI', '11112'),
	(3, 58, 'LOW UV', 'Miami', 'FL', '23456'),
    (4, 37, 'SNOW WARNING', 'conrath', 'WI', '54731');
    
INSERT INTO user VALUES
	(1, 2, 'Lionel', 'Klein', '7155670410', '17083585@northwoodtech.edu', 'W8366', 'conrath', 'WI', '54731', 'testPass23', 1),
	(2, 1, 'Hank', 'Klein',  '7155670410', '17083585@northwoodtech.edu', 'W8366', 'conrath', 'WI', '54731', 'testPass25', 0),
	(3, 1, 'test', 'test2', '1234567890',  '17083585@northwoodtech.edu', '12345', 'NOTOWN', 'WI', '12345', 'testPass200', 0),
	(4, 1, 'anotherTest', 'stillTest', '1234567890', '17083585@northwoodtech.edu', '23456', 'NOTOWN', 'FL', '23456', 'noRealPass', 1),
	(5, 2, 'yetAnotherTest', 'stillTest', '1234567890', '17083585@northwoodtech.edu', '45678', 'NOTOWN', 'WI', '09876', 'notAPass', 0);

INSERT INTO monitor VALUES
	(1, 2, 12, 8.2, 0.2, 27.38, 8.2, 0.2, 53.42, '2023-1-29 17:25', '24', 1, 'Porch', '', NULL),
	(2, 3, 3, 8.2, 0.2, 78.83, 8.2, 0.2, 68.24, '2023-1-29 14:00', '24', 3, 'Living Room', '', "Rabbit Mix"),
	(3, 3, 7, 8.2, 0.2, 100, 8.2, 0.2, 100, '2023-1-29 14:00', '24', 2, NULL, '', NULL);
INSERT INTO monitorHistory VALUES
		(1, 1, 40.23, 31.93,  NOW()),
        (2, 2, 37.24, 78.32,  NOW()),
        (3, 3, 98.03, 76.25,  NOW());
INSERT INTO weatherHistory VALUES
			(1, 1, 28, "SNOW WARNING", NOW()),
            (2, 2, 25, "", NOW()),
            (3, 3, 58, "LOW UV", NOW()),
            (4, 4, 28, "SNOW WARNING", NOW());
    
    USE DishMonitoring;
    select * from user;
  SELECT * FROM monitor RIGHT JOIN monitorHistory on monitor.id = (SELECT monitorHistory.monitorID FROM monitorHistory WHERE monitor.id = monitorHistory.monitorID ORDER BY monitorHistory.monitorID LIMIT 1) ORDER BY monitor.userID ASC;
    
    INSERT INTO weatherHistory(relayID, degrees, expectedAlert, timeDateChecked) SELECT id, degrees, expectedAlert, NOW() FROM weatherRelay;
    select * FROM weatherHistory;
    INSERT INTO monitorHistory(monitorID, foodLevel, waterLevel, dateTimeChecked) SELECT id, foodLevelAlert, waterLevelAlert, NOW() FROM monitor;
    select * from monitorHistory;
    
   USE DishMonitoring; 
SELECT weatherHistory.relayID, weatherHistory.degrees, weatherHistory.expectedAlert,
 timeDateChecked FROM weatherHistory INNER JOIN weatherRelay ON
 weatherHistory.relayID = weatherRelay.id WHERE weatherRelay.city = "conrath"
 AND weatherRelay.state = "WI" AND weatherRelay.zip = "54731" ORDER BY 
 weatherHistory.timeDateChecked DESC LIMIT 1;

	SELECT * FROM user;
    
    SELECT * FROM monitor RIGHT JOIN monitorHistory on monitor.id = monitorHistory.monitorID WHERE userID = 3 ORDER BY monitorHistory.dateTimeChecked, userID;
    SELECT * FROM weatherRelay;
    SELECT * FROM weatherHistory;
    SELECT weatherHistory.relayID, weatherHistory.degrees, weatherHistory.expectedAlert, timeDateChecked FROM weatherHistory INNER JOIN weatherRelay ON weatherHistory.relayID = weatherRelay.id ORDER BY weatherHistory.timeDateChecked DESC LIMIT 1;
   SELECT * FROM monitor RIGHT JOIN monitorHistory on monitor.id = monitorHistory.monitorID WHERE dateTimeChecked = (SELECT MAX(dateTimeChecked) FROM monitorHistory) ORDER BY userID,  monitorHistory.dateTimeChecked;

    
    