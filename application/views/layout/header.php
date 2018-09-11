<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>REFRI POS</title>

    <!-- Bootstrap core CSS -->
	<link href="<?php  echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php  echo base_url();?>assets/css/font-awesome/css/fontawesome-all.css" rel="stylesheet">
    <link href="<?php  echo base_url();?>assets/lib/data-tables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="<?php  echo base_url();?>assets/lib/data-tables/buttons.dataTables.min.css" rel="stylesheet">
    <link href="<?php  echo base_url();?>assets/lib/data-tables/dataTables.buttons.min.css" rel="stylesheet">
        

    <!-- Custom styles for this template -->
    <link href="<?php  echo base_url();?>assets/css/dashboard.css" rel="stylesheet">
</head><body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">REFRI POS</a>
        <input class="form-control form-control-dark w-100 invisible" type="text" placeholder="Search" aria-label="Search">
        <ul class="navbar-nav px-3 invisible">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="#">Sign out</a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-1 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="<?php echo base_url('main')?>">
                                <span data-feather=""></span> Index <span class="sr-only">(current)</span>
                            </a>
						</li>
						<li class="nav-item">
                            <a class="nav-link active" href="<?php echo base_url('main/new_order')?>">
                                <span data-feather=""></span> New Order <span class="sr-only">(current)</span>
                            </a>
						</li>

                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-10 ml-sm-auto col-lg-11 px-4">