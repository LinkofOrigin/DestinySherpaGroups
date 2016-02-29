create table users (
	id int not null auto_increment primary key,
	username varchar(64) not null,
	password varchar(64) not null,
	console varchar(4) not null,
	about varchar(256)
);

create table events (
	id int not null auto_increment primary key,
	sherpa int not null,
	console varchar(4) not null,
	activity int not null,
	start datetime not null,
	other varchar(512)
);

create table activities (
	id int not null auto_increment primary key,
	name varchar(32) not null
);

create table user_event (
	user int not null,
	event int not null
);
