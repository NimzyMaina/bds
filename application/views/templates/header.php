<?php
$data = $this->session->userdata('is_logged_in');
$fullname = $data['full_name'] ? $data['full_name']:'John Doe';
$role = $data['role'];
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>BDS</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="<?=site_url('assets/css/bootstrap.min.css')?>" rel="stylesheet" />


    <!-- Animation library for notifications   -->
    <link href="<?=site_url('assets/css/animate.min.css')?>" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="<?=site_url('assets/css/light-bootstrap-dashboard.css')?>" rel="stylesheet"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?=site_url('assets/css/demo.css')?>" rel="stylesheet" />

    <link href="<?=site_url('assets/css/sweetalert2.css')?>" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="<?=site_url('assets/css/pe-icon-7-stroke.css')?>" rel="stylesheet" />

</head>
<body>
<?php 
include 'side.php';
?>