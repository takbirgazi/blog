<?php
/*======================
* This Is About Page.
========================*/


/*========================
* Head File Include Here.
========================*/
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
        /*==============================
        * Top Manu File Include Here.
        ================================*/
        require_once("temp/top_manu.php");
        ?>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-center my-5">
                            <div class="flex-shrink-0">
                                <img class="abt-mg" src="assets/img/takbirgazi.png" alt="Takbir Gazi">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <div class="cat-post rec-post abt-con">
                                    <h2>Md. Takbir Gazi</h2>
                                    <p>Full Stack Web Developer.</p>
                                    <a href="#"><i class="fa-solid fa-calendar-days"></i>7 June 2002</a><a href="#"><i class="fa-solid fa-location-dot"></i>Khulna, Bangladesh.</a>
                                    <p>I’m a Full Stack Web Developer mainly & I have good experience on Digital
                                        Marketing and Data Entry too. I can make an App Development. I’m currently a
                                        student at the BSS (Honor's) in Economics. I have been working as a Web Designer
                                        over the last 4 years. I used to work at Freelancing Marketplace. Currently, I
                                        am trying to build my career with Freelancing Marketplace.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php
    /*==========================
    * Script File Include Here.
    ===========================*/
    require_once("temp/footer.php");
    ?>
    <?php
    /*===========================
    * Script File Include Here.
    ============================*/
    require_once("temp/script.php");
    ?>