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
	Student
		- student_id (Primary key)
		- student_name(Fname, Lname)
		- student_email
		- date_of_birth
		- phone_number
		- gender
		- age
		- address
	Course
		- course_code (Primary key)
		- course_name
		- description
  Enrollment
		- enrollment_id (Primary key)
		- course_code (Foreign key)
		- course_name (Foreign key)
		- student_id (Foreign key)
		- student_name (Foreign key)
   
	Report
		- report_code (Primary key)
		- course_code (Foreign key)
		- course_name (Foreign key)
		- student_id (Foreign key)
		- student_name (Foreign key)
		- student_email (Foreign key)
    
















	