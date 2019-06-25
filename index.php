<?php require "header.php" ?>
    <main class="container">
        <aside>
            <div class="categories">
                <div class="catTop">
                    <h4>Kategorier:</h4>
                </div>
                <div class="catMain">
                    <ul>
                        <li><a href="assets/filterProduct.php?id=Jakker">Jakker</a></li>
                        <li><a href="assets/filterProduct.php?id=Bukser">Bukser</a></li>
                        <li><a href="assets/filterProduct.php?id=Skjorter">Skjorter</a></li>
                        <li><a href="assets/filterProduct.php?id=Strik">Strik</a></li>
                        <li><a href="assets/filterProduct.php?id=T-shirts & Tank tops">T-shirts & Tank tops</a></li>
                        <li><a href="assets/filterProduct.php?id=Tasker">Tasker</a></li>
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
                <?php include "assets/getProducts.php" ?>
            </div>
        </div>
    </main>
    <?php require "footer.php" ?>