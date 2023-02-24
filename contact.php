<?php
/*==========================
* This is Privacy-Policy.
==========================*/


/*
 * Head File Include Here.
 */
require_once("temp/head.php");
?>

<body class="body">
    <?php
    /*
     * Header File Include Here.
     */
    require_once("temp/header.php");
    ?>
    <main class="main">
        <!-- Top Manu -->
        <?php
        /*
         * Top Manu File Include Here.
         */
        require_once("temp/top_manu.php");
        ?>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="vh-100">
                            <form action="" method="POST">
                                <div class="container py-5 h-100">
                                    <div class="row d-flex justify-content-center align-items-center h-100">
                                        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                                            <div class="card shadow-2-strong" style="border-radius: 1rem;">
                                                <div class="card-body p-5 ">

                                                    <h3 class="mb-5 text-center">Contact Me</h3>
                                                    <p class="small text-danger">
                                                        <?php
                                                        // Post Update massage show.
                                                        if (isset($login_user)) {
                                                            echo $login_user;
                                                        }
                                                        ?>
                                                    </p>
                                                    <div class="form-outline mb-4">
                                                        <input name="usr_name" type="text"
                                                            class="form-control form-control"
                                                            placeholder="Enter Your Name" required />
                                                    </div>

                                                    <div class="form-outline mb-4">
                                                        <input name="usr_email" type="email"
                                                            class="form-control form-control"
                                                            placeholder="Enter Your Email" required />
                                                    </div>
                                                    <div class="form-outline mb-4">
                                                        <textarea name="comment" required class="form-control"
                                                            rows="3" placeholder="Write Your Commnents..."></textarea>
                                                    </div>

                                                    <input name="login_btn" class="btn btn-primary" type="submit"
                                                        value="Send" />

                                                    <hr class="my-4">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php
    /*
     * Script File Include Here.
     */
    require_once("temp/footer.php");
    ?>
    <?php
    /*
     * Script File Include Here.
     */
    require_once("temp/script.php");
    ?>