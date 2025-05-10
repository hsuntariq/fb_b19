<?php 
    include './config.php';
    $post_id = $_GET['post_id'];
     $select = "SELECT COUNT(id) AS total FROM comment WHERE comment.post_id = $post_id";
    $result = mysqli_query($connection,$select);
    foreach($result as $item){
?>
<span><?php echo $item['total']?> comments</span>
<?php }?>