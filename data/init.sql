CREATE DATABASE Test;

    use test;

    CREATE TABLE students (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50) NOT NULL,
        age INT(11) NOT NULL,
        address VARCHAR (30) NOT NULL,
        school  VARCHAR (30) NOT NULL,
        date TIMESTAMP
    );

    CREATE TABLE users (
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        username VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    );