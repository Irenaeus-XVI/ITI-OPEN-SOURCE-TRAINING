CREATE TABLE emp6(
   emp_id INT NOT NULL AUTO_INCREMENT,
   emp_name VARCHAR(20) NOT NULL,
   emp_address VARCHAR(20) NOT NULL,
   emp_salary INT NOT NULL,
   join_date TIMESTAMP(6) NOT NULL,
   gender BOOLEAN NOT NULL,
   status BOOLEAN NOT NULL,
   PRIMARY KEY (emp_id)
);
