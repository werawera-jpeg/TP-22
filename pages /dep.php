<?php
$id = $_GET['id'];
$infodpt = afficher_emp($id);
// var_dump($infodpt);
?>
<main>
    <div class="col-8 text-center mx-auto">
        <h2><?= $infodpt[0]['dept_name'] ?></h2>
        <table class="table table-hover">
            <?php
            foreach($infodpt as $inf){ ?>
                <tr>
                        <td><a href="modele.php?id_emp=<?= $inf['emp_no']?>&&page=fiche.php"><?= $inf['first_name']?> <?= $inf['last_name'] ?></a></td>
                    
                </tr>
            <?php } ?> 
        </table>   
    </div>
</main>

