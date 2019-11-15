create table student (
	student INTEGER NOT NULL PRIMARY KEY,
	name VARCHAR(40) NOT NULL,
	year TINYINT NOT NULL default 1,
	dept_no INTEGER NOT NULL,
	major VARCHAR(40) 
);

create table department (
	dept_no INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	dept_name VARCHAR(40) NOT NULL UNIQUE,
	office VARCHAR(40) NOT NULL,
	office_tel VARCHAR(40)
);

alter table student
change column major VARCHAR(50);

insert into student (student, name, year, dept_no, major) 
values 
(20030001, 'Liam Johnson', 4, 2, 'Electrical Engineering'),
 (20040003, 'Jacob Lee', 3, 2, 'Electrical Engineering'),
  (20060002, 'Noah Kim', 3, 1, 'Computer Science'),
   (20100002, 'Ava Lim', 3, 4, 'Business Administration'),
    (20110001, 'Emma Watson', 2, 1, 'Computer Science'),
     (20080003, 'Lisa Maria', 4, 3, 'Law'),
     (20040002, 'Jacob William', 4, 5, 'Law'),
      (20070001, 'Emily Rose', 4, 4, 'Business Administration'),
      (20100001, 'Ethan Hunt', 3, 4, 'Business Administration'),
      (20110002, 'Jason Mraz', 2, 1, 'Electrical Engineering'),
      (20030002, 'John Smith', 5, 1, 'Computer Science'), 
      (20070003, 'Sophia Park', 4, 3, 'Law'),
       (20070007, 'James Michael', 2, 4, 'Business Administration'),
        (20100003, 'James Bond', 3, 1, 'Computer Science'),
        (20070005, 'Olivia Madison', 2, 5, 'English Language and Literature');

insert into department (dept_name, office, office_tel)
values 
('Computer Science', 'Science Building 101', '02-3290-0123'),
('Electrical Engineering', 'Engineering Building 401', '02-3290-2345'),
('Law', 'Law Building 201', '02-3290-7896'),
( 'Business Administration', 'Business Building 104', '02-3290-1112'),
('English Language and Literature', 'Language Building 303', '02-3290-4412');

update department
	set dept_name = "Electrical and Electronics Engineering"
	where dept_name = "Electrical Engineering";

insert into department (dept_name, office, office_tel)
	values ('Special Education', 'Education Building 403', '02-3290-2347');

update student set dept_no=6, major='Special Education' where name = "Emma Watson";

delete from student
	where name = 'Jason Mraz' OR name = 'John Smith';

select * from student where major = 'Computer Science';

select student, year, major from student;

select * from student where year=3;

select * from student where year<=2;

select * from department d join student s on d.dept_no = s.dept_no where d.dept_no=4;

select * from student where student like "%2007%";

select * from student order by student;

select major from student group by major HAVING avg(year) > 3;

select * from student where major = 'Business Administration' and student like "%2007%" limit 2;

select r.role
from roles r
join movies m on m.id = r.movie_id
where m.name = 'Pi';

select a.first_name, a.last_name, r.role 
from   actors a
join roles r on r.actor_id = a.id
join movies m on m.id = r.movie_id
where m.name = 'Pi';

select a.first_name, a.last_name
from actors a
join roles r1 on r1.actor_id = a.id
join roles r2 on r2.actor_id = a.id
join movies m1 on m1.id = r1.movie_id
join movies m2 on m2.id = r2.movie_id
where m1.name = 'Kill Bill: Vol. 1'
and m2.name = 'Kill Bill: Vol. 2';


select a.first_name, a.last_name
from actors a 
join roles r on a.id = r.actor_id 
group by a.id 
order by count(r.movie_id) desc
limit 7; 

select genre 
from movies_genres
group by genre
order by count(movie_id) desc
limit 3;

select d.first_name, d.last_name
from directors d
join movies_directors md on d.id = md.director_id
join movies m on md.movie_id = m.id
join movies_genres mg on m.id = mg.movie_id
where mg.genre = 'Thriller'
group by d.id
order by count(m.id) desc
limit 1;

select g.grade
from grades g
join courses c on c.id = g.course_id
where c.name = 'Computer Science 143';

select DISTINCT s.name, g.grade
from students s
join grades g on g.student_id = s.id
join courses c on c.id = g.course_id
where c.name = 'Computer Science 143' and g.grade <= 'B-';

select s.name, c.name, g.grade
from students s
join grades g on g.student_id = s.id
join courses c on c.id = g.course_id
where g.grade <= 'B-'
order by s.name;

select DISTINCT c.name
from courses c
join grades g1 on g1.course_id = c.id
join students s1 on g1.student_id = s1.id
join grades g2 on g2.course_id = c.id
join students s2 on g2.student_id = s2.id
where s1.id < s2.id;