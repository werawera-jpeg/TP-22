<?php
$id = $_GET['id_emp'];
$fiche = afficher_fiche($id);
?>
<main>
    <div class="container">
        
        <div class="col-lg-5 mx-auto">
            <div class="card text-center ">
                <h5 class="card-header">Fiche de l'employe n <?= $fiche['emp_no']?></h5>
                <div class="card-body">
                    <h5 class="card-title"><?= $fiche['first_name'].' '. $fiche['last_name']?></h5>
                    <p class="card-text"></p>
                    <p class="card-text">
                        <strong>Sexe :</strong> <?= $fiche['gender']?> <br>
                        <strong>Date de naissance :</strong> <?= $fiche['birth_date']?> <br>
                        <strong>Date de recrutement : </strong><?= $fiche['hire_date']?> <br>
                        <strong>Departement : </strong><?= $dept = get_current_dept($id)?> <br>
                        <strong>Emploi actuel: </strong><?= $emp = get_current_emploi($id)?> <br>
                        <strong>Salaire actuel : </strong><?= $salaire = get_current_salaire($id)?>
                    </p>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-5 mx-auto">
                <h5 class="text-center">Historique du salaire</h5>
                    <?php $salaires = historique_salaire($id)?>
                    <table class="table table-bordered">
                        <th>Valeur</th>
                        <th>Valable du</th>
                        <th>au</th>
                        <? foreach($salaires as $s){ ?>
                            <tr>
                                <td><?= $s['salary']?></td>
                                <td><?= $s['from_date']?></td>
                                <td><?= $s['to_date']?></td>

                            </tr>
                        <?php }?>
                        
                    </table>
            </div>

            <div class="col-lg-5 mx-auto">
                <h5 class="text-center">Historique des emplois</h5>
                    <?php $emplois = historique_emploi($id);
                    if ($emplois != NULL) { ?>              
                        <table class="table table-bordered">
                            <th>Post occupe</th>
                            <th>Du</th>
                            <th>au</th>
                            <? foreach($emplois as $emploi){ ?>
                                <tr>
                                    <td><?= $emploi['title']?></td>
                                    <td><?= $emploi['from_date']?></td>
                                    <td><?= $emploi['to_date']?></td>

                                </tr>
                            <?php }?>
                            
                        </table>
                    <?php }else{
                        echo "Aucun ancien poste a afficher.";
                    } ?>
            </div>
        </div>
    </div>

    

</main>