PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;
CREATE TABLE users (
id INT PRIMARY KEY NOT NULL,
name VARCHAR(255) NOT NULL,
email VARCHAR(255) NOT NULL,
email_verified_at TEXT NOT NULL,
password TEXT NOT NULL
);
CREATE TABLE categorias (
id INT PRIMARY KEY NOT NULL,
title VARCHAR(255) NOT NULL,
description TEXT NOT NULL
);
CREATE TABLE livros (
id INT PRIMARY KEY NOT NULL,
title VARCHAR(255) NOT NULL,
description TEXT NOT NULL,
published_date DATETIME NOT NULL,
pages INT NOT NULL,
categoria_id INT NOT NULL,
CONSTRAINT fk_livro_categoria FOREIGN KEY (categoria_id) REFERENCES categorias(id)
);
CREATE TABLE colecoes (
id INT PRIMARY KEY NOT NULL,
title VARCHAR(255) NOT NULL,
description TEXT NOT NULL,
livro_id INT NOT NULL,
users_id INT NOT NULL,
CONSTRAINT fk_colecao_livro FOREIGN KEY (livro_id) REFERENCES livros(id),
CONSTRAINT fk_colecao_usuario FOREIGN KEY (users_id) REFERENCES users(id)
);
COMMIT;
