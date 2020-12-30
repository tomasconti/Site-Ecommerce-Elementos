/*cadastro usuário*/
CREATE TABLE cadastro
(
    usuario varchar(20) PRIMARY KEY,
    nome varchar (30) NOT NULL,
    senha varchar (15) NOT NULL
);

/*cadastro série*/
DROP TABLE IF EXISTS serie;
DROP SEQUENCE IF EXISTS cod_serie;
CREATE SEQUENCE cod_serie START 1001;
CREATE TABLE serie
(
    cod_serie BIGINT DEFAULT NEXTVAL('cod_serie'),
    titulo VARCHAR(50) NOT NULL,
    genero VARCHAR(20) NOT NULL,
    ano INT NOT NULL,
    pais VARCHAR(20) NOT NULL,
    sinopse VARCHAR(200),
    classificacao INT NOT NULL,
    excluido CHAR(1) NOT NULL,
    data_exclusao DATE,
    PRIMARY KEY (titulo)
); 

