<?php 
session_start();
    include './config.php';
    $comment = $_POST['comment'];
    $post_id = $_POST['post_id'];
    $user_id = $_SESSION['user_id'];


    $insert = "INSERT INTO comment (comment,post_id,user_id) VALUES ('$comment',$post_id,$user_id)" or die();
    $result = mysqli_query($connection,$insert);
    if($result){
        echo 1;
    }else{
        echo 0;
    }

    // header("Location: {$_SERVER['HTTP_REFERER']}");



?>