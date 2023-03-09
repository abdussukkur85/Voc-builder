<?php
session_start();
include_once "functions.php";
$text = '';
$_user_id = $_SESSION['id'] ?? 0;

if (!$_user_id) {
    header("location:index.php");
}

if (isset($_GET['id'])) {
    $words = getSpecificWord($_user_id, $_GET['id']);
} 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Todo/Tasks</title>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
    <link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
          integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="voc">
<div class="sidebar">
    <h4>Menu</h4>
    <ul class="menu">
        <li><a href="words.php" class="menu-item" data-target="words">All Words</a></li>
        <li><a href="#" class="menu-item" data-target="wordform">Add New Word</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</div>
<div class="container" id="main">

    <h1 class="maintitle">
        <i class="fas fa-language"></i> <br/>My Vocabularies
    </h1>
    <div class="formc helement">
        <div class="row">
            <div class="column ">
                <form action="update.php" method="post">
                    <h4>Edit Word</h4>
                    <fieldset>
                        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                        <label for="word">Word</label>
                        <input type="text" name="word" value="<?php echo $words['word']; ?>" placeholder="Word" id="word">
                        <label for="Meaning">Meaning</label>
                        <textarea name="meaning" id="Meaning" style="height:100px" rows="10"><?php echo $words['meaning']; ?></textarea>
                        <input type="hidden" name="action" value="addword">
                        <input class="button-primary" type="submit" name="submit" value="Update Word">
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

</div>
</body>
<script src="//code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="assets/js/script.js"></script>
</html>