
<?php
date_default_timezone_set('Asia/Dhaka'); // CDT
include 'bsstaff.php';
ob_start();
session_start();
include 'config.php';
include("convertToBangla.php");

///include("loadinfo.php");

session_start();


$offCode = $_SESSION['offCode'];
//echo $offCode;
$OifficeLevel = $_SESSION['OifficeLevel'];
$type = $_SESSION['type'];
$BrCode = $_SESSION['offCode'];
$uid = $_SESSION['uid'];
//echo $_REQUEST['mobile_pr'];
if(isset($_REQUEST['id']))	{
		$id = $_REQUEST['id'];
		$sqltransfer ="INSERT INTO `outsource_history`(`id`, `office_code`, `emp_id`, `name_eng`, `name_ban`, `Designation`, `PersonalFileNo`, `pfno`, `nid`, `official_desig`, `Edu_Qua`, `dob`, `date_joinbank`, `date_promotion`, `date_present`, `prev_WorkingPlace`, `thana`, `district`, `mobile_pr`, `status_employee`, `jobLength`, `comment`) 
		SELECT `id`, `office_code`, `emp_id`, `name_eng`, `name_ban`, `Designation`, `PersonalFileNo`, `pfno`, `nid`, `official_desig`, `Edu_Qua`, `dob`, `date_joinbank`, `date_promotion`, `date_present`, `prev_WorkingPlace`, `thana`, `district`, `mobile_pr`, `status_employee`, `jobLength`, `comment` FROM `outsourcing_staff` where `id`=$id"; 
		$resultransfer = mysqli_query($conn,$sqltransfer);
		$sqldelete ="DELETE FROM `outsourcing_staff` WHERE `id`=$id"; 
		
		if(mysqli_query($conn,$sqldelete))
		{
				echo'<center>';
				echo'<h2><br><br><br><br><span style="color: red;">Successfully Delete Inforamation</span></h2>';

				echo "<a class='btn btn-default btn-lg blue' href='outsourceStaff.php'><span class='glyphicon glyphicon-edit'></span> Back</a>";									
		
				echo'</center>';
				exit;

		}
}
include('templates/footer.php');
?>
