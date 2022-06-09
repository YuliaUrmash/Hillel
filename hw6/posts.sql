create table posts
(
    id          int unsigned auto_increment primary key,
    user_id     int unsigned null,
    category_id int unsigned null,
    title       varchar(255)           not null,
    body        text                   not null,
    image       text                   not null,
    created_at  datetime               not null,
    updated_at  datetime default NOW() not null,

    FOREIGN KEY (user_id) REFERENCES users (id),
    FOREIGN KEY (category_id) REFERENCES categories (id)
);
