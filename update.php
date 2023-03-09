<?php 
    session_start();
    include_once "dbconn.php";
    $_user_id = $_SESSION['id'] ?? 0;
    if (!$_user_id) {
        header("location:index.php");
    }


    if ($_user_id && isset($_POST['submit'])) {
        $word = $_POST['word'];
        $meaning = $_POST['meaning'];
        $id = $_POST['id'];


        $stmt = $conn->prepare("UPDATE words SET word = :word ,meaning = :meaning WHERE user_id = :user_id AND id = :id");
        $stmt->bindParam(':word', $word);
        $stmt->bindParam(':meaning', $meaning);
        $stmt->bindParam(':user_id', $_user_id);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        header("location:words.php");
    } 
?>