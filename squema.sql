#DATABASE: herbarium

CREATE TABLE usuarios (
	id SERIAL NOT NULL PRIMARY KEY,
	nome VARCHAR(40),
	login VARCHAR(40),
	senha VARCHAR(32)
);

CREATE TABLE plantas (
	id SERIAL PRIMARY KEY,
	nome VARCHAR(50) NOT NULL,
	pais VARCHAR(20),
	estado VARCHAR(20),
	cidade VARCHAR(20) NOT NULL,
	descricao VARCHAR(200),
	data DATE,
	foto VARCHAR(10),
	userId INTEGER REFERENCES usuarios(id) NOT NULL
);