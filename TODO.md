# TODO
    - fix data duplication
    - add sort functionality to lists (ascending and descending)
    
# DONE
    - implemented user registration
    - implemented user login
    - created queries to database for login functionalities 
    - fixed login functionality
    - organize file structures and php contents
    - create session and implement logout functionalities
    - create templates 
    - add the student functionality
    - add the course functionality
    - add the enroll functionality
    - add the reports functionality
    - on delete cascade that associates with student data
    - construct the profile feature and its design
    - profile: add change password functionality
    - add unenroll function
    - add a constraint when data already exist


Queries:

query to database:
    * USER
        -create table for user
            create table user (
                user_id int not null auto_increment,
                user_name varchar(255) not null,
                password varchar(255) not null,
                email varchar(255) not null,
                date_of_birth date,
                phone_number bigint,
                gender char(1) not null,
                address varchar(255),
                primary key (user_id)
            );

        -add user 
            query = "INSERT INTO user (user_name, password, email, date_of_birth, phone_number, gender, address)  
                VALUES (?, ?, ?, ?, ?, ?, ?)"

            SAMPLES
            insert into user (user_name, password, email, date_of_birth, phone_number, gender, age, address)
            values ('rob', 'laran', 'laranrobelleney@gmail.com', '2001-11-05', '09064792965', 'male', 23, 'abgao, maasin city');

            insert into user (user_name, password, email, date_of_birth, phone_number, gender, age, address)
            values ('blanche', 'javier', 'blanchejavier@gmail.com', '1999-01-02', '09366417934', 'female', 25, 'abgao, maasin city');

    * STUDENT
        -create table for student
            create table student (
                student_id int not null auto_increment,
                student_first_name varchar(255) not null,
                student_last_name varchar(255) not null,
                student_email varchar(255) not null,
                date_of_birth date,
                phone_number bigint,
                gender varchar(25) not null,
                address varchar(255),
                primary key (student_id)
            );

        -add student query
            query = "INSERT INTO student (user_id, student_first_name, student_last_name, student_email, date_of_birth, phone_number, gender, address)  
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)"

            SAMPLES
            insert into student (user_id, student_first_name, student_last_name, student_email, date_of_birth,        phone_number, gender, address)
            values (29, 'Bruno', 'Boy', 'bb@gmail.com', '2004-08-26',
            NULL, 'male[0-9]{3} [0-9]{4}', 'Abgao, Maasin City');

            insert into student (user_id, student_first_name, student_last_name, student_email, date_of_birth,        phone_number, gender, address)
            values (29, 'Chappy', 'White', 'chap@gmail.com', '2008-05-14',
            NULL, 'male', 'Combado, Maasin City');

            insert into student (user_id, student_first_name, student_last_name, student_email, date_of_birth,        phone_number, gender, address)
            values (32, 'Puss', 'Kat', 'kiten@gmail.com', '2003-07-02',
            NULL, 'female', 'Lib-og, Maasin City');


    * COURSE
        - create table course
            create table course (
                course_code int not null auto_increment,
                course_name varchar(255) not null,
                description mediumtext,
                user_id int,
                primary key (course_code),
                foreign key (user_id) references user(user_id)
            );

        -add course query
            query = "INSERT INTO course (user_id, course_name, description)  
            VALUES (?, ?, ?)"

            SAMPLES
            INSERT INTO course (user_id, course_name, description)  
            VALUES (32, "Criminology", "Ratatatat and Arrest");

    * Enrollment
        create table enrollment (
            enrollment_id int not null auto_increment,
            course_code int,
            student_id int,
            year int not null,
            semester int not null,
            date_enrolled date not null,
            primary key (enrollment_id),
            foreign key (course_code) references course(course_code),
            foreign key (student_id) references student(student_id)
        );

        - enroll student query
            query = "INSERT INTO enrollemnt (
                student_id, course_code, year, semester, date_enrolled)  
            VALUES (?, ?, ?, ?, ?)"

        - unenroll student query
            query = "DELETE FROM enrollemnt 
                    WHERE enrollment_id = ?"

        - fetch all enrolled students query
            query = "SELECT * FROM enrollemnt"

        - fetch an enrolled student query
            query = "SELECT * FROM enrollment
                    WHERE student_id = ? AND course_code = ?"

        - fetch enrollment id query
            query = "SELECT enrollment_id FROM enrollment
                    WHERE student_id = ? AND course_code = ?"

    * Report
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
        