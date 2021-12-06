<header>
  <div class="container">
    <a href="neflish.php"><h2 class="logo">Neflish</h2></a>
    <nav>
        <!--<li>
          <button onclick="onClickMenu()" class="dropbtn"><i class="fa fa-bars"></i></button>
            <div id="myDropdown" class="dropdown-content">
              <a href="#home">Pelikulak</a>
              <a href="#about">Serieak</a>
              <a href="#contact">Kritikak</a>
          </div>
        </li>-->
        <a href="neflish.php">Hasiera</a>
        <a href="bideoGustokoak.php">Zure gustoko pelikulak</a>
        <a href="bideoHoberenak.php">Bideo hoberenak</a>
        <?php
          if($_SESSION['email'] == 'admin@gmail.com'){
            echo '<a href="bideoa_gorde.php">Bideoak gehitu</a>';
          }


         ?>
        <a href="logout.php">Logout</a>

    </nav>

  </div>

</header>
