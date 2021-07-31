create database pelis2;
use pelis2;

-- crea la tabla cartelera --
create table cartelera
(
idCartelera int  not null auto_increment,
Titulo varchar (255) not null,
año varchar(30),
pais varchar (80),
protagonistas varchar (255),
directores varchar (255),
foto varchar(50),

primary key (idCartelera)
);
