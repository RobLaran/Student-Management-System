# TODO
- add sort functionality to tables (ascending and descending)  
    - 
- can search data in each feature 
    
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

CREATE VIEW ReportView AS
SELECT student.student_last_name, student.student_first_name, student.student_email,
    course.course_name,
    enrollment.year, enrollment.semester, enrollment.date_enrolled
FROM enrollment
INNER JOIN student
ON enrollment.student_id = student.student_id
INNER JOIN course
ON enrollment.course_code = course.course_code;