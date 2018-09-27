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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="../../../../favicon.ico">

    <title>REFRI POS</title>

    <!-- Bootstrap core CSS -->
	<link href="<?php  echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php  echo base_url();?>assets/css/font-awesome/css/fontawesome-all.css" rel="stylesheet">
        

    <!-- Custom styles for this template -->
    <link href="<?php  echo base_url();?>assets/css/dashboard.css" rel="stylesheet">
    <link href="<?php  echo base_url();?>assets/css/login.css" rel="stylesheet">
</head>
<body class="text-center">
    <!--<form class="form-signin">
      <img class="mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
	-->
		<?php echo form_open('login',array('method'=>'post','class'=>'form-signin')); ?>
		<h1 class="h3 mb-3 font-weight-normal">REFRI</h1>
		<h4 class="h3 mb-3 font-weight-normal">Login</h4>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required="" autofocus="">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword"  name="password" class="form-control" placeholder="Password" required="">
      <div class="checkbox mb-3 invisible">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">© 2017-2018</p>
    </form>
  

</body>
<?php $this->load->view('layout/scripts'); ?>
</html>