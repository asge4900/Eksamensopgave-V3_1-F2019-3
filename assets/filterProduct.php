<?php
    require_once "connect.php";

    $id = $_GET['id'];
    echo $id;

    $statement = $dbh->prepare("SELECT products WHERE category = ?");
    $statement->execute();

    while ($row = $statement->fetch()) {
        $date = new DateTime($row['published']);
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
                        <!-- Dag d. d/m-yyyy -->
                            Oprettet: <?php echo $date->format('d-m-Y'). " af " .$row['dbUsername']; ?>
                        </div>
                        <p><?php echo $row['content']; ?>
                            <a href="#">Læs mere...</a></p>
                        <!-- Mulighed for sletning herunder -->
                    </div>
            </article>
        <?php
    }