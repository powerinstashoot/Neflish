<header>
  <div class="container">
    <a href="neflish.php" style="text-decoration:none"><h2 class="logo">Neflish</h2></a>
    <nav class="menu">
        <a href="neflish.php" class="">Hasiera</a>
        <a href="bideoGustokoak.php" class="">Zure gustoko pelikulak</a>
        <a href="bideoHoberenak.php" class="">Pelikula hoberenak</a>
        <?php
          if($_SESSION['email'] == 'admin@gmail.com'){
            echo '<a href="bideoa_gorde.php" class="">Pelikulak gehitu</a>';
          }
        ?>
        <a href="logout.php">Logout</a>
    </nav>
  </div>
</header>