create table if not exists category(
        id serial not null primary key,
        name varchar(50) not null
);

create table if not exists record(
	id serial not null primary key,
	heading varchar(200),
	content text not null,
	created_at timestamp without time zone default 'now()',
	updated_at timestamp without time zone default 'now()',
	category_id int not null references category
);
