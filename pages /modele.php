<?php require("../inc/fonction.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>employees</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/bootstrap/css/bootstrap.min.css">
</head>

<header>
    <!-- <h2 class="text-center"><a href="../index.php">Home</a></h2> -->
    <ul class="nav nav-underline">
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="modele.php?page=stat.php">Stats des emplois</a>
        </li>
    </ul>
</header>


<body>
    <?php include ($_GET['page']) ?>

</body>
<footer>
    <p class="text-center">&copy; Copyleft 2025 </p>
</footer>
</html>