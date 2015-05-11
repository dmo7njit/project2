CREATE TABLE college_info(
	UNITID int(9),
	INSTNM varchar(120),
	OBEREG varchar(120),
	CONSTRAINT CI_PK PRIMARY KEY (UNITID)
);

CREATE TABLE enrollment_info(
	UNITID int(9),
	EFALEVEL int(2),
	EFTOTLT double(9,0),
	EFTOTLM double(9,0),
	EFTOTLW double(9,0)
);

CREATE TABLE finances_info(
	UNITID int(9),
	F1A01 double(9,2),
	F1A09 double(9,2),
	F1B01 double(9,2),
	F1H02 double(9,2)
);