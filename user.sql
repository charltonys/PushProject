drop table if exists User;
create table User
(id INTEGER,
email TEXT,
name TEXT,
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
insert into User values (1, "spinestein@gmail.com", "Albert Spinestein", "01/01/1700", 2, 1, 1, 1, "I was born in a lab.", "I love looking at myself green.", "Walking up the stairs.", "physics, cooking", 3);
insert into User values (2, "rocky@gmail.com", "Rocky Spinestein", "01/01/1700", 2, 1, 1, 1, "I was born in Transylvania.", "I'm really buff.", "Walking up the stairs.", "dancing, swimming", 3);
insert into User values (3, "molly@gmail.com", "Molly H.", "01/01/1700", 2, 1, 1, 1, "I was injured in a car accident.", "Whoa.", "Walking up the stairs.", "dancing, swimming", 3);
select * from User;