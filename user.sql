drop table if exists User;
create table User
(id INTEGER,
email TEXT,
name TEXT,
password CHAR(40),
doi TEXT,
trunk_func INTEGER,
arms_func INTEGER,
fingers_func INTEGER,
legs_func INTEGER,
injury_and_recovery TEXT,
most_blissful TEXT,
most_challening TEXT,
connect TEXT,
relationship INTEGER NOT NULL,
UNIQUE (id),
PRIMARY KEY (email) );
insert into User values (1, "spinestein@gmail.com", "Albert Spinestein", "poo", "01/01/1700", 2, 1, 1, 1, "I was born in a lab.", "I love looking at myself green.", "Walking up the stairs.", "physics, cooking", 3);
select * from User;