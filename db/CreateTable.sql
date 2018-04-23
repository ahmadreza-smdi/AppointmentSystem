create table patient (
	fname varchar[20],
	lname varchar[20],
	id varchar[15] not null,
	national_id varchar[12],
	phone_number varchar[12],
	address text,
	plate_number varchar[12],
	post_code varchar[12],
	special_disease varchar[20],
	blood_type varchar[3];
	primary_key (id)
);

create table doctor(
	fname varchar[20],
	lname varchar[20],
	dr_id varchar[15] not null,
	national_id varchar[12],
	phone_number varchar[12],
	address text,
	plate_number varchar[12],
	post_code varchar[12],
	primary_key (id)
)


create table appointment (
	id varchar[15] not null,
	dr_id varchar[15] not null,
	appointment_time date,
	visit_number varchar[12] not null,
	payment_roll varchar[12],
	insurance_number varchar[12],
	primary key (visit_number),
	foreign key (id) references patient(id),
	foreign key (dr_id) references doctor(dr_id),

);



create table insurance (
	insurance_type varchar[10],
	insurance_name varchar[15],
	insurance_id varchar[15],
	id varchar[15] not null,
	primary key (insurance_id),
	foreign_key (id) references patient(id)
);

create table prescription (
	id varchar[15] not null,
	prescription text,
	visit_number varchar[12] not null,
	foreign key (id) references patient(id),
	foreign key (visit_number) references appointment(visit_number),
	primary key (visit_number)
);


create table disease (
	id varchar[15] not null,
	visit_number varchar[12],
	disease_name varchar[15],
	description text,
	foreign key (id) references patient(id),
	foreign key (visit_number) references appointment(visit_number),
	primary key (visit_number)
);


create table advice (
	id varchar[15] not null,
	visit_number varchar[12],
	advised text,
	forbidden text,
	frowned_upon text,
	foreign key (id) references patient(id),
	foreign key (visit_number) references appointment(visit_number),
	primary key (visit_number)
);
