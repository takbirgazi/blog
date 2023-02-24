<?php
/*
 * Header Code.
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel ="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="css/style.css" rel ="stylesheet"/>
	<title>Digital IT Soft</title>
</head>
<body>
    <header>
        <nav class="nave-bar">
            <div class="container-fluid pding-top">
                <div class="row">
                    <div class="col-md-2 admin-logo">
                        <ul>
                            <li>
                                <a href="dashboard.php">
                                    <img src="img/avater.jpg" alt="Logo">
                                </a>
                            </li>
                            <li>
                                <a href="dashboard.php">
                                    <p>Admin</p>
                                </a>
                            </li>
                        </ul>
                    </div>
					<div class="col-md-8">
					 <h4>Admin Panel </h4>
					</div>
					<div class="col-md-2 admin-logo logo-right">
						<ul>
							<li><a title="View Blog Page." href="../index.php"><i class="fa fa-globe"></i></a></li>
							<li><a title="Log Out" onclick="return confirm('Are you sure?')" href="?logout=logedout"><i class="fa fa-right-from-bracket"></i></a></li>
						</ul>
					</div>
                </div>
            </div>
        </nav>
    </header>

<section class="main-section">
<div class="container-fluid">
    <div class="row height">
        <div class="col-md-2 siderba">
            <div class="siderba">
                <ul class="list-group">
                    <li class="list-group-item bg-non"><a href="dashboard.php"><i class="fa fa-house">&nbsp;</i>Dashboard</a></li>
                    <li class="list-group-item bg-non" onclick="activ()" ><a href="#"><i class="fa fa-sheet-plastic">&nbsp;</i>Posts</a></li>
                        <ul class="sub-ul-list">
                            <li class="list-group-item bg-non sub-list "><a href="dashboard.php?id=post_add"><i class="fa fa-plus">&nbsp;</i>Add Post</a></li>
                            <li class="list-group-item bg-non sub-list "><a href="dashboard.php?id=post_manage"><i class="fa fa-gears">&nbsp;</i>Manage</a></li>
                        </ul>
                    <li class="list-group-item bg-non" onclick="activ2()"><a href="#"><i class="fa fa-sliders">&nbsp;</i>Categorys</a></li>
                        <ul class="sub-ul-list2">
                            <li class="list-group-item bg-non sub-list "><a href="dashboard.php?id=cat_add"><i class="fa fa-plus">&nbsp;</i>Add Category</a></li>
                            <li class="list-group-item bg-non sub-list "><a href="dashboard.php?id=cat_manage"><i class="fa fa-gears">&nbsp;</i>Manage</a></li>
                        </ul>
                </ul>
            </div>
        </div>