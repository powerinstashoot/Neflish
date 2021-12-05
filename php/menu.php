<header>
  <div class="container">
    <h2 class="logo">Neflish</h2>
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
        <a href="#">Zure gustoko pelikulak</a>
        <div class="dropdown">
          <a href="#" onclick="onClickMenu()" class="dropbtn">Kategoriak <i class="fa fa-arrow-down"></i></a>
          <div id="myDropdown" class="dropdown-content">
            <a href="#" onclick="kategoria('teknologia')">Teknologia</a>
            <a href="#" onclick="kategoria('bidaia')">Bidaiak</a>
            <a href="#" onclick="kategoria('janaria')">Janaria</a>
            <a href="#" onclick="kategoria('futbola')">Futbola</a>
          </div>
        </div>
        <a href="#">Bideo hoberenak</a>
        <?php
          if($_SESSION['email'] == 'admin@gmail.com'){
            echo '<a href="bideoa_gorde.php">Bideoak gehitu</a>';
          }


         ?>
        <a href="logout.php">Logout</a>

    </nav>

  </div>

</header>
