## Chat

Après s'être enregistré, vous pouvez envoyer des messages privés aux autres utilisateurs. Système de messagerie instantané avec *jquery*.

![Screenshot](https://github.com/AvirKarakitsos/PHPchat/blob/main/images/screenshot.png?raw=true)

## Créer la base de données avec Mysql

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