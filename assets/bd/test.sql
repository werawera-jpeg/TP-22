create or replace view
v_employee_dept as
select d.dept_no, d.dept_name, e.emp_no,
first_name, last_name, gender from departments as d
join dept_emp as de on de.dept_no = d.dept_no
join employees as e on e.emp_no = de.emp_no;

create or replace view
v_employee_dept_current as
select ved.dept_no, ved.dept_name, e.emp_no,
first_name, last_name, gender from v_employee_dept as ved 
join dept_emp as e on ved.emp_no = e.emp_no
where e.to_date = '9999-01-01';

create or replace view
v_manager_dept as
select d.dept_no, d.dept_name, e.emp_no,
first_name, last_name from departments as d
join dept_manager as de on de.dept_no = d.dept_no
join employees as e on e.emp_no = de.emp_no;

create or replace view
v_manager_dept_current as
select ved.dept_no, ved.dept_name, e.emp_no,
first_name, last_name from v_employee_dept as ved 
join dept_manager as e on ved.emp_no = e.emp_no
where e.to_date = '9999-01-01';

-- create or replace view
-- v_employee_dept_current_nb as
-- select count(e.emp_no) as count,ved.dept_no, ved.dept_name, e.emp_no,
-- first_name, last_name from v_employee_dept as ved 
-- join dept_emp as e on ved.emp_no = e.emp_no
-- where e.to_date = '9999-01-01';

create or replace view
v_titles as
select distinct title from titles;

create or replace view
v_titles_current as
select emp.gender, emp.emp_no, first_name, last_name, title from v_employee_dept_current as emp
join titles as t on t.emp_no = emp.emp_no
where t.to_date = '9999-01-01' ;


create or replace view
v_titles_salary_current as
select salary, emp.emp_no, first_name, last_name, title from v_titles_current as emp
join salaries as s on s.emp_no = emp.emp_no
where s.to_date = '9999-01-01' ;
