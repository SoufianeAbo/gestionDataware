-- create database if it doesn't exist, and use it
CREATE DATABASE IF NOT EXISTS dataware;
USE dataware;

-- create the teams table if it doesn't exist
-- id is an int that auto increments by 1
-- name is a string
-- date creation is a date formatted like 0000-00-00
CREATE TABLE IF NOT EXISTS teams(
                                id INT AUTO_INCREMENT PRIMARY KEY,
                                name varchar(50), 
                                dateCreation date
                                );

-- create the employee table if it doesn't exist
-- same with above, no difference
CREATE TABLE IF NOT EXISTS employee(
                                id INT AUTO_INCREMENT PRIMARY KEY,
                                name varchar(50), 
                                lastName varchar(50),
                                email varchar(50),
                                phone varchar(50),
                                role varchar(50),
                                team varchar(50),
                                status varchar(50)
                                );

-- show the tables
SELECT * FROM teams;
SELECT * FROM employee;

-- this allows adding data to the employee table by using INSERT INTO VALUES()
-- id isn't here because it automatically increments
INSERT INTO employee(name, lastName, email, phone, role, team, status)
VALUES("Zouheir", "Rhoumri", "zouheirrhoumri@gmail.com", "+212 61 129 9210", "Directeur des opérations", 1, "Congé");

-- this allows adding data to the teams table
INSERT INTO teams(name, dateCreation)
VALUES("NightCrawler", "2023-09-20");

-- this is the joining between employees and teams
-- also adding alias to employee and teams because they have the same name
SELECT employee.id, employee.name AS employee_name, employee.lastName, employee.email, employee.phone, employee.role, employee.team, employee.status, teams.name AS teams_name, teams.dateCreation
FROM employee
INNER JOIN teams ON employee.team=teams.id;