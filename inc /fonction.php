<?php

require("connect/connect.php");

ini_set("display error", "1");

    function afficher_manager(){
        $sql = "SELECT * from v_manager_dept_current";
        $result = mysqli_query(dbconnect(), $sql);
        // echo $sql;
        
        if ($result){
            $liste = [];
            while ($row = mysqli_fetch_assoc($result)){
                $liste[]= $row;
            } 
            return $liste;
        }else{
            $liste = [];
            return $liste;
        }
    }

    function afficher_infodpt($no_dept){
        $sql = "select * from departments where dept_no = %s";
        $sql = sprintf($sql, $no_dept);
        if ($result){
            $liste = [];
            while ($row = mysqli_fetch_assoc($result)){
                $liste[]= $row;
            } 
            return $liste;
        }else{
            $liste = [];
            return $liste;
        }
    }

    function afficher_emp($no_dept){
        $sql = "SELECT * from v_employee_dept_current
        where dept_no = '%s'
        order by first_name asc";

        $sql = sprintf($sql,$no_dept);
        // echo $sql;
        $result = mysqli_query(dbconnect(),$sql);
        if ($result){
            $retour = [];
            while ($row = mysqli_fetch_assoc($result)){
                $retour[]= $row;
            } 
            return $retour;
        }else{
            $retour = [];
            return $retour;
        }
    }

    function afficher_fiche($emp_no){
        $sql = "select * from employees where emp_no = $emp_no ";
        $result = mysqli_query(dbconnect(), $sql);
        // echo $sql;
        if ($result){
            $retour = [];
            while ($row = mysqli_fetch_assoc($result)){
                $retour = $row;
            } 
            return $retour;
        }else{
            $retour = [];
            return $retour;
        }
    }

    function get_current_dept($emp_no){
        $sql = "select dept_name from v_employee_dept_current where emp_no = $emp_no";
        $result = mysqli_query(dbconnect(), $sql);
        $retour = mysqli_fetch_assoc($result);
        return $retour['dept_name'];
    }

    function historique_salaire($emp_no){
        $sql = " select * from salaries where emp_no = $emp_no 
        and to_date != '9999-01-01'";
        $result = mysqli_query(dbconnect(), $sql);
        // echo $sql;
        if ($result){
            $retour = [];
            while ($row = mysqli_fetch_assoc($result)){
                $retour[] = $row;
            } 
            return $retour;
        }else{
            $retour = [];
            return $retour;
        }
    }

    function get_current_salaire($emp_no){
        $sql = " select * from salaries where emp_no = $emp_no 
        and to_date = '9999-01-01'";
        $result = mysqli_query(dbconnect(), $sql);
        $retour = mysqli_fetch_assoc($result);
        return $retour['salary'];
    }

    function get_current_emploi($emp_no){
        $sql = "select title from titles where emp_no = $emp_no
        and to_date = '9999-01-01'";
        $result = mysqli_query(dbconnect(), $sql);
        $retour = mysqli_fetch_assoc($result);
        return $retour['title'];
    }

    function historique_emploi($emp_no){
        $sql = " select * from titles where emp_no = $emp_no 
        and to_date != '9999-01-01'";
        $result = mysqli_query(dbconnect(), $sql);
        // echo $sql;
        if ($result){
            $retour = [];
            while ($row = mysqli_fetch_assoc($result)){
                $retour[] = $row;
            } 
            return $retour;
        }else{
            $retour = [];
            return $retour;
        }
    }

    

    function afficher_recherche_dep($nom_dep){
        ?>
        <?php
        $sql = "SELECT employees.emp_no, departments.dept_name, employees.first_name, employees.last_name 
        from departments 
        join dept_emp on departments.dept_no = dept_emp.dept_no
        join employees on dept_emp.emp_no = employees.emp_no
        where departments.dept_name like '%$nom_dep%'";
        //  echo $sql;
         $result = mysqli_query(dbconnect(),$sql);
         ?>
        <table class="table table-striped border">
            <?php
        if ($result){
            while ($row = mysqli_fetch_assoc($result)){
                ?><h1><?= $row['dept_name'] ?></h1><?php
                while ($row = mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                    <td><a href="modele.php?id_emp=<?= $row['emp_no']?>&&page=fiche.php"><?= $row['first_name']?> <?= $row['last_name'] ?></a></td>
                    </tr>
                    <?php
                } 
                break;
            } 
        ?>
        </table>        
        <?php
        
        }
    }


    function afficher_recherche_name($name){
        $sql = "SELECT employees.emp_no, departments.dept_name, employees.first_name, employees.last_name 
        from departments 
        join dept_emp on departments.dept_no = dept_emp.dept_no
        join employees on dept_emp.emp_no = employees.emp_no
        where employees.first_name like '%$name%' or employees.last_name like '%$name%'";
        // echo $sql;
        $result = mysqli_query(dbconnect(),$sql);
         ?>
        <table class="table table-striped border">
            <tr>
                <th>Departement</th>
                <th>Employees</th>
            </tr>
            <?php
        if ($result){
                while ($row = mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                    <td><?= $row['dept_name']?></td>
                    <td><a href="modele.php?id_emp=<?= $row['emp_no']?>&&page=fiche.php"><?= $row['first_name']?> <?= $row['last_name'] ?></a></td>
                    </tr>
                    <?php
                } 
        ?>
        </table>        
        <?php
        
        }
    }

    function get_nbemp($dept_no){
        $sql = "select count(emp_no) as count from dept_emp
        where dept_no = '%s'";
        $sql = sprintf($sql, $dept_no);
        $result = mysqli_query(dbconnect(), $sql);
        // echo $sql;
        $retour = mysqli_fetch_assoc($result);
        return $retour['count'];

    }

    function afficher_emplois(){
        $sql = " select * from v_titles order by title asc";
        $result = mysqli_query(dbconnect(), $sql);
        // echo $sql;
        if ($result){
            $retour = [];
            while ($row = mysqli_fetch_assoc($result)){
                $retour[]= $row;
            } 
            return $retour;
        }else{
            $retour = [];
            return $retour;
        }
    }

    function count_homme($title){
        $sql = "select count(emp_no) as count from v_titles_current where
        gender = 'M' and title ='%s'";
        $sql = sprintf($sql, $title);
        $result = mysqli_query(dbconnect(), $sql);
        // echo $sql;
        $retour = mysqli_fetch_assoc($result);
        return $retour['count'];
    }

    function count_femme($title){
        $sql = "select count(emp_no) as count from v_titles_current where
        gender = 'F' and title ='%s'";
        $sql = sprintf($sql, $title);
        $result = mysqli_query(dbconnect(), $sql);
        // echo $sql;
        $retour = mysqli_fetch_assoc($result);
        return $retour['count'];
    }

    function moyenne_salaire($title){
        $sql = "select avg(salary) as avg from v_titles_salary_current where title ='%s'";
        $sql = sprintf($sql, $title);
        $result = mysqli_query(dbconnect(), $sql);
        // echo $sql;
        $retour = mysqli_fetch_assoc($result);
        return $retour['avg'];
    }

    // function calcul_duree(){
        
    // }




?>