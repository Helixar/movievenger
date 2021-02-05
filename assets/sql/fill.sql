
use movievenger;

set foreign_key_checks = 0;
truncate table user;
truncate table film;
truncate table vote;
truncate table director;
truncate table actor;
truncate table category;
truncate table film_actor;
truncate table film_director;
truncate table film_category;
set foreign_key_checks = 1;

insert into user (username, password, email, admin)
values ('Helixar', 'blabla', 'contact@cloudnode.fr', 1),
       ('Rémi', 'blabla', 'contact@remi.fr', 0);

insert into film (id_user, name, length, synopsis, release_date, image, url, published_at)
values (1, 'Avengers', 120, 'ceci est un synopsis', now(), 'avenger.jpg', 'https://avengers.com', now()),
       (1, 'Avengers2', 120, 'ceci est un synopsis', now(), 'avenger2.jpg', 'https://avengers.com', null);

insert into category (name, slug)
values ('Science Fiction', 'science-fiction'),
       ('Thriller', 'thriller');

insert into director (name)
values ('Zack Snider'),
       ('Christopher Nolan');

insert into actor (name)
values ('Robert Downey Jr'),
       ('Jason Statham'),
       ('Robert Pattinson'),
       ('Depardieux');

insert into film_actor (id_film, id_actor)
values (1, 1),
       (1, 2),
       (2, 2),
       (2, 3),
       (2, 4);

insert into film_director (id_film, id_director)
values (1, 1),
       (2, 2);

insert into film_category (id_film, id_category)
VALUES (1, 1),
       (2, 1);

insert into vote (id_film, id_user, note) VALUES
(1, 1, 5),
(2, 1, 3),
(1, 2, 4),
(2, 2, 5);

