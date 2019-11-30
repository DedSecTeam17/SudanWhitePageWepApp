create table user
(
    id       int auto_increment
        primary key,
    name     varchar(100) not null,
    email    varchar(200) not null,
    password varchar(200) not null,
    constraint table_name_email_uindex
        unique (email)
);

create table phone_book
(
    id               int auto_increment
        primary key,
    name             varchar(50) not null,
    number           varchar(50) not null,
    location_address varchar(30) not null,
    location_lat     double      not null,
    location_long    double      null,
    job              varchar(50) null,
    user_id          int         not null,
    create_at        timestamp   null,
    constraint phone_book_user_id_fk
        foreign key (user_id) references user (id)
);

create table phone_book_images
(
    id            int auto_increment
        primary key,
    phone_book_id int         not null,
    image_url     varchar(30) not null,
    constraint phone_book_images_phone_book_id_fk
        foreign key (phone_book_id) references phone_book (id)
);

create table user_profile
(
    id           int auto_increment
        primary key,
    about_me     text         not null,
    image_url    varchar(100) not null,
    phone_number varchar(50)  not null,
    job          varchar(50)  null,
    user_id      int          not null,
    constraint user_profile_user_id_fk
        foreign key (user_id) references user (id)
);


