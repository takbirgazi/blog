<?php
//Login Page

// Login Condation
if (isset($_POST['login_btn'])) {
    // Creatin Object 
    include_once("tmp/functions.php");
    $config_obj = new Configration();
    $login_user = $config_obj->login_usr($_POST);
}
// If are Loged in it will be move to dashboard.
session_start();
if (isset($_SESSION["name"])) {
    $name = $_SESSION["name"];
    if ($name!=null) {
        header("Location: dashboard.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="css/style.css" rel="stylesheet" />
    <title>Digital IT Soft</title>
    <style>
        .admin-logo ul {
            display: flex;
            justify-content: center;
        }

        .admin-logo ul img {
            height: 50px;
            width: 50px;
            border-radius: 5px;
            margin-top: -10px;
            margin-right: 00px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="nave-bar">
            <div class="container-fluid pding-top">
                <div class="row">
                    <div class="col-md-2 admin-logo">
                        <ul>
                            <li>
                                <a href="index.php">
                                    <img src="img/tg.jpg" alt="">
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-8">
                        <h4>Admin Panel </h4>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <section class="vh-100" style="background-color: #508bfc;">
        <form action="" method="POST">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card shadow-2-strong" style="border-radius: 1rem;">
                            <div class="card-body p-5 ">

                                <h3 class="mb-5 text-center">Sign in</h3>
                                <p class="small text-danger">
                                    <?php
                                    // Post Update massage show.
                                    if (isset($login_user)) {
                                        echo $login_user;
                                    }
                                    ?>
                                </p>
                                <div class="form-outline mb-4">
                                    <input name="usr_email" type="email" class="form-control form-control"
                                        placeholder="Enter Your Email" required />
                                </div>

                                <div class="form-outline mb-4">
                                    <input name="usr_pwd" type="password" class="form-control form-control"
                                        placeholder="Enter Your Password" required />
                                </div>
                                <!--INSERT INTO users (usr_name, usr_email, usr_pwd) VALUES ('tabirgazi', 'takbirgazi@gmailo.com', MD5('12345@'));-->
                                <!-- Checkbox -->
                                <div class="form-check d-flex justify-content-start mb-4">
                                    <input class="form-check-input" type="checkbox" value="" />
                                    <label class="form-check-label" for="remember"> Remember password </label>
                                </div>

                                <input name="login_btn" class="btn btn-primary" type="submit" value="Log in" />

                                <hr class="my-4">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <footer class="main-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <p>Copyright &copy; 2023 All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="js/app.js"></script>
</body>

</html>