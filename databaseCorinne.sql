set foreign_key_checks = 0;
drop table if exists `user`;
drop table if exists film;
drop table if exists vote;
drop table if exists director;
drop table if exists actor;
drop table if exists category;
drop table if exists film_actor;
drop table if exists film_director;
drop table if exists film_category;
set foreign_key_checks = 1;

create table if not exists `user`
(
    id       int unsigned primary key auto_increment not null,
    username varchar(255)                            not null,
    password varchar(255)                            not null,
    email    varchar(255)                            not null,
    admin    tinyint(1) unsigned                     not null
) engine = InnoDB;

create table if not exists film
(
    id           int unsigned primary key auto_increment not null,
    id_user      int unsigned                            not null,
    name         varchar(255)                            not null,
    length       int unsigned                            not null,
    synopsis     text                                    not null,
    release_date date                                    not null,
    image        varchar(255)                            not null,
    url          text                                    not null,
    published_at datetime
) engine = InnoDB;

create table if not exists vote
(
    id_film int unsigned not null,
    id_user int unsigned not null,
    note    int unsigned not null
) engine = InnoDB;

create table if not exists director
(
    id   int unsigned primary key auto_increment not null,
    name varchar(255)                            not null
) engine = InnoDB;
create table if not exists actor
(
    id   int unsigned primary key auto_increment not null,
    name varchar(255)                            not null
) engine = InnoDB;

create table if not exists category
(
    id   int unsigned primary key auto_increment not null,
    name varchar(255)                            not null,
    slug varchar(255)                            not null
) engine = InnoDB;

create table if not exists film_actor
(
    id_film  int unsigned not null,
    id_actor int unsigned not null
) engine = InnoDB;

create table if not exists film_director
(
    id_film     int unsigned not null,
    id_director int unsigned not null
) engine = InnoDB;

create table if not exists film_category
(
    id_film     int unsigned not null,
    id_category int unsigned not null
) engine = InnoDB;

alter table film
    add constraint film_user_id foreign key (id_user) references user (id);

alter table film_actor
    add constraint film_actor_pk primary key (id_film, id_actor),
    add constraint film_actor_id_film foreign key (id_film) references film (id),
    add constraint film_actor_id_actor foreign key (id_actor) references actor (id);

alter table film_director
    add constraint film_director_pk primary key (id_film, id_director),
    add constraint film_director_id_film foreign key (id_film) references film (id),
    add constraint film_director_id_director foreign key (id_director) references director (id);

alter table film_category
    add constraint film_directory_pk primary key (id_film, id_category),
    add constraint film_directory_id_film foreign key (id_film) references film (id),
    add constraint film_directory_id_category foreign key (id_category) references category (id);

alter table vote
    add constraint vote_pk primary key (id_film, id_user),
    add constraint vote_id_film foreign key (id_film) references film (id),
    add constraint vote_id_user foreign key (id_user) references user (id);

