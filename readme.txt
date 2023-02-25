username: arno, mdp: arno
username: bot, mdp: bot

CREATE DATABASE php_chatmp;

CREATE Table messages(
    id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    id_auteur INT UNSIGNED,
    id_destinataire INT,
    texte TEXT,
    created_at TIMESTAMP
);
CREATE Table users(
    id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    pseudo VARCHAR(250),
    passw VARCHAR(255),
    created_at TIMESTAMP
);

ALTER TABLE messages ADD CONSTRAINT foreign_name FOREIGN KEY (id_auteur) REFERENCES users(id);