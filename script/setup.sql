create table users(
	id integer primary key autoincrement,
	firstname varchar(255) not null,
	lastname varchar(255) not null,
	username varchar(255) not null unique,
	password varchar(255) not null
	
);

create table rooms(
	id integer primary key autoincrement,
	floorspace integer not null check(floorspace>=0),
	cost decimal not null check(cost>=0),
	people integer not null check(people>=0),
	type varchar(255) not null check(type="flat" or "apartment" or "freestanding" or "caravan"),
	floor_level integer default null check(floor_level>= 0),
	lift boolean default null,
	garden boolean default null,
	parking boolean default null,
	swimmingpool boolean default null,
	kitchen boolean not null,
	ensuite_bathroom boolean default null,
	bath_shower varchar(255) not null, 
	floorheating boolean default null,
	airconditioning boolean default null,
	washingmachine boolean not null,
	pets boolean default null,
	bed_dressing boolean not null,
	laundry_washing_included boolean not null, 
	cost_of_laundry real default null check(cost_of_laundry>=0.0),
	seperate_entrance boolean default null,
	cost_of_cleaning_included boolean not null,
	cost_of_cleaning real default null check(cost_of_cleaning>=0.0),
	television boolean default null,
	cost_of_television real default null,
	wifi boolean default null,
	type_of_bed varchar(255) default null check(type_of_bed = "single" or "double"),
	suited_for_disabled varchar(255) default null,
	pictureurl varchar(255) default null,
	addressid integer not null default 0,
	ownerid integer not null,
	foreign key(ownerid) references users(id) on delete cascade on update cascade
);

create table userbookings(
	id integer primary key autoincrement,
	userid integer not null,
	roomid integer not null,
	ownerid integer not null,
	arrivalDate date not null check(arrivalDate<=departureDate and arrivalDate>=date()),
	departureDate date not null,
	cost float not null check(cost>=0.0),
	people int not null check(people>=1),
	cardid string not null,
	confirmed boolean not null default false,
	foreign key(userid) references users(id) on delete cascade on update cascade,
	foreign key(roomid) references rooms(id) on delete cascade on update cascade,
	foreign key(cardid) references cards(id) on delete cascade on update cascade,
	foreign key(ownerid) references users(id) on delete cascade on update cascade
);


create table roomratings(
	id integer primary key autoincrement,
	userid integer not null,
	roomid integer not null,
	rating integer not null check(rating<=5 and rating>=0),
	comment text default '',
	foreign key(userid) references users(id),
	foreign key(roomid) references rooms(id)
);



