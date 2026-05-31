CREATE DATABASE wiki_solo_leveling;

USE wiki_solo_leveling;

-- Create Tables
CREATE TABLE users(
    username VARCHAR(50) NOT NULL PRIMARY KEY UNIQUE,
    password TEXT NOT NULL,
    role ENUM('user', 'admin')
);
CREATE TABLE humans(
    char_id VARCHAR(6) NOT NULL PRIMARY KEY UNIQUE,
    char_name VARCHAR(100) NOT NULL,
    char_rank VARCHAR(10),
    char_description TEXT,
    char_image TEXT,
    char_guild VARCHAR(100),
    char_va VARCHAR(100)
);
CREATE TABLE dungeons(
    dungeon_id VARCHAR(6) NOT NULL PRIMARY KEY UNIQUE,
    dungeon_name VARCHAR(100) NOT NULL,
    dungeon_rank VARCHAR(10),
    dungeon_location TEXT,
    dungeon_description TEXT,
    dungeon_image TEXT
);
CREATE TABLE monsters(
    char_id VARCHAR(6) NOT NULL PRIMARY KEY UNIQUE,
    char_name VARCHAR(100) NOT NULL,
    char_species VARCHAR(50),
    char_rank VARCHAR(10),
    dungeon_id VARCHAR(6) NOT NULL,
    char_description TEXT,
    char_image TEXT,
    char_va VARCHAR(100),
    FOREIGN KEY (dungeon_id) REFERENCES dungeons(dungeon_id)
);
CREATE TABLE abilities(
    id VARCHAR(6) NOT NULL PRIMARY KEY UNIQUE,
    owner_id VARCHAR(6) NOT NULL,
    ability_name VARCHAR(100) NOT NULL,
    ability_type VARCHAR(30),
    ability_description TEXT
);

-- Insert Tables
INSERT INTO users VALUES
('admin', '$argon2i$v=19$m=65536,t=4,p=1$VENlQnNFN0JWWHZQN3pMNQ$f+112q/6LaZcPtU1fbVmPWyWLc9R5V9CeP/CF0UBXjA', 'admin');

INSERT INTO humans VALUES
();

INSERT INTO monsters VALUES
();

INSERT INTO dungeons VALUES
();

INSERT INTO ability VALUES
();