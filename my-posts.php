<?php
include './config.php';
$select = "SELECT * FROM posts ORDER BY(id) DESC";
$result = mysqli_query($connection, $select);
foreach ($result as $item) {
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
                            <?php echo $_SESSION["username"] ?>
                        </h6>
                        <span class="timestamp text-secondary fw-bold" data-timestamp="2025-05-04T14:31:00+05:00"></span>
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
                    <span class="text-secondary">comments</span>
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