<style>
.post-container {

    margin: 20px auto;
    border: 1px solid #ddd;
    border-radius: 10px;
    background-color: #fff;
}

.post-header {
    padding: 10px 15px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #ddd;
}

.post-image {
    width: 100%;
    height: 300px;
    background-color: #333;
}

.reaction-stats {
    padding: 10px 15px;
    display: flex;
    justify-content: space-between;
    border-bottom: 1px solid #ddd;
}

.action-buttons {
    display: flex;
    justify-content: space-around;
    padding: 10px 15px;
    border-bottom: 1px solid #ddd;
}

.comment-section {
    padding: 15px;
}

.comment {
    display: flex;
    margin-bottom: 15px;
}

.comment img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-right: 10px;
}

.comment-body {
    background-color: #f1f1f1;
    padding: 10px;
    border-radius: 15px;
    flex-grow: 1;
}

.comment-actions {
    margin-top: 5px;
    font-size: 0.9em;
    color: #666;
}

.comment-input {
    display: flex;
    align-items: center;
    margin-top: 15px;
}

.comment-input img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-right: 10px;
}

.comment-input input {
    flex-grow: 1;
    padding: 8px;
    border-radius: 20px;
    border: 1px solid #ddd;
}
</style>
<?php 
    include './config.php';
    $select = "SELECT posts.id AS post_id,posts.image,posts.caption,users.id AS user_id,users.f_name,users.l_name FROM posts JOIN users ON users.id = posts.user_id ORDER BY(posts.id) DESC";
    $result = mysqli_query($connection,$select);
    foreach($result as $item){
?>

<div class="card col-12 col-lg-9 mx-auto p-3 shadow-lg rounded-3 my-3 posts">

    <!-- post-nav-bar -->
    <div>
        <!-- user info -->
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-2">
                <div>
                    <img src="https://scontent.fisb17-1.fna.fbcdn.net/v/t1.30497-1/453178253_471506465671661_2781666950760530985_n.png?stp=dst-png_s120x120&_nc_cat=1&ccb=1-7&_nc_sid=136b72&_nc_ohc=5L0V52iBq3wQ7kNvwFxMGrs&_nc_oc=Adn2KAkdGrOw1X6hZsftI_G74h5I9PKj1wHeoMPtJ1MBClITRntOs0zXrqjaxKeDlFeR5m3kIFZqPbggLMfev7KF&_nc_zt=24&_nc_ht=scontent.fisb17-1.fna&oh=00_AfH72_R8U-VLFvbpl3ksBfhP9RieTYbfGT28GgCFc8jOtw&oe=6835B5FA"
                        width="40px" height="40px" class="rounded-circle border border-secondary-subtle" alt="">
                </div>
                <div>
                    <h6 class="m-0 text-capitalize fw-bold ">
                        <?php echo $item['f_name'] . ' ' . $item['l_name'] ?>
                    </h6>
                    <span class="text-secondary text-capitalize fw-bold"> 22h</span>
                </div>

            </div>


            <!-- delete post -->
            <div class="d-flex align-items-center gap-3">
                <i class="bi bi-three-dots fs-4 text-secondary  " style="cursor: pointer;"></i>
                <i class="bi bi-x-lg fs-4 text-secondary  " style="cursor: pointer;"></i>


            </div>

        </div>

        <!-- caption -->

        <p>
            <?php echo $item['caption'] ?>
        </p>

    </div>
    <!-- post image -->
    <div class="">
        <img height="400px" style="object-fit:contain" src='./post_images/<?php echo $item['image'] ?>' alt="post"
            width="100%">
    </div>

    <!-- post LIkes and Comments -->
    <div class="py-3">

        <!-- likes values -->

        <div class="d-flex align-items-center justify-content-between">

            <!-- likes couts -->
            <div>

                <span>😀</span>
                <span>🥰</span>
                <span>💓</span>
                <span class="text-secondary">100M</span>
            </div>


            <!-- comments and shere -->

            <div class="d-flex align-items-center  gap-3">
                <h6 class="text-secondary ">187M Comments</h6>
                <h6 class="text-secondary ">187k Sheres</h6>


            </div>
        </div>

        <hr>
        <!-- likes , comments and share btns -->

        <div class="row">

            <!-- likes -->
            <div class="col-3 d-flex justify-content-center gap-2 align-items-center">
                <i class="bi bi-hand-thumbs-up fs-5"></i>
                <span class="text-secondary">Like</span>
            </div>
            <!-- comments -->
            <div class="col-3 d-flex justify-content-center gap-2 align-items-center">
                <i class="bi bi-chat-dots fs-5"></i>
                <!-- Button trigger modal -->
                <div class="comment-trigger">
                    <input type="hidden" class='post_id' value="<?php echo $item['post_id']?>">
                    <span type="button" class="fetcher" data-bs-toggle="modal"
                        data-bs-target="#p-<?php echo $item['post_id'] ?>">
                        Comment
                    </span>

                </div>
                <!-- Modal -->
                <div class="modal fade " id="p-<?php echo $item['post_id'] ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content col-xl-6">




                            <div class=" post-container w-100">
                                <div class="post-header">
                                    <h5 class="mb-0">Shyok Times's post</h5>
                                    <button type="button" class="btn-close" aria-label="Close"></button>
                                </div>
                                <div class="">
                                    <img style="object-fit: contain;" width="100%" height="400px"
                                        src="./post_images/<?php echo $item['image'] ?>" alt="">
                                </div>
                                <div class="reaction-stats">
                                    <span>🙂 2.5K</span>

                                    <span class="comms"></span>
                                </div>
                                <div class="action-buttons">
                                    <button class="btn btn-light">Like</button>
                                    <button class="btn btn-light">Comment</button>
                                    <button class="btn btn-light">Share</button>
                                </div>
                                <div class="comment-section">
                                    <div class="my-all-comments" style="overflow-y:scroll;">

                                    </div>


                                    <div class="comment-input">
                                        <img src="https://scontent.fisb17-1.fna.fbcdn.net/v/t51.75761-15/491442733_18071621125899043_2110218967234444301_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=127cfc&_nc_ohc=aaxnJjGYDP0Q7kNvwFZAFFl&_nc_oc=Adk5g2tqlNJbwCbSPT4hmVCWr4v9KwR5zCNK9VIqGFkYiABZwpAxuW9KaaRALg5rf2q4twbNCO6jNouUMyu8kSyR&_nc_zt=23&_nc_ht=scontent.fisb17-1.fna&_nc_gid=bMBAFKHn2xiABywPqOhVqA&oh=00_AfGvDauqxvcGPyVehldMiQKiZSiBwB_XHQHnyBWv9LbByg&oe=681D50A4"
                                            alt="User Avatar">
                                        <form class="w-100">
                                            <input class="post_id" type="hidden" name="post_id" readonly
                                                value="<?php echo $item['post_id']?>">
                                            <div class="position-relative">

                                                <textarea rows="1" type="text" name="comment"
                                                    class="form-control my-comment position-relative rounded-pill w-100"
                                                    placeholder="Comment as <?php echo $_SESSION['username']?>"></textarea>
                                                <button type='button' class="btn add-comment-btn position-absolute"
                                                    style="top:50%;right:10px;transform:translateY(-50%);">
                                                    <i class="bi bi-send"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
            <!-- whats app -->
            <div class="col-3 d-flex justify-content-center gap-2 align-items-center">
                <i class="bi bi-whatsapp fs-5"></i>
                <span class="text-secondary">whats app</span>
            </div>
            <!-- share -->
            <div class="col-3 d-flex justify-content-center gap-2 align-items-center">
                <i class="bi bi-share-fill fs-5"></i>
                <span class="text-secondary">share</span>
            </div>

        </div>
    </div>
</div>

<?php 
    }
?>