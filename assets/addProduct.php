<?php
    session_start();
    $title = $_POST['heading'];
    $imgSrc = $_POST['imgSrc'];
    $imgAlt = $_POST['imgAlt'];
    $content = $_POST['content'];
    $stars = $_POST['stars'];
    $category = $_POST['category'];
    $userId = $_SESSION['id'];


    require_once "connect.php";


    $statement = $dbh->prepare("INSERT INTO products (title, imgSrc, imgAlt, content, userId, stars, category) VALUES(?, ?, ?, ?, ?, ?, ?)");

    $statement->bindParam(1, $title);
    $statement->bindParam(2, $imgSrc);
    $statement->bindParam(3, $imgAlt);
    $statement->bindParam(4, $content);
    $statement->bindParam(5, $userId);
    $statement->bindParam(6, $stars);
    $statement->bindParam(7, $category);

    $statement->execute();

    header("location: ../index.php");



