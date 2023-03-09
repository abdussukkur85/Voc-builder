<?php 
    session_start();
    include_once "dbconn.php";
    $_user_id = $_SESSION['id'] ?? 0;
    if (!$_user_id) {
        header("location:index.php");
    }


    if ($_user_id && isset($_GET['id'])) {
        $id = $_GET['id'];

        $stmt = $conn->prepare("DELETE FROM words WHERE user_id = :user_id AND id = :id");
        $stmt->bindParam(':user_id', $_user_id);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        header("location:words.php");
    } 
?>