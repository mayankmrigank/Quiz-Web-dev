-- Setup for CCL Registration Project
-- Import this file into phpMyAdmin

CREATE DATABASE IF NOT EXISTS registrationform;
USE registrationform;

CREATE TABLE IF NOT EXISTS form1 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(50) NOT NULL,
    lname VARCHAR(50) NOT NULL,
    dob DATE NOT NULL,
    gender VARCHAR(10) NOT NULL,
    sno VARCHAR(15) NOT NULL,
    student_email VARCHAR(100) NOT NULL UNIQUE,
    faname VARCHAR(50) NOT NULL,
    fno VARCHAR(15) NOT NULL,
    mname VARCHAR(50) NOT NULL,
    mno VARCHAR(15) NOT NULL,
    address TEXT NOT NULL,
    category VARCHAR(10) NOT NULL,
    boardname VARCHAR(20) NOT NULL,
    roll VARCHAR(20) NOT NULL,
    per VARCHAR(10) NOT NULL,
    ccl VARCHAR(10) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS result (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_email VARCHAR(100) NOT NULL,
    test VARCHAR(10) NOT NULL,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
