CREATE DATABASE blog;
USE blog;
CREATE TABLE post(
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    title VARCHAR(255) NOT NULL,
    subtitle VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    author VARCHAR(255) NOT NULL,
    author_url VARCHAR(255) NOT NULL,
    publish_date INT NOT NULL,
    image_url VARCHAR(255) NOT NULL,
    featured TINYINT(1) DEFAULT 0,
    adventure INT NOT NULL
);

