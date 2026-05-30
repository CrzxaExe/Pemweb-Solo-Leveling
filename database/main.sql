CREATE DATABASE wiki_solo_leveling;

USE wiki_solo_leveling;

CREATE TABLE users(
    username VARCHAR(50) NOT NULL PRIMARY KEY UNIQUE,
    password TEXT NOT NULL,
    role ENUM('user', 'admin')
);
CREATE TABLE humans(
    id VARCHAR(6) NOT NULL PRIMARY KEY UNIQUE,
    name VARCHAR(100) NOT NULL,
    rank VARCHAR(10),
    description TEXT,
    image TEXT
);
CREATE TABLE monsters(
    id VARCHAR(6) NOT NULL PRIMARY KEY UNIQUE,
    name VARCHAR(100) NOT NULL,
    species VARCHAR(50),
    rank VARCHAR(10),
    dungeon_id VARCHAR(6) NOT NULL,
    description TEXT,
    image TEXT
);
CREATE TABLE dungeons(
    id VARCHAR(6) NOT NULL PRIMARY KEY UNIQUE,
    name VARCHAR(100) NOT NULL,
    rank VARCHAR(10),
    location TEXT,
    description TEXT,
    image TEXT
);
CREATE TABLE skills(
    id VARCHAR(6) NOT NULL PRIMARY KEY UNIQUE,
    owner_id VARCHAR(6) NOT NULL,
    name VARCHAR(100) NOT NULL,
    type VARCHAR(30),
    description TEXT
);

-- Insert users
INSERT INTO users
VALUES
('admin', '$argon2i$v=19$m=65536,t=4,p=1$VENlQnNFN0JWWHZQN3pMNQ$f+112q/6LaZcPtU1fbVmPWyWLc9R5V9CeP/CF0UBXjA', 'admin');