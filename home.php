<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    include './boot_css.php';
    ?>
    <link rel="stylesheet" href="./styles.css">
    <title>Facebook</title>

</head>

<body>



    <?php 
        if(isset($_SESSION['posted_success'])){
            echo "<div class='notification-popup invalid-credentials  border border-3 border-success bg-white'>
                <div class='notification-icon'>
                    <i class='bi bi-check-circle-fill text-success'></i>
                </div>
                <div class='notification-content text-success'>
                    <h3 class='text-success'>Posted Successfully!</h3>
                    <p>The username or password you entered is incorrect. Please try again.</p>
                </div>
                <button class='close-btn invalid-btn'>&times;</button>
            </div>";
        }

        unset($_SESSION['posted_success']);

    ?>



    <?php
    if (!isset($_SESSION['username'])) {
        header("Location: http://localhost:3000");
    }
    ?>


    <!-- post modal -->

    <?php include './post-modal.php' ?>



    <div class="container-fluid">
        <!-- home page NavBar  -->

        <?php include './nav.php' ?>


        <div class="row">
            <div class="col-lg-3 h-100 d-none d-lg-block">
                <!-- sidebar -->
                <?php include './sidebar.php' ?>
            </div>
            <div class="col-lg-6 col-12 mx-auto col-md-8 ">
                <!-- main content -->
                <?php include './main-content.php' ?>
            </div>
            <div class="col-lg-3 d-none d-md-block col-md-4 ">
                <!-- ads -->
                <?php include './ads.php' ?>
            </div>
        </div>




    </div>

    <!--  -->

    <?php 
        include './boot_js.php'
     ?>

    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>



    <script>
    $('.add-comment-btn').on('click', function() {
        let post_id = $(this).closest('form').find('.post_id').val()
        console.log(post_id)
        $.ajax({
            url: './get-comments.php',
            type: 'GET',
            data: {
                post_id
            },
            success: function(response) {
                $('.my-all-comments').css('height', '200px')
                $('.my-all-comments').html(response)
            }
        })
    })


    $('.fetcher').on('click', function() {
        let post_id = $(this).closest('.comment-trigger').find('.post_id').val()
        $.ajax({
            url: './get-comments.php',
            type: 'GET',
            data: {
                post_id
            },
            success: function(response) {
                $('.my-all-comments').css('height', '200px')
                $('.my-all-comments').html(response)
            }

        })
    })

    $('.fetcher').on('click', function() {
        let post_id = $(this).closest('.comment-trigger').find('.post_id').val()
        fetchComments(post_id)
    })


    function fetchComments(post_id) {
        $.ajax({
            url: './get-count.php',
            type: 'GET',
            data: {
                post_id
            },
            success: function(response) {
                $('.comms').html(response)

            }

        })
    }







    $('.add-comment-btn').on('click', function() {

        let post_id = $(this).closest('form').find('.post_id').val()
        let my_comment = $(this).closest('form').find('.my-comment').val()
        let comment = $(this).closest('form').find('.my-comment')
        $.ajax({
            url: './add-comment.php',
            type: 'POST',
            data: {
                post_id,
                comment: my_comment,
            },
            success: function(response) {
                fetchComments(post_id)
                comment.val('')
            }
        })


    })
    </script>






    <script>
    let nav_bar = document.querySelector(".nav-bar");
    let home_icone = document.querySelector(".home-icone")
    let searchIcone = document.querySelector(".search-icone");
    let navLogo = document.querySelector(".nav-logo");
    let searchbar = document.querySelector(".search-bar");
    let nav_search_bar = document.querySelector(".nav-search-bar");
    let logo_arrow = document.querySelector(".logo-arrow");
    let post_trigger = document.querySelector('.post-trigger');
    let post_trigger_2 = document.querySelector('.post-trigger-2');
    let image_selector_btn = document.querySelector('.image-selector-btn');
    let caption = document.querySelector('.caption-text');
    let close_caption = document.querySelector('.close-caption-btn');
    let image_selector = document.querySelector('.image-selector');
    let close_post_modal = document.querySelector('.close-post-modal');
    let post_modal_bg = document.querySelector('.post-modal-bg');
    let post_modal = document.querySelector('.post-modal');
    let nav_menu_btn = document.querySelector('.nav-menu-btn');
    let nav_menu_dropdown = document.querySelector('.nav-menu-dropdown');
    let add_story = document.querySelector('.add-story');
    let add_story_popup = document.querySelector('.add-story-bg');
    let close_add_story_popup = document.querySelector('.close-add-story');

    let post_btn = document.querySelector('.post-btn')
    let post_input = document.querySelector('.post-image-input')
    let preview_image = document.querySelector('.preview-image')


    // post trigger 

    post_trigger.addEventListener('click', () => {

        post_modal_bg.style.transform = "translateX(0%)";
        setTimeout(() => {
            post_modal.style.transform = "translateY(0%)";
        }, 650);

    });


    close_post_modal.addEventListener("click", () => {

        post_modal.style.transform = "translateX(300%)";
        setTimeout(() => {
            post_modal_bg.style.transform = "translateY(-100%)";
        }, 650);

    })

    post_trigger_2.addEventListener('click', () => {

        post_modal_bg.style.transform = "translateX(0%)";
        setTimeout(() => {
            post_modal.style.transform = "translateY(0%)";
        }, 650);

    });


    image_selector_btn.addEventListener('click', () => {
        image_selector.classList.remove('d-none')
        caption.rows = 2
    })



    close_caption.addEventListener('click', () => {
        image_selector.classList.add('d-none')
        caption.rows = 7
        preview_image.classList.add('d-none')
        post_btn.classList.add('btn-secondary')
        post_btn.classList.remove('btn-primary')
        post_btn.disabled = true
    })


    //nav bar links

    searchbar.addEventListener("click", (e) => {
        e.stopPropagation();
        navLogo.style.display = "none";
        searchIcone.style.display = "none";
        logo_arrow.classList.remove("d-none");
    });






    // add story popup


    add_story.addEventListener("click", () => {
        add_story_popup.style.transform = 'translateY(0%)';
        nav_bar.classList.remove("shadow");
        home_icone.classList.remove("d-lg-block");
        nav_search_bar.classList.add("d-none")
        close_add_story_popup.classList.remove("d-none")
    })

    close_add_story_popup.addEventListener("click", () => {

        add_story_popup.style.transform = 'translateY(-100%)';
        nav_bar.classList.add("shadow");
        home_icone.classList.add("d-lg-block");
        nav_search_bar.classList.remove("d-none")
        close_add_story_popup.classList.add("d-none")


    })
    document.addEventListener("click", (e) => {

        if (!e.target.closest('.search-bar')) {
            navLogo.style.display = "block";
            searchIcone.style.display = "block";
            logo_arrow.classList.add("d-none");
        }
    });


    nav_menu_btn.addEventListener("click", (e) => {
        e.stopPropagation();
        nav_menu_dropdown.style.transform = "translateX(5%)";
    })
    document.addEventListener("click", (e) => {

        if (!e.target.closest('.nav-menu-dropdown')) {
            nav_menu_dropdown.style.transform = "translateX(200%)";

        }
    })


    caption.addEventListener('input', () => {
        if (caption.value != '') {
            post_btn.classList.remove('btn-secondary')
            post_btn.classList.add('btn-primary')
            post_btn.disabled = false
        } else {
            post_btn.classList.add('btn-secondary')
            post_btn.classList.remove('btn-primary')
            post_btn.disabled = true
        }
    })


    post_input.addEventListener('input', (e) => {
        preview_image.classList.remove('d-none')
        let file = e.target.files[0]
        let image_url = URL.createObjectURL(file)
        post_btn.disabled = false
        post_btn.classList.add('btn-primary')
        post_btn.classList.remove('btn-secondary')
        preview_image.src = image_url
    })
    </script>
</body>

</html>