<?php $dept = afficher_manager();?>
<div class="row">

  <div class="col-4 text-center mx-auto">    
    <nav>
      <div class="row">
          <form action="traitement/traitement_recherche.php" method="get">
            <h1>Search</h1>
            <input type="text" name="dep" id="" placeholder="Select a departement...">
            <br><br>
            <input type="text" name="nom" id="" placeholder="Employee's name...">
            <br><br>
            <p><input type="number" name="min" placeholder="age min..." id="">  <input type="number" name="max" placeholder="age max..." id=""></p>
            <br>
            <input type="submit" value="Search">
          </form>
    
    </nav>
  </div>

  <div class="col-8">
    <?php
    if(isset($_GET['id'])){
    include("index_enter.php");
    }
    ?>  
    <?php
    if(!isset($_GET['id'])){ ?>

      <table class="table table-hover">
          <th>Liste des departements</th>
          <th>Manager actuel</th>
          <th>Nombre d'employes</th>
          <? foreach ($dept as $d){ ?>
              <tr> 
                <td>
                    <a href="modele.php?id=<?= $d['dept_no'] ?>&&page=dep.php">
                      <?php echo $d['dept_name'] ;?></a>
                </td>
            
                <td><?php echo $d['first_name'].' '.$d['last_name']?></td>

                <?php $nb = get_nbemp($d['dept_no']); ?>
                <td> <?= $nb ?></td>
              </tr>
          <?php } ?>
      </table>
    <?php } ?>  
    
    </div>

  <!-- <div class="col-8 text-center mx-auto">
    <main>
        <table class="table table-hover">
          <th>Liste des departements</th>
          <th>Manager actuel</th>
          <? foreach ($dept as $d){ ?>
              <tr> 
                <td>
                    <a href="modele.php?id=<?= $d['dept_no'] ?>&&page=dep.php">
                      <?php echo $d['dept_name'] ;?></a>
                </td>
                  <td><?php echo $d['first_name'].' '.$d['last_name']?></td>
              </tr>
          <?php } ?>
        </table>
    </main>
  </div>

  

</div>   -->