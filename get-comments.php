<?php 
    include './config.php';
    $post_id = $_GET['post_id'];
     $select = "SELECT users.f_name,users.l_name,comment.comment FROM comment JOIN users ON comment.user_id = users.id WHERE comment.post_id = $post_id";
    $result = mysqli_query($connection,$select);
    foreach($result as $item){
?>
<div class="comment">
    <img src="https://scontent.fisb17-1.fna.fbcdn.net/v/t51.75761-15/491442733_18071621125899043_2110218967234444301_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=127cfc&_nc_ohc=aaxnJjGYDP0Q7kNvwFZAFFl&_nc_oc=Adk5g2tqlNJbwCbSPT4hmVCWr4v9KwR5zCNK9VIqGFkYiABZwpAxuW9KaaRALg5rf2q4twbNCO6jNouUMyu8kSyR&_nc_zt=23&_nc_ht=scontent.fisb17-1.fna&_nc_gid=bMBAFKHn2xiABywPqOhVqA&oh=00_AfGvDauqxvcGPyVehldMiQKiZSiBwB_XHQHnyBWv9LbByg&oe=681D50A4"
        alt="User Avatar">
    <div>
        <div class="comment-body">
            <strong>
                <?php echo $item['f_name'] . ' ' . $item['l_name'] ?>
            </strong>
            <p><?php echo $item['comment'] ?></p>
        </div>
        <div class="comment-actions">
            11h • <a href="#">Like</a> • <a href="#">Reply</a> • <a href="#">See
                translation</a>
        </div>
    </div>
</div>
<?php }?>