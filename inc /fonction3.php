<?php

require("connect/connect.php");

ini_set("display error", "1");

    function afficher_manager(){
        $sql = "SELECT departments.dept_no as dept_no , departments.dept_name as dept_name, first_name, last_name from departments 
        join  dept_manager on departments.dept_no = dept_manager.dept_no
        join employees on dept_manager.emp_no = employees.emp_no
        where dept_manager.to_date = '9999-01-01'";
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
        $sql = "SELECT employees.emp_no, departments.dept_name, employees.first_name, employees.last_name from departments 
        join dept_emp on departments.dept_no = dept_emp.dept_no
        join employees on dept_emp.emp_no = employees.emp_no
        where dept_emp.dept_no = '%s'";
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

    function afficher_par_age(){
        
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

    function afficher_fiche($emp_no){
        $sql = "select * from employees where emp_no = $emp_no ";
        // $sql = sprintf($sql, $no_dept);
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

  




?>