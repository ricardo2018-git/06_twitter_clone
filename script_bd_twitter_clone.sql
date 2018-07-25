/*Banco twitter clone*/

/*cria banco*/
create database twitter_clone;

/*seleciona o banco*/
use twitter_clone;

/*cria tabela*/
create table usuarios(
	id int not null primary key auto_increment,
	usuario varchar(50) not null,
	email varchar(100) not null,
	senha varchar(32) not null
);

/*cria tabela de tweet*/
create table tweet(
	id_tweet int not null primary key auto_increment,
	id_usuario int not null,
	tweet varchar(140) not null,
	data_inclusao datetime default current_timestamp
);

/*cria tabela de seguidores*/
create table usuarios_seguidores(
	id_usuario_seguidor int not null primary key auto_increment,
	id_usuario int not null,
	seguindo_id_usuario int not null,
	data_registro datetime default current_timestamp
);

/*teste de select*/
/*select para recuperar usuarios seguidos*/
select u.*, us.* 
	from usuarios as u
		left join usuarios_seguidores as us
			on (us.id_usuario = 1 and u.id = us.seguindo_id_usuario)
				where u.usuario like '%a%' and u.id != 1;
		

/**/
select seguindo_id_usuario from usuarios_seguidores where id_usuario = 1;

/**/


/**/

