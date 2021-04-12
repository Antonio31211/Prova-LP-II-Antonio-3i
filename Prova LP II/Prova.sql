CREATE DATABASE provalp;
USE provalp;
CREATE TABLE IF NOT EXISTS cadastro (
 codigo int(3) NOT NULL auto_increment,
 tipo varchar(50) ,
 marca varchar(50) ,
 descricao varchar(100) ,
 valor float,
 PRIMARY KEY (codigo),
 KEY codigo (codigo)
);

