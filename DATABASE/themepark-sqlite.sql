BEGIN TRANSACTION;
CREATE TABLE "users" (
  "id" INTEGER PRIMARY KEY ASC,
  "username" TEXT,
  "password" TEXT,
  "actif" INTEGER DEFAULT '0',
  "role" TEXT,
  "email" TEXT,
  "image" BLOB,
  "created" INTEGER,
  "modified" INTEGER
);
INSERT INTO `users` (id,username,password,actif,role,email,image,created,modified) VALUES (8,'admin','$2a$10$RUkDULNCcxCU.hxiZrgjxOIchocYvEfMFvVwA1lR3NF7GQpm8g0We',0,'admin','admin@admin.com',NULL,'2015-09-18','2015-09-18');
INSERT INTO `users` (id,username,password,actif,role,email,image,created,modified) VALUES (9,'proprio','$2a$10$rXHA79plPdz0kbzv4EMCPuMaY.9O6BdPvhJB/dG.57gFgjG6MEByG',0,'proprietaire','proprio@proprio.com',NULL,'2015-09-24','2015-09-24');
INSERT INTO `users` (id,username,password,actif,role,email,image,created,modified) VALUES (10,'proprio2','$2a$10$mBpbRdJSWfWwSaCf4x98lejfqKsHiSrE/YzdZzEGW3v89PX7TC6pC',0,'proprietaire','fgauthier1985@gmail.com',NULL,'2015-10-01','2015-10-01');
INSERT INTO `users` (id,username,password,actif,role,email,image,created,modified) VALUES (14,'frank','$2a$10$r/qMijPERU.vEgtA9q/8Pe5/q10Z4YmI/uPkMSNWY85jFyFs1KAkK',1,'proprietaire','fgauthier1985@gmail.com',NULL,'2015-11-11','2015-11-11');
CREATE TABLE "types" (
  "id" INTEGER PRIMARY KEY ASC,
  "type_description" TEXT
);
INSERT INTO `types` (id,type_description) VALUES (1,'enfant');
INSERT INTO `types` (id,type_description) VALUES (2,'montagne russe');
INSERT INTO `types` (id,type_description) VALUES (3,'restaurant');
INSERT INTO `types` (id,type_description) VALUES (4,'caroussel');
INSERT INTO `types` (id,type_description) VALUES (5,'fast-food');
INSERT INTO `types` (id,type_description) VALUES (6,'sensation forte');
CREATE TABLE "states" (
  "id" INTEGER PRIMARY KEY ASC,
  "country_id" INTEGER,
  "name" TEXT
);
INSERT INTO `states` (id,country_id,name) VALUES (1,1,'Quebec');
INSERT INTO `states` (id,country_id,name) VALUES (2,1,'Ontario');
INSERT INTO `states` (id,country_id,name) VALUES (3,1,'Alberta');
INSERT INTO `states` (id,country_id,name) VALUES (4,1,'British Colombia');
INSERT INTO `states` (id,country_id,name) VALUES (5,2,'California');
INSERT INTO `states` (id,country_id,name) VALUES (6,2,'Texas');
INSERT INTO `states` (id,country_id,name) VALUES (7,2,'Florida');
INSERT INTO `states` (id,country_id,name) VALUES (8,2,'Massachusetts');
CREATE TABLE "parks" (
  "id" INTEGER PRIMARY KEY ASC,
  "user_id" INTEGER,
  "park_name" TEXT,
  "park_location" TEXT,
  "state_id" INTEGER,
  "park_email" TEXT,
  "park_website" TEXT
);
INSERT INTO `parks` (id,user_id,park_name,park_location,state_id,park_email,park_website) VALUES (5,9,'La ronde','Montreal',1,'laronde@laronde.com','http://laronde.com');
INSERT INTO `parks` (id,user_id,park_name,park_location,state_id,park_email,park_website) VALUES (6,9,'Disney World','Orlando',5,'disney@disney.com','http://disney.com');
INSERT INTO `parks` (id,user_id,park_name,park_location,state_id,park_email,park_website) VALUES (7,8,'aaaa','',7,'a@a.com','http://de.com');
INSERT INTO `parks` (id,user_id,park_name,park_location,state_id,park_email,park_website) VALUES (8,8,'aaaa','',6,'aaa@aa.com','http://asd.com');
CREATE TABLE "countries" (
  "id" INTEGER PRIMARY KEY ASC,
  "name" TEXT
);
INSERT INTO `countries` (id,name) VALUES (1,'Canada');
INSERT INTO `countries` (id,name) VALUES (2,'United-States');
CREATE TABLE "attractions_types" (
  "id" INTEGER PRIMARY KEY ASC,
  "attraction_id" INTEGER,
  "type_id" INTEGER
);
INSERT INTO `attractions_types` (id,attraction_id,type_id) VALUES (7,11,3);
INSERT INTO `attractions_types` (id,attraction_id,type_id) VALUES (8,11,5);
CREATE TABLE "attractions" (
  "id" INTEGER PRIMARY KEY ASC,
  "attraction_name" TEXT,
  "attraction_description" TEXT,
  "admission_price" INTEGER,
  "area_id" INTEGER,
  "user_id" INTEGER
);
INSERT INTO `attractions` (id,attraction_name,attraction_description,admission_price,area_id,user_id) VALUES (11,'Restaurant','restaurant a hot-dog de la plage',1,4,9);
CREATE TABLE "areas" (
  "id" INTEGER PRIMARY KEY ASC,
  "area_name" TEXT,
  "area_description" TEXT,
  "park_id" INTEGER,
  "user_id" INTEGER
);
INSERT INTO `areas` (id,area_name,area_description,park_id,user_id) VALUES (4,'Plage','Zone de la plage',6,9);
INSERT INTO `areas` (id,area_name,area_description,park_id,user_id) VALUES (5,'Kids Zone','Kids Zone',5,2);
COMMIT;
