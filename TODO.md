# TODO
    - add student functionality
    - add course functionality
    - add enroll functionality
    - add reports functionality

# DONE
    - implemented user registration
    - implemented user login
    - created queries to database for login functionalities 
    - fixed login functionality
    - organize file structures and php contents
    - create session and implement logout functionalities
    - create templates 


Queries:

query to database:
        create table for user
		create table user (
			user_id int not null auto_increment,
            user_name varchar(255) not null,
            password varchar(255) not null,
            email varchar(255) not null,
            date_of_birth date,
            phone_number bigint,
            gender char(1) not null,
            age int,
            address varchar(255),
            primary key (user_id)
		);

        add user 
        insert into user (user_name, password, email, date_of_birth, phone_number, gender, age, address)
        values ('rob', 'laran', 'laranrobelleney@gmail.com', '2001-11-05', '09064792965', 'male', 23, 'abgao, maasin city');

        insert into user (user_name, password, email, date_of_birth, phone_number, gender, age, address)
        values ('blanche', 'javier', 'blanchejavier@gmail.com', '1999-01-02', '09366417934', 'female', 25, 'abgao, maasin city');

query to database:
		create table student (
			student_id int not null auto_increment,
            student_name varchar(255) not null,
            student_email varchar(255) not null,
            date_of_birth date,
            phone_number bigint,
            gender char(1) not null,
            age int,
            address varchar(255),
            primary key (student_id)
		);

query to database:
create table course (
    course_code int not null auto_increment,
    course_name varchar(255) not null,
    description mediumtext,
    primary key (course_code)
);

query to database:
    create table enrollment (
        enrollment_id int not null auto_increment,
        course_code int,
        course_name varchar(255),
        student_id int,
        student_name varchar(255),
        primary key (enrollment_id),
        foreign key (course_code) references course(course_code),
        foreign key (course_name) references course(course_name),
        foreign key (student_id) references student(student_id),
        foreign key (student_name) references student(student_name),
    );
query to database:
        create table report (
            report_code int not null auto_increment,
            course_code int,
            course_name varchar(255),
            student_id int,
            student_name varchar(255),
            student_email varchar(255),
            primary key (report_code),
            foreign key (course_code) references course(course_code),
            foreign key (course_name) references course(course_name),
            foreign key (student_id) references student(student_id),
            foreign key (student_name) references student(student_name),
            foreign key (student_email) references student(student_email)
        );
        