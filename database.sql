set foreign_key_checks = 0;
drop table if exists films;
drop table if exists directors;
drop table if exists actors;
set foreign_key_checks = 1;

create table if not exists film
(
    id     int unsigned primary key auto_increment not null,
    name   varchar(255)                            not null,
    note   int unsigned                            not null,
    length int unsigned                            not null
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
create table if not exists actor
(
    id   int unsigned primary key auto_increment not null,
    name varchar(255)                            not null
) engine = InnoDB;

create table if not exists film_actor(
    id_film int unsigned not null,
    id_actor int unsigned not null
) engine = InnoDB;

create table if not exists film_director(
    id_film int unsigned not null,
    id_director int unsigned not null
) engine = InnoDB;

create table if not exists film_category(
    id_film int unsigned not null,
    id_category int unsigned not null
) engine = InnoDB;

alter table film_actor
    add constraint film_actor_pk primary key (id_film, id_actor),
    add constraint film_actor_id_film foreign key (id_film) references film(id) on delete cascade,
    add constraint film_actor_id_actor foreign key (id_actor) references actor(id) on delete cascade;

alter table film_director
    add constraint film_director_pk primary key (id_film, id_director),
    add constraint film_director_id_film foreign key (id_film) references film(id) on delete cascade,
    add constraint film_director_id_director foreign key (id_director) references director(id) on delete cascade;

alter table film_category
    add constraint film_directory_pk primary key (id_film, id_category),
    add constraint film_directory_id_film foreign key (id_film) references film(id) on delete cascade,
    add constraint film_directory_id_category foreign key (id_category) references category(id) on delete cascade;

