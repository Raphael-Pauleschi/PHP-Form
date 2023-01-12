create database store;
use store;
create table produtos(
	id int auto_increment not null,
     productName varchar(20) default null, 
     productDescription varchar(200) default null, 
     category varchar(20) default null, 
     quantity int default null, 
     price float default null,
    primary key(id)
);