create database Cinema;
use Cinema;

create table Cine(
Filme varchar (60)
);
drop table Cine;
insert into Cine (Filme)
values ('wicked');

select * from Cine;
-------------------------------

use Funcionario;

create table Funcionario(
NomeFun varchar (60),
Email varchar (50),
CPF varchar (11),
Celular varchar (11)
);

select * from Funcionario;
-------------------------------
create table Cliente(
Nome varchar (60),
Idade varchar (3),
email varchar (50),
cpf varchar (11)
);
select * from Cliente;
--------------------------------
create table Comida(
Pipoca varchar (50),
Refrigerante varchar (50),
Chocolate varchar (50)
);
select * from Comida;