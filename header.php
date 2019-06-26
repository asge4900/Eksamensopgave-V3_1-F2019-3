<?php
$activePage = basename($_SERVER['PHP_SELF'], ".php");
  if(!isset($_SESSION))
  {
      session_start();
  }
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $title; ?> | FancyClothes.dk</title>
    <meta name="description" content="Velkommen til FancyClothes.dk">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Karla|Lato|Oswald" rel="stylesheet">

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/slider.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="top container">
        <div class="language">
            <div class="flag">
                <img src="img/ikon.png" alt="Dansk ikon">
                <span>Dansk</span>
            </div>
            <span>DKK</span>
        </div>
        <div class="search">
            <input type="text" placeholder="Indtast søgning"><input type="submit" value="Søg">
        </div>
    </div>
    <hr>
    <div class="container home">
        <a href="index.php"><img src="img/homeIcon.png" alt="Forside ikon"></a>
        <!-- Velkomstbesked -->
        <h2>
            <?php
                if (isset($_SESSION['username'])) {
                echo "<p>Velkommen ".$_SESSION['username']."</p>";
                }
            ?>
        </h2>
    </div>
    <hr>
    <div class="container navbar">
        <nav>
            <ul>
                <li class="<?= ($activePage == 'index') ? 'active':''; ?>"><a href="index.php">Forside</a></li>
                <li class="<?= ($activePage == 'products') || ($activePage == 'filterProduct')? 'active':''; ?>"><a href="products.php">Produkter</a></li>
                <li class="<?= ($activePage == 'news') ? 'active':''; ?>"><a href="#">Nyheder</a></li>
                <li class="<?= ($activePage == 'conditions') ? 'active':''; ?>"><a href="#">Handelsbetingelser</a></li>
                <li class="<?= ($activePage == 'about') ? 'active':''; ?>"><a href="#">Om os</a></li>
                <li class="<?= ($activePage == 'contact') ? 'active':''; ?>"><a href="contact.php">Kontakt</a></li>
                <?php  if (isset($_SESSION['username'])) { ?>
                    <li><a href='assets/logout.php' class='loginBtn'>Log ud</a></li>
                <?php }
                else { ?>
                    <li><a href='#' class='loginBtn'>Log ind</a></li>
                    <li class="<?= ($activePage == 'register') ? 'active':''; ?>"><a href='register.php' class='loginBtn'>Opret bruger</a></li>
                <?php } ?>
            </ul>
        </nav>
        <div class="basket">
            <div class="basketContent">
                <p>Din indkøbskurv er tom</p>
            </div>
            <div class="shopIcon">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            </div>
        </div>
    </div>
    <div class="login container">
        <form action="assets/login.php" method="post">
            <label for="formUsername">Bruger:</label>
            <input type="text" id="formUsername" name="formUsername" placeholder="Brugernavn" required>
            <label for="formPassword">Password:</label>
            <input type="password" id="formPassword" name="formPassword" placeholder="Password" required>
            <input type="submit" value="Log ind">
        </form>
        <a id="newUser" href="register.php">Ny bruger?</a>
    </div>
    <hr>
    <div class="container">
        <ul class="slider" id="slider">
            <li><img src="img/slide1.jpg" alt=""></li>
            <li><img src="img/slide2.jpg" alt=""></li>
            <li><img src="img/slide3.jpg" alt=""></li>
        </ul>
    </div>
    <hr class="hide400">
    <h1 class="tagline">FancyClothes.DK - tøj, kvalitet, simpelt!</h1>
    <hr>

    <?php  if (isset($_SESSION['username'])) { ?>
        <div class="createArticle container">
            <h3 class="center errorMsg">Opret ny vare:</h3>
            <form action="assets/addProduct.php" method="post" enctype="multipart/form-data">
                <div>
                    <label for="imgSrc">Billede</label>
                    <input type="text" id="imgSrc" name="imgSrc" placeholder="Vælg billede" required>
                </div>
                <div>
                    <label for="imgAlt">Alt tekst</label>
                    <input type="text" id="imgAlt" name="imgAlt" placeholder="Billedets alttekst..." required>
                </div>
                <div>
                    <label for="heading">Overskrift</label>
                    <input type="text" id="heading" name="heading" placeholder="Overskrift..." required>
                </div>
                <div>
                    <label for="content">Brødtekst</label>
                    <textarea name="content" id="content" cols="30" rows="10" placeholder="Brødtekst..."></textarea>
                </div>
                <div>
                    <label for="stars">Antal stjerner</label>
                    <select name="stars" id="stars">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div>
                    <label for="category">Kategori</label>
                    <select name="category" id="category" required>
                        <option value="jakker">Jakker</option>
                        <option value="bukser">Bukser</option>
                        <option value="skjorter">Skjorter</option>
                        <option value="strik">Strik</option>
                        <option value="tshirts">T-shirts og tanktops</option>
                        <option value="tasker">Tasker</option>
                    </select>
                </div>
                <div>
                    <input type="submit" value="Opret" name="value">
                </div>
            </form>
        </div>
    <?php } ?>