<?php

require("connect/connect.php");

ini_set("display error", "1");

    function afficher_manager(){
        $sql = "SELECT dept_no, departments.dept_name, first_name, last_name from departments 
        join  dept_manager on departments.dept_no = dept_manager.dept_no
        join employees on dept_manager.emp_no = employees.emp_no";
        $result = mysqli_query(dbconnect(), $sql);
        echo $sql;
        
        if ($result){
            $comment = [];
            while ($row = mysqli_fetch_assoc($result)){
                $comment[]= $row;
            } 
            return $comment;
        }else{
            $comment = [];
            return $comment;
        }
    }

    function afficher_emp($no_dept){
        $sql = "SELECT departements.dept_name,employees.first_name,employees.last_name from employees 
        join departements on departements.dept_no = dept_emp.dept_no
        join dept_emp on dept_emp.emp_no = employees.emp_no where 
        dept_emp.dept_no = %s";
        $sql = sprintf($sql,$no_dept);
        echo $sql;
        $result = mysqli_query(dbconnect(),$sql);
        if ($result){
            $comment = [];
            while ($row = mysqli_fetch_assoc($result)){
                $comment[]= $row;
            } 
            return $comment;
        }else{
            $comment = [];
            return $comment;
        }
    }

    function afficher_infodpt($no_dept){
        $sql = "select * from departments where dept_no = %s";
        echo $sql;
        $sql = sprintf($sql, $no_dept);
        if ($result){
            $comment = [];
            while ($row = mysqli_fetch_assoc($result)){
                $comment[]= $row;
            } 
            return $comment;
        }else{
            $comment = [];
            return $comment;
        }
    }


?>