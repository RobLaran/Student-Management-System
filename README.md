# Scope of the project:
    - User must authenticate
    - Manage students (add, edit, and delete)
    - Show a list of students
    - Manage courses (create, edit, and delete)
    - Also shows the list of courses
    - Enrolls students by selecting from the list of students and courses
    - Generate reports (like how many students enrolled, courses available)


# Features:
    - User authentication:
        * login/logout functionality
        * regiser account
        * secure password by hashing
    - Student management
        * add students (by filling up the forms)
        * edit students (make changes with existing details)
        * remove students
        * show a list of students added
    - Course management
        * add courses (filling up the forms) 
        * edit course's details
        * remove course
        * show a list of courses added
    - Enrollemnt management
        * enroll students by selecting from the list of students and assign them which courses they would apply
        * show list of enrolled students
        * unenroll students
    - Generate reports
        * display enrolled students with their courses
        * display available courses



# Database Schema:

Entities:
	User
		- user_id (Primary key)
		- username
		- password
		- email
		- date_of_birth
		- phone_number
		- gender
		- age
		- address
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

	Student
		- student_id (Primary key)
		- student_name(Fname, Lname)
		- student_email
		- date_of_birth
		- phone_number
		- gender
		- age
		- address
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
        
	Course
		- course_code (Primary key)
		- course_name
		- description
    query to database:
        create table course (
            course_code int not null auto_increment,
            course_name varchar(255) not null,
            description mediumtext,
            primary key (course_code)
        );

	Enrollment
		- enrollment_id (Primary key)
		- course_code (Foreign key)
		- course_name (Foreign key)
		- student_id (Foreign key)
		- student_name (Foreign key)
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

	Report
		- report_code (Primary key)
		- course_code (Foreign key)
		- course_name (Foreign key)
		- student_id (Foreign key)
		- student_name (Foreign key)
		- student_email (Foreign key)
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
















	
