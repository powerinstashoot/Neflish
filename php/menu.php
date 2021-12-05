<nav id="navbar">
  <ul>
    <!--<li>
      <button onclick="onClickMenu()" class="dropbtn"><i class="fa fa-bars"></i></button>
        <div id="myDropdown" class="dropdown-content">
          <a href="#home">Pelikulak</a>
          <a href="#about">Serieak</a>
          <a href="#contact">Kritikak</a>
      </div>
    </li>-->
    <li><a href="#">Hasiera</a></li>
    <li><a href="#">Zure gustoko pelikulak</a></li>
    <li onclick="onClickMenu()" class="dropbtn">Kategoriak <i class="fa fa-arrow-down"></i></li>
    <div id="myDropdown" class="dropdown-content">
      <a href="#" onclick="kategoria('teknologia')">Teknologia</a>
      <a href="#" onclick="kategoria('bidaia')">Bidaiak</a>
      <a href="#" onclick="kategoria('janaria')">Janaria</a>
      <a href="#" onclick="kategoria('futbola')">Futbola</a>
    </div>
    <li>Bideo hoberenak</li>
    <?php
      if($_SESSION['email'] == 'admin@gmail.com'){
        echo '<li><a href="bideoa_gorde.php">Bideoak gehitu</a></li>';
      }


     ?>
    <li><a href="logout.php">Logout</a></li>
  </ul>
</nav>
