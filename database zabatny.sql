CREATE DATABASE `zabatlyDB`;
USE `zabatlyDB`;

CREATE TABLE `types` (
   `id` int UNIQUE NOT NULL AUTO_INCREMENT,
   `type` varchar(40),
   PRIMARY KEY(id)
);

CREATE TABLE `places` (
   `id` int UNIQUE NOT NULL AUTO_INCREMENT,
   `place` varchar(40),
   PRIMARY KEY(id)
);

CREATE TABLE `workers` (
   `id` int UNIQUE NOT NULL AUTO_INCREMENT,
   `name` varchar(40),
   `email` varchar(40),
   `password` varchar(40),
   `image` varchar(40),
   `rating` varchar(40),
   `typeid` int NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY (typeid) REFERENCES types(id)
   ON UPDATE CASCADE
   ON DELETE CASCADE
);

CREATE TABLE `users` (
   `id` int UNIQUE NOT NULL AUTO_INCREMENT,
   `name` varchar(40),
   `email` varchar(40),
   `password` varchar(40),
   `phone` varchar(40),
   `location` varchar(40),
   PRIMARY KEY(id)
);

CREATE TABLE `phones` (
   `id` int UNIQUE NOT NULL AUTO_INCREMENT,
   `phone` varchar(40),
   `workerid` int NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY (workerid) REFERENCES workers(id)
   ON UPDATE CASCADE
   ON DELETE CASCADE
);


CREATE TABLE `workerslocations` (
   `id` int UNIQUE NOT NULL AUTO_INCREMENT,
   `location` int NOT NULL,
   `workerid` int NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY (location) REFERENCES places(id),
   FOREIGN KEY (workerid) REFERENCES workers(id)
   ON UPDATE CASCADE
   ON DELETE CASCADE
);

CREATE TABLE `images` (
   `id` int UNIQUE NOT NULL AUTO_INCREMENT,
   `image` varchar(40),
   `workerid` int NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY (workerid) REFERENCES workers(id)
   ON UPDATE CASCADE
   ON DELETE CASCADE
);

CREATE TABLE `ratings` (
   `id` int UNIQUE NOT NULL AUTO_INCREMENT,
   `rating` varchar(40),
   `workerid` int NOT NULL,
   `userid` int NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY (userid) REFERENCES users(id),
   FOREIGN KEY (workerid) REFERENCES workers(id)
   ON UPDATE CASCADE
   ON DELETE CASCADE
);

CREATE TABLE `reviews` (
   `id` int UNIQUE NOT NULL AUTO_INCREMENT,
   `review` varchar(100),
   `workerid` int NOT NULL,
   `userid` int NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY (userid) REFERENCES users(id),
   FOREIGN KEY (workerid) REFERENCES workers(id)
   ON UPDATE CASCADE
   ON DELETE CASCADE
);


insert into types (type) values ('gazmagy');
insert into types (type) values ('mikaniky');
insert into types (type) values ('sabak');
insert into types (type) values ('shghala');
insert into types (type) values ('na2ash');

insert into places (place) values ('masr_gdeda');
insert into places (place) values ('masr_adema');
insert into places (place) values ('re7ab');
insert into places (place) values ('tgmo3');
insert into places (place) values ('3ataba');
insert into places (place) values ('salah_salem');

insert into workers (name,email,password,typeid,image,rating) values ('ahmed','a1','a1',1,'../images/img1.jpg',5);
insert into workers (name,email,password,typeid,image,rating) values ('ahmed1','a2','a1',2,'../images/img2.jpg',4);
insert into workers (name,email,password,typeid,image,rating) values ('ahmed2','a3','a1',3,'../images/img3.jpg',3);
insert into workers (name,email,password,typeid,image,rating) values ('ahmed3','a4','a1',4,'i3',2);
insert into workers (name,email,password,typeid,image,rating) values ('ahmed4','a5','a1',5,'i4',1);
insert into workers (name,email,password,typeid,image,rating) values ('ali','a6','a1',1,'../images/img3.jpg',2);

insert into workerslocations (location,workerid) values (1,1);
insert into workerslocations (location,workerid) values (2,2);
insert into workerslocations (location,workerid) values (3,3);
insert into workerslocations (location,workerid) values (4,1);
insert into workerslocations (location,workerid) values (5,3);
insert into workerslocations (location,workerid) values (6,6);

insert into phones (phone,workerid) values ('0100 111 8888',1);
insert into phones (phone,workerid) values ('0100 222 9999',2);
insert into phones (phone,workerid) values ('0111 111 1111',3);
insert into phones (phone,workerid) values ('0122 222 2222',1);
insert into phones (phone,workerid) values ('0100 115 2697',2);
insert into phones (phone,workerid) values ('0100 111 9999',6);

insert into users (name,email,password,phone,location) values ('ax1','ax1','ax1',000000,'bles');
insert into users (name,email,password,phone,location) values ('ax2','ax2','ax2',000000,'bles');
insert into users (name,email,password,phone,location) values ('ax3','ax3','ax3',000000,'bles');
insert into users (name,email,password,phone,location) values ('ax4','ax4','ax4',000000,'bles');
insert into users (name,email,password,phone,location) values ('ax5','ax5','ax5',000000,'bles');

insert into reviews (review,workerid,userid) values ('he is the best',1,1);
insert into reviews (review,workerid,userid) values ('he is the best2',2,1);
insert into reviews (review,workerid,userid) values ('he is the best3',3,1);
insert into reviews (review,workerid,userid) values ('he is the best4',1,1);

