<?php
ob_start();
session_start();
include 'config.php';
include("convertToBangla.php");
include ("templates/header.php");

ini_set('display_errors', 'off');

if(!isset($_SESSION['OifficeLevel']))
{
	header("Location:login.php");
	exit;
}
else
{

}
?>
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
	<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/all.css" />
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
<!-- END OF FONT COLOR, SIZE -->
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
.nav-link[data-toggle].collapsed:after {
    content: " ▾";
}

.nav-link[data-toggle]:not(.collapsed):after {
    content: " ▴";
}


.nav > li > a:focus, .nav > li > a:hover {
  text-decoration: none;
  background-color: #337ab7;
  color: white;
}

.nav-item{
  border-bottom: ;
}
li:nth-child(4n+1):nth-last-child(-n+4),
  li:nth-child(4n+1):nth-last-child(-n+4) ~ li {
    border:none;
}
ul.submenuitem {
  list-style-type: square;
}
</style>
</head>
<div class="content" style="min-height: 500px;">
<div class="row">
<?php
if(isset ($_SESSION['offCode']))
{
	$officeCode=$_SESSION['offCode'];
	$OifficeLevel = $_SESSION['OifficeLevel'];
	$type = $_SESSION['type'];
	$uid=$_SESSION['uid'];
}
?>
<div class="col-sm-2">
</div>
<div class="col-sm-8" style="font-size: 20px;">
	<h2 class="text-center"><font color="blue">MICR Check Management System</font></h2>
	<?php
	$sql="SELECT `DeptName` FROM `department` WHERE deptCode=".$officeCode;
	$res = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($res);
	if($OifficeLevel==6){
		echo'<center><h2><font color="green">'.$row['DeptName'].' ('.e2b($officeCode).')</font></h2></center><br><br>';
	}
	else {
		echo'<center><h2><font color="green">'.$_SESSION['office'].' ('.e2b($officeCode).')</font></h2></center><br><br>';
	}
	if ($OifficeLevel==1)
	{	// Branch

		if ($type==1)
		{ // Maker
			header("Location:MICR_EntryForm.php");
			
			/*echo '<a href="MICR_EntryForm.php" class="list-group-item list-group-item-action list-group-item-action headingList">1. MICR-সঞ্চয়ী হিসাব</a>';
			echo '<a href="staffPositionZone.php" class="list-group-item list-group-item-action list-group-item-success headingList">2. MICR-চলতি হিসাব</a>';
			echo '<a href="outsourceStaff.php" class="list-group-item list-group-item-action list-group-item-action headingList">3. MICR-ডিমান্ড ড্রাফট</a>';
			echo '<a href="staffPositionZone.php" class="list-group-item list-group-item-action list-group-item-success headingList">4. MICR-পে অর্ডার</a>';
			*/
		}	
		else if ($type==2)
		{  // Checker
			header("Location:MICR_Mngr.php");
			/*echo '<a href="MICR_Mngr.php" class="list-group-item list-group-item-action list-group-item-action headingList">1. MICR-সঞ্চয়ী হিসাব</a>';
			echo '<a href="staffPositionZone.php" class="list-group-item list-group-item-action list-group-item-success headingList">2. MICR-চলতি হিসাব</a>';
			echo '<a href="outsourceStaff.php" class="list-group-item list-group-item-action list-group-item-action headingList">3. MICR-ডিমান্ড ড্রাফট</a>';
			echo '<a href="staffPositionZone.php" class="list-group-item list-group-item-action list-group-item-success headingList">4. MICR-পে অর্ডার</a>';
			*/
		}
	}
	elseif($OifficeLevel==2){	//Zone
		echo'<a href="zonaldashStaff.php" class="list-group-item list-group-item-success headingList">1. D A S H B O A R D</a>';
		echo'<a href="dasboard_staff_ZM.php?prPostingZone='.$BrCode.'" class="list-group-item list-group-item-action list-group-item-action headingList">2. D A S H B O A R D (Staff Position)</a>';
		
		echo '<a href="outsourceStaff.php" class="list-group-item list-group-item-action list-group-item-success headingList">3. Outsourcing Staff Managemnent</a>';
		echo'<a href="staffPositionZone.php" class="list-group-item list-group-item-action list-group-item-action headingList">4. Generate Staff Position </a>';
		echo'<a href="verifyZone.php" class="list-group-item list-group-item-action list-group-item-success headingList">5. Verify Staff Position (Branch Wise)</a>';
		echo '<a href="reportBr.php" class="list-group-item list-group-item-action list-group-item-action headingList">6. Reports</a>';
	}
	elseif($OifficeLevel==3)
	{	//ZAO
		echo'<a href="dash_headoffice_empStaff.php?prPostingZone='.$BrCode.'" class="list-group-item list-group-item-success headingList" >1. D A S H B O A R D </a>';
		echo '<a href="outsourceStaff.php" class="list-group-item list-group-item-action list-group-item-action headingList">2. Outsourcing Staff Managemnent</a>';
		echo '<a href="staffPositionZone.php" class="list-group-item list-group-item-action list-group-item-success headingList">3. Generate Staff Position</a>';
		echo '<a href="reportBr.php" class="list-group-item list-group-item-action list-group-item-action headingList">4. Reports</a>';
	   
		//echo '<a href="reportBr.php" class="list-group-item list-group-item-action list-group-item-success headingList">3. Reports</a>';
	}elseif($OifficeLevel==4)
	{	//DIVISION
		echo'<a href="dash_headoffice_empStaff.php?prPostingZone='.$BrCode.'" class="list-group-item list-group-item-success headingList">1. D A S H B O A R D</a>';
		echo '<a href="outsourceStaff.php" class="list-group-item list-group-item-action list-group-item-action headingList">2. Outsourcing Staff Managemnent</a>';
		
		echo'<a href="staffPositionZone.php" class="list-group-item list-group-item-action list-group-item-success headingList">3. Generate Staff Position </a>';
		echo '<a href="reportBr.php" class="list-group-item list-group-item-action list-group-item-action headingList">4. Reports</a>';
	}
	elseif($OifficeLevel==5)
	{	//DAO
		echo'<a href="dash_headoffice_empStaff.php?prPostingZone='.$BrCode.'" class="list-group-item list-group-item-success headingList">1. D A S H B O A R D</a>';
		echo '<a href="outsourceStaff.php" class="list-group-item list-group-item-action list-group-item-action headingList">2. Outsourcing Staff Managemnent</a>';
		
		echo'<a href="staffPositionZone.php" class="list-group-item list-group-item-action list-group-item-success headingList">3. Generate Staff Position </a>';
		echo '<a href="reportBr.php" class="list-group-item list-group-item-action list-group-item-action headingList">4. Reports</a>';
	   
	}elseif($OifficeLevel==6){	//RAKUB, HO
		
		if((trim($offCode==9904))||(trim($offCode==9902))) {
			echo '<a class="list-group-item list-group-item-success headingList" href="#submenu1" data-toggle="collapse"><i  style="color:green" ></i> <span>1. D A S H B O A R D</span></a>
			<div class="collapse" id="submenu1" aria-expanded="false">
			<ul class="flex-column pl-2 nav submenuitem" style="background-color:#e6f2ff; color: black; font-size:14px;">
			<li class="nav-item" style="border-bottom: 1px solid black;"><a class="nav-link py-0" href="dash_headoffice_empStaff.php?prPostingZone='.$BrCode.'" ><span style="padding-left:5px;"><i class="fa fa-circle-o" style="color:green"></i> Emplyee Info Update</span></a></li>
			<li class="nav-item" style="border-bottom: 1px solid black;"><a class="nav-link py-0" href="dasboard_overview.php"><span style="padding-left:5px;" ><i class="fa fa-circle-o" style="color:green"></i> Staff Position </span></a></li>	</ul>
			
			</div>';
			echo '<a href="outsourceStaff.php" class="list-group-item list-group-item-action list-group-item-action headingList">2.  Outsourcing Staff Managemnent</a>';
		
			echo'<a href="staffPositionZone.php" class="list-group-item list-group-item-action list-group-item-success headingList">3. Generate Staff Position </a>';
			echo '<a class="list-group-item list-group-item-action headingList" href="#submenu2" data-toggle="collapse"><i  style="color:green" ></i> <span>4. Verify Staff Position</span></a>
			<div class="collapse" id="submenu2" aria-expanded="false">
			<ul class="flex-column pl-2 nav submenuitem" style="background-color:#e6f2ff; color: black; font-size:14px;">
			<li class="nav-item" style="border-bottom: 1px solid black;"><a class="nav-link py-0" href="verifyHO.php" ><span style="padding-left:5px;"><i class="fa fa-circle-o" style="color:green"></i> Controlling Office</span></a></li>
			<li class="nav-item" style="border-bottom: 1px solid black;"><a class="nav-link py-0" href="verifyLPO_DC.php"><span style="padding-left:5px;" ><i class="fa fa-circle-o" style="color:green"></i> LPO/Dhaka Corporate </span></a></li>
			<li class="nav-item" style="border-bottom: 1px solid black;"><a class="nav-link py-0" href="verifybr.php"><span style="padding-left:5px;" ><i class="fa fa-circle-o" style="color:green"></i> Branch </span></a></li>	</ul>
			
			</div>';
			echo '<a href="reportBr.php" class="list-group-item list-group-item-action list-group-item-success headingList">5. Reports</a>';
			
		}
		else 
		{
			echo '<a href="outsourceStaff.php" class="list-group-item list-group-item-action list-group-item-action headingList">1. MICR-সঞ্চয়ী হিসাব</a>';
			echo'<a href="staffPositionZone.php" class="list-group-item list-group-item-action list-group-item-success headingList">2. MICR-চলতি হিসাব</a>';
			echo '<a href="reportBr.php" class="list-group-item list-group-item-action list-group-item-action headingList">4. Reports</a>';
		   
		}
	}
	elseif($OifficeLevel==7){	//SECP
		header("Location:../id/index.php");
		exit;
	}
	?>
</div>
</div>
</div>
<?php
echo '<br><br><br><br>';
require_once 'templates/footer.php';
?>
