DROP TABLE tb_employees CASCADE CONSTRAINT;
DROP TABLE tb_login CASCADE CONSTRAINT;
DROP TABLE tb_guest CASCADE CONSTRAINT;
DROP TABLE tb_room CASCADE CONSTRAINT;
DROP TABLE tb_facilities CASCADE CONSTRAINT;
DROP TABLE tb_reservation CASCADE CONSTRAINT;
DROP TABLE tb_payment CASCADE CONSTRAINT;

DROP SEQUENCE tb_login_seq;
DROP SEQUENCE tb_guest_seq;
DROP SEQUENCE tb_reservation_seq;
DROP SEQUENCE tb_payment_seq;

CREATE TABLE tb_employees (
  emp_id number(10) NOT NULL,
  name varchar2(50) NOT NULL,
  username varchar2(25) NOT NULL,
  password varchar2(25) NOT NULL,
  job varchar2(25) NOT NULL,
  address varchar2(100) NOT NULL,
  contact_no varchar2(25) NOT NULL
);


INSERT INTO tb_employees VALUES(1, 'Talha', 'talha', '1234', 'Administrator', 'ISB', '123456789');
INSERT INTO tb_employees VALUES(2, 'Ali', 'ali', '1234', 'Manager', 'ISB', '123456789');
INSERT INTO tb_employees VALUES(3, 'Aimen', 'aimen', '1234', 'Admin', 'ISB', '123456789');



CREATE TABLE tb_login (
  id number(10) NOT NULL,
  name varchar2(50) NOT NULL,
  username varchar2(25) NOT NULL,
  password varchar2(25) NOT NULL,
  admin_level number(10) DEFAULT 0
) ;

create SEQUENCE tb_login_seq
minvalue 0
start with 0
INCREMENT BY 1;

INSERT INTO tb_login VALUES(tb_login_seq.NEXTVAL, 'Talha', 'talha', '1234', 1);
INSERT INTO tb_login VALUES(tb_login_seq.NEXTVAL, 'Ali', 'ali', '1234', 1); 
INSERT INTO tb_login VALUES(tb_login_seq.NEXTVAL, 'Aimen', 'aimen', '1234', 1);
INSERT INTO tb_login VALUES(tb_login_seq.NEXTVAL, 'Sara', 'sara', '12321', ''); 
INSERT INTO tb_login VALUES(tb_login_seq.NEXTVAL, 'Saima', 'saima', '12345', ''); 


CREATE TABLE tb_guest (
  id_guest number(10) NOT NULL,
  name varchar2(50) NOT NULL,
  username varchar2(25) NOT NULL,
  password varchar2(25) NOT NULL, 
  gender varchar2(10) NOT NULL,
  address varchar2(100) NOT NULL,
  contact_no varchar2(25) NOT NULL,
  email varchar2(50) NOT NULL
) ;

create SEQUENCE tb_guest_seq
minvalue 0
start with 0
INCREMENT BY 1;

INSERT INTO tb_guest VALUES(tb_guest_seq.NEXTVAL, 'Sara', 'sara', '12321', 'Female', 'Islamabad', '123456789', 'sara@gmail.com'); 
INSERT INTO tb_guest VALUES(tb_guest_seq.NEXTVAL, 'Saima', 'saima', '12345', 'Female', 'Rawalpindi', '123456789', 'saima@gmail.com'); 


CREATE TABLE tb_room (
  room_code varchar2(25) NOT NULL,
  room_name varchar2(25) NOT NULL,
  class varchar2(25) NOT NULL,
  picture varchar2(25) NOT NULL,
  rate number(10) NOT NULL,
  status varchar2(25) NOT NULL
);

INSERT INTO tb_room VALUES('R001', 'Deluxe', 'Deluxe', 'kmr2.jpg', 20000, 'Ready');
INSERT INTO tb_room VALUES('R002', 'Exclusive', 'Exclusive', 'kmr7.jpg', 30000, 'Ready'); 
INSERT INTO tb_room VALUES('R003', 'Premium', 'Premium', 'kmr6.jpg', 40000, 'Ready');
INSERT INTO tb_room VALUES('R004', 'Elite', 'Elite', 'kmr0.jpg', 50000, 'Ready');
INSERT INTO tb_room VALUES('R005', 'Gold', 'Gold', 'kmr22.jpg', 60000, 'Ready');


CREATE TABLE tb_facilities (
  id_facilities varchar2(25) NOT NULL,
  facility_type varchar2(25) NOT NULL
) ;

INSERT INTO tb_facilities VALUES('F001', 'Luxury');
INSERT INTO tb_facilities VALUES('F002', 'Ordinary'); 


CREATE TABLE tb_reservation (
  id_reservation number(10) NOT NULL,
  name varchar2(50) NOT NULL,
  room_code varchar2(25) NOT NULL,
  id_facilities varchar2(25) NOT NULL,
  check_in_date date NOT NULL,
  check_out_date date NOT NULL,
  facility_type varchar2(25) NOT NULL,
  stay_duration number(10) NOT NULL,
  total_bill number(10) NOT NULL,
  address varchar2(100) NOT NULL
) ;

create SEQUENCE tb_reservation_seq
minvalue 0
start with 0
INCREMENT BY 1;

INSERT INTO tb_reservation VALUES(tb_reservation_seq.NEXTVAL, 'Sara', 'R001', 'F001', TO_DATE('2021-06-03', 'yyyy-MM-dd'), TO_DATE('2021-06-04', 'yyyy-MM-dd'), 'Luxury', 1, 20000, 'Islamabad');
INSERT INTO tb_reservation VALUES(tb_reservation_seq.NEXTVAL, 'Saima', 'R002', 'F002', TO_DATE('2021-06-05', 'yyyy-MM-dd'), TO_DATE('2021-06-07', 'yyyy-MM-dd'), 'Ordinary',2, 30000, 'Rawalpindi');


CREATE TABLE tb_payment (
  id_payment number(10) NOT NULL,
  id_reservation number(10) NOT NULL,
  name varchar2(50) NOT NULL,
  room_code varchar2(25) NOT NULL,
  id_facilities varchar2(25) NOT NULL,
  total_bill number(10) NOT NULL,
  status varchar2(25) DEFAULT 'Pending' NOT NULL
) ;

create SEQUENCE tb_payment_seq
minvalue 0
start with 0
INCREMENT BY 1;

INSERT INTO tb_payment VALUES(tb_payment_seq.NEXTVAL, 1, 'Sara', 'R001', 'F001', 20000, 'Paid');
INSERT INTO tb_payment VALUES(tb_payment_seq.NEXTVAL, 2, 'Saima', 'R002', 'F002', 30000, 'Pending');



ALTER TABLE tb_employees
  ADD CONSTRAINT tb_emp_id_pk PRIMARY KEY (emp_id);

ALTER TABLE tb_login
  ADD CONSTRAINT tb_login_id_pk PRIMARY KEY (id);

ALTER TABLE tb_guest
  ADD CONSTRAINT tb_guest_id_pk PRIMARY KEY (id_guest);

ALTER TABLE tb_room
  ADD CONSTRAINT tb_room_code_pk PRIMARY KEY (room_code);

ALTER TABLE tb_facilities
  ADD CONSTRAINT tb_facilities_id_pk PRIMARY KEY (id_facilities);

ALTER TABLE tb_reservation
  ADD CONSTRAINT tb_reservation_id_pk PRIMARY KEY (id_reservation)
  ADD CONSTRAINT tb_r_room_code_fk FOREIGN KEY (room_code) REFERENCES tb_room (room_code) ON DELETE CASCADE
  ADD CONSTRAINT tb_r_facilities_id_fk FOREIGN KEY (id_facilities) REFERENCES tb_facilities (id_facilities) ON DELETE CASCADE;

ALTER TABLE tb_payment
  ADD CONSTRAINT tb_payment_id_pk PRIMARY KEY (id_payment)
  ADD CONSTRAINT tb_p_reservation_id_fk FOREIGN KEY (id_reservation) REFERENCES tb_reservation (id_reservation) ON DELETE CASCADE
  ADD CONSTRAINT tb_p_room_code_fk FOREIGN KEY (room_code) REFERENCES tb_room (room_code) ON DELETE CASCADE
  ADD CONSTRAINT tb_p_facilities_id_fk FOREIGN KEY (id_facilities) REFERENCES tb_facilities (id_facilities) ON DELETE CASCADE;
