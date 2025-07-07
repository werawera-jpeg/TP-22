<?php
if($_GET['id']=='1'){
    afficher_recherche_dep($_SESSION['dep']);
}
if($_GET['id']=='2'){
    afficher_recherche_name($_SESSION['nom']);
}

?>