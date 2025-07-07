<div class="row">
<div class="col-lg-5 mx-auto">
    <h5 class="text-center">Statistiques des emplois</h5>
        <?php $liste = afficher_emplois() ?>
        <table class="table table-bordered">
            <th>Titre</th>
            <th>Effectif hommes </th>
            <th>Effectif femmes </th>
            <th>Salaire moyen</th>
            <? foreach($liste as $l){ ?>
                <tr>
                    <td><?= $l['title']?></td>
                    <td><?= $h = count_homme($l['title']);?></td>
                    <td><?= $f = count_femme($l['title'])?></td>
                    <td><?= $a = moyenne_salaire($l['title'])?></td>


                </tr>
            <?php }?>
            
        </table>
</div>



