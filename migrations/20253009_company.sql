DROP DATABASE if exists company;
create database company;
use company;
create table department
(
    id int auto_increment primary key ,
    fname varchar(255),
    lname varchar(255)
);

INSERT INTO employees(fname, lname)
values ('Peter1company',  'Pan1'),
       ('Donald1', 'Trump1'),
       ('George1', 'Busch');

insert into employ(lastname, firstname)
 VALUES ('bunnycompany' , 'sop'),
        ('panny','gunni');