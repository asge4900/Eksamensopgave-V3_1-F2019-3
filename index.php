<?php
    $title = "Forside";
    require_once "assets/connect.php";
    require "header.php";

    $statement = $dbh->prepare("SELECT * FROM products JOIN users ON users.userId = products.userId LIMIT 3");
    $statement->execute();

    ?>
     <main class="container">
        <aside>
            <div class="categories">
                <div class="catTop">
                    <h4>Kategorier:</h4>
                </div>
                <div class="catMain">
                    <ul>
                        <li><a href="filterProduct.php?id=Jakker">Jakker</a></li>
                        <li><a href="filterProduct.php?id=Bukser">Bukser</a></li>
                        <li><a href="filterProduct.php?id=Skjorter">Skjorter</a></li>
                        <li><a href="filterProduct.php?id=Strik">Strik</a></li>
                        <li><a href="filterProduct.php?id=tshirts">T-shirts & Tank tops</a></li>
                        <li><a href="filterProduct.php?id=Tasker">Tasker</a></li>
                    </ul>
                </div>
            </div>

            <div class="newsletter">
                <div class="newsTop">
                    <h4>Tilmeld nyhedsbrev</h4>
                </div>
                <div class="newsMain">
                    <form action="">
                        <input type="text" placeholder="Navn">
                        <input type="email" placeholder="Email">
                </div>
                <div class="newsBottom">
                    <input type="submit" value="Tilmeld">
                    </form>
                </div>
            </div>
        </aside>
        <div class="products">
            <h3>INSPIRATION</h3>
            <hr>
            <div class="inspiration">
                <div class="catMen">
                    <img src="img/kategoriHerre.jpg" alt="">
                    <h5>Herretøj</h5>
                    <div class="action">Lær mere</div>
                </div>
                <div class="catWomen">
                    <img src="img/kategoriKvinde.jpg" alt="">
                    <h5>Kvindetøj</h5>
                    <div class="action">Lær mere</div>
                </div>
            </div>
            <div class="frontProducts">
            <?php
    while ($row = $statement->fetch()) {
        setlocale(LC_ALL, 'da_DK');
        ?>
            <article>
                    <img src="<?php echo $row['imgSrc']; ?>" alt="<?php echo $row['imgAlt']; ?>">
                    <div class="info">
                        <h3><?php echo $row['title']; ?></h3>
                        <div class="stars">
                           <?php
                           $stars = $row['stars'];

                           for ($i=1; $i <= $stars; $i++) {
                               echo "<i class='fa fa-star' aria-hidden='true'></i>";
                           }

                           for ($i=1; $i <= 5-$stars; $i++) {
                               echo "<i class='fa fa-star-o' aria-hidden='true'></i>";
                           }
                           ?>
                        </div>
                    </div>
                    <div class="description">
                        <div class="published">
                            Oprettet: <?php echo strftime("%A d. %d/%m/%Y", strtotime($row['published'])). " af " .$row['dbUsername']; ?>
                        </div>
                        <p><?php echo $row['content']; ?>
                            <a href="#">Læs mere...</a></p>
                        <!-- Mulighed for sletning herunder -->
                    </div>
            </article>
        <?php
    }
    ?>
    </div>
        </div>
    </main>
    <?php
    require "footer.php";