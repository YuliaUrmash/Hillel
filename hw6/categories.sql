create table categories
(
    id          int unsigned auto_increment primary key,
    name        varchar(80) not null,
    description text null,
    image       text null

);