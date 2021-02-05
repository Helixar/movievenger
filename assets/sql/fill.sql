
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
values (1, 'Joker', 122, 'Le film, qui relate une histoire originale inédite sur grand écran, se focalise sur la figure emblématique de l’ennemi juré de Batman. Il brosse le portrait d’Arthur Fleck, un homme sans concession méprisé par la société.', now(), 'joker.jpg', null, null),
        (1, 'Léon', 103, 'Un tueur à gages répondant au nom de Léon prend sous son aile Mathilda, une petite fille de douze ans, seule rescapée du massacre de sa famille. Bientôt, Léon va faire de Mathilda une "nettoyeuse", comme lui. Et Mathilda pourra venger son petit frère...', now(), 'leon.jpg', null, null),
        (1, 'OSS 117: Alerte riyge en Afrique Noir', 0, '1981. Hubert Bonisseur de La Bath, alias OSS 117, est de retour. Pour cette nouvelle mission, plus délicate, plus périlleuse et plus torride que jamais, il est contraint de faire équipe avec un jeune collègue, le prometteur OSS 1001.', now(), 'oss117.jpg', null, null),
        (1, 'Sausage Party', 89, "Une petite saucisse s'embarque dans une dangereuse quête pour découvrir les origines de son existence...", now(), 'sausageParty.jpg', null, null),
        (1, 'The Pick Of Destiny', 93, "Pas de chance pour le jeune JB. Il est passionné de rock'n'roll dans une famille ultra religieuse qui considère cette musique comme l'oeuvre du diable. Lorsque son père lui colle une raclée en arrachant tous les posters de ses idoles, JB s'enfuit et part pour Hollywood y chercher le secret du rock'n'roll... ", now(), 'thePickOfDestiny.jpg', null, null),
        (1, 'Titanic', 194, "Southampton, 10 avril 1912. Le paquebot le plus grand et le plus moderne du monde, réputé pour son insubmersibilité, le 'Titanic', appareille pour son premier voyage. Quatre jours plus tard, il heurte un iceberg. A son bord, un artiste pauvre et une grande bourgeoise tombent amoureux.", now(), 'titanic.jpg', null, null);


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