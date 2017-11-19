#DATABAS: herbarium

CREATE TABLE usuarios (
	id SERIAL NOT NULL PRIMARY KEY,
	nome VARCHAR(40),
	login VARCHAR(40),
	senha VARCHAR(32)
);