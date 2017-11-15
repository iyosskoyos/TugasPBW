CREATE VIEW enrollment_data AS
SELECT Courses.code as Code, Courses.course as Course, Users.userID as ID, Users.name as Name, UserGroups.name as Position
FROM Users JOIN UserGroups ON Users.ID_UG = UserGroups.ID_UG
JOIN Enrollments ON Users.ID_U = Enrollments.ID_U
JOIN Courses ON Courses.ID_C = Enrollments.ID_C