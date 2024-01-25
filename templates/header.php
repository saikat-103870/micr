<?php
ob_start();
//session_start();
ini_set('display_errors','off');
date_default_timezone_set('Asia/Dhaka'); // CDT
$d=date('d-m-Y');
$t=date('H:i:s');
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="../images/logo.png" type="image/png"></link>
    <title>MICR Check</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min_3.3.7.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="js/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        .dropdown li a:hover {
            color: black;
        }
        .dropdown-menu {
            min-width: 200px;
        }
        .dropdown-menu:hover {
            color: black;
        }
        .dropdown-menu.columns-2 {
            min-width: 400px;
        }
        .dropdown-menu.columns-3 {
            min-width: 600px;
        }
        .dropdown-menu li a {
            padding: 5px 15px;
            font-weight: 300;
        }
        .dropdown li a.dropdown-toggle {
            color:green;
        }
        .dropdown-menu li a:hover {
            color: green;
            background-color: green;
        }
        .multi-column-dropdown {

            list-style: none;

        }
        .multi-column-dropdown li a {
            display: block;
            clear: both;
            line-height: 1.428571429;
            color: green;
            white-space: normal;
        }
        .multi-column-dropdown li a:hover {
            text-decoration: none;
            background-color: green;
            color: white;
        }
        @media (max-width: 767px) {
            .dropdown-menu.multi-column {
                min-width: 240px !important;
                overflow-x: hidden;
            }

        }
        .navbar-default .navbar-nav > li > a {

            background-color: #008836;
            margin-top: 12px;
            font-size:16px;
        }
        .dropdown:hover .dropdown-menu {
            display: block;
        }
        .bg-ass {background-color: #eaeced;}
        .bg-red {background-color: red;}
        .bg-white {background-color: white;}
        .bg-green {background-color: green;}
        .bg-blue {background-color: blue;}

        .btnSq {border-radius: 12px;}
        .btnRound {border-radius: 50%;}
        .btnRoundLg {border-radius: 30%;}
        .btn-square {border-radius: 12px;}
        .btn-round {border-radius: 50%;}
        .btn-round-lg {border-radius: 30%;}
        <!-- FONT COLOR, SIZE -->
        .red {	color: red; }
        .red-color {	color: red; }
        .green { color: green; }
        .orange { color: orange; }
        .sky { color: #64b7ff; }
        .white { color: white; }
        .black { color: black; }
        .blue {	color: blue; }
        .big { font-size: 22px;

        //background-color: #c4e1ff;// #d4d6d8;

        //background-color: #64b7ff; //sky

        font-weight: bold;

        }

        .mid { font-size: 14px;
            font-weight: bold;
        }

        .mid-2x { font-size: 16px;
            font-weight: bold;
        }

        .bigBoldW { font-size: 16px;

            font-weight: bold;

            color: black;

        }
        .small { font-size: 13px;
        //background-color: #d4d6d8;
            !background-color: #c4e1ff;// #d4d6d8;
            font-weight: bold;

        }
        .over{

            text-decoration: overline;

        }

        .under{

            text-decoration: underline;

        }

        .cut{

            text-decoration: line-through;

        }
        .lh-sm{

            line-height: 1.8;

        }
        hr {
            display: block;
            height: 2px;
            border: 0;
            border-top: 1px solid #010000;
            margin: 1em 0;
            padding: 0;
        }
        .mob-width {
            width: 220px;
        }

        .bg {

        //background-image: url("images/divbg6.jpg");
            background-image: url("images/school-101.jpg");
        //background-image: url("images/red-bg11.jpg");
            background-repeat: no-repeat;
            background-position: center;      /* center the image */
        //background-size: cover;           /* cover the entire window */

        }
        @page
        {
            size: auto;   /* auto is the initial value */
            margin: 0mm;  /* this affects the margin in the printer settings */
        }
        .dropdown a:hover{
            background-color: #3b5998;
        }
        #navcolor
        {
            background-color: #3b5998 ;
        }
        .h3,h4{

            color:white;
        }
        #panel-heading{

            color:red;
        }
        .dropdown-submenu {
            position: relative;
        }
        .dropdown-submenu .dropdown-menu {

            top: 0;

            left: 100%;

            margin-top: -1px;
        }
        .modal-header, h6, .close {
            background-color: #bbe1f9;
        //background-color: #64b7ff;
        //background-color: #3b88ed; //sky
        //background-color: #696b70;
        //background-color: #e2dede;
        //background-color: #71ef0a;	//Green
        //background-color: #079b2;	//Green
        color:black !important;
            text-align: center;
            font-size: 30px;
        }
        .modal-footer {
            background-color: #f2f7f3;
        }
        .modal-dialog {
            width: 900px; !MODAL WINDOW SIZE
        }
        body{
            font-family:"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;
            font-size:12px;
        }
        p, h1, form, button{border:0; margin:0; padding:0;}
        .spacer{clear:both; height:1px;}
        /* ----------- My Form ----------- */
        .myform{
            margin:0 auto;
            width:800px;
            padding:14px;
        }
        /* ----------- basic ----------- */
        #basic{
            border:solid 2px #DEDEDE;
        }
        #basic h1 {
            font-size:20px;
            font-weight:bold;
            margin-bottom:8px;
        }
        #basic p{
            font-size:11px;
            color:#666666;
            margin-bottom:20px;
            border-bottom:solid 1px #dedede;
            padding-bottom:10px;
        }
        #basic label{
            display:block;
            font-weight:bold;
            text-align:right;
            width:140px;
            float:left;
        }
        #basic .small{
            color:#666666;
            display:block;
            font-size:11px;
            font-weight:normal;
            text-align:right;
            width:140px;
        }
        #basic input{
            float:left;
            width:200px;
            margin:2px 0 30px 10px;
        }
        #basic button{
            clear:both;
            margin-left:150px;
            background:#888888;
            color:#FFFFFF;
            border:solid 1px #666666;
            font-size:11px;
            font-weight:bold;
            padding:4px 6px;
        }


        /* ----------- stylized ----------- */
        #stylized{
            border:solid 2px #b7ddf2;
            background:#ebf4fb;

        }
        #stylized h1 {
            font-size:20px;
            font-weight:bold;
            margin-bottom:8px;
        }
        #stylized p{
            font-size:11px;
            color:#666666;
            margin-bottom:20px;
            border-bottom:solid 1px #b7ddf2;
            padding-bottom:10px;
        }
        #stylized label{
            display:block;
            font-weight:bold;
            text-align:right;
            width:140px;
            float:left;
        }
        #stylized .small{
            color:#666666;
            display:block;
            font-size:11px;
            font-weight:normal;
            text-align:right;
            width:140px;
        }
        #stylized input{
            float:left;
            font-size:12px;
            padding:4px 2px;
            border:solid 1px #aacfe4;
            width:200px;
            margin:2px 0 20px 10px;
        }
    </style>
    
</head>
<nav class="navbar navbar-default navbar-top" style="background-color:#008836;">
    <div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="MICR_EntryForm.php" ><font color="white" size="5"><img src="img/logo.jpg" height="80" width="80" />MICR Check Management System</font>
			</a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-right navbar-nav">
				<li><a href="MICR_EntryForm.php" class="bg-green"><font color="white">Home</font></a></li>
				<li><a href="../mis1/logout.php" class="bg-green"><font color="white">Logout</font></a></li>
			</ul>
		</div>
    </div>
</nav>

