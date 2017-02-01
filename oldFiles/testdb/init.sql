create table search(
	selected tinyint,
	available tinyint
);

create table combination(
	id integer primary key autoincrement,
	combination int
);

insert into search(selected,available) Values(29,46);
insert into search(selected,available) Values(29,47);
insert into search(selected,available) Values(46,47);
insert into search(selected,available) Values(46,29);
insert into search(selected,available) Values(47,29);
insert into search(selected,available) Values(47,46);
insert into combination values(null,294647);