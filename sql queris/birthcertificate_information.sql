-- Create the database if it doesn't exist
CREATE DATABASE IF NOT EXISTS birthcertificate_db;
USE birthcertificate_db;

-- Create the birthcertificate_information table
CREATE TABLE IF NOT EXISTS birthcertificate_information (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Name_of_the_filler VARCHAR(100) DEFAULT NULL,
    Birth_in_the VARCHAR(100) DEFAULT NULL,
    District_in_the VARCHAR(100) NOT NULL,
    Entry_no VARCHAR(100) NOT NULL,
    where_born VARCHAR(100) NOT NULL,
    Name VARCHAR(100) NOT NULL,
    sex VARCHAR(100) NOT NULL,
    Name_and_Surname_of_Father VARCHAR(100) NOT NULL,
    Name_and_Maiden_Name_of_Mother VARCHAR(100) NOT NULL,
    Name_and_Description_of_Informant VARCHAR(100) NOT NULL,
    Name_of_Registering_Officer VARCHAR(100) NOT NULL,
    Date_of_Registration DATE NOT NULL,
    District_Assistance VARCHAR(100) NOT NULL,
    Registrar VARCHAR(100) NOT NULL,
    Date DATE NOT NULL,
    Date_of_birth DATE NOT NULL,
    user_id INT DEFAULT NULL
);
