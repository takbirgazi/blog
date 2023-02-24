<?php
/*==========================
* Head File Include Here.
===========================*/
require_once("temp/head.php");
?>

<body class="body">
    <?php
    /*==========================
    * Header File Include Here.
    ==========================*/
    require_once("temp/header.php");
    ?>
    <main class="main">
        <!-- Top Manu -->
        <?php
        /*============================
        * Top Manu File Include Here.
        ==============================*/
        require_once("temp/top_manu.php");
        ?>
        <!-- Main Manu -->
        <?php
        /*==============================
        * Main Manu File Include Here.
        ================================*/
        require_once("temp/main_manu.php");
        ?>
        <!-- Main Content -->
        <section class="main-conent">
            <div class="container">
                <!-- First Content Start -->
                <?php
                /*===================================
                * First Content File Include Here.
                ===================================*/
                require_once("temp/first_content.php");
                ?>
                <!-- Category Content Start -->
                <?php
                /*===================================
                * Category Content File Include Here.
                =====================================*/
                require_once("temp/cat_post.php");
                ?>
                <!-- Recent Post Content -->
                <?php
                /*========================================
                * Recent Post Content File Include Here.
                ==========================================*/
                require_once("temp/rec_post.php");
                ?>
                <!-- Main Content colom End. -->
            </div>
        </section>
    </main>
    <!-- footer Section -->
    <?php
    /*===========================
    * Footer File Include Here.
    ============================*/
    require_once("temp/footer.php");
    ?>
    <?php
    /*===========================
    * Script File Include Here.
    ===========================*/
    require_once("temp/script.php");
    ?>