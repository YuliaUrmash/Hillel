create table users
(
    id        int unsigned auto_increment primary key,
    name      varchar(50)  not null,
    surname   varchar(70)  not null,
    email     varchar(100) not null,
    password  text         not null,
    birthdate date         not null
);
