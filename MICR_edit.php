<?php
date_default_timezone_set('Asia/Dhaka');
include 'templates/header.php';
ob_start();
session_start();
include 'config.php';
include("convertToBangla.php");
ini_set('display_errors', 'off');

$offCode = $_SESSION['offCode'];
$OfficeLoc = $_SESSION['OifficeLevel'];
$type = $_SESSION['type'];
$BrCode = $_SESSION['offCode'];
$uid = $_SESSION['uid'];

if(isset($_REQUEST['id']))	
{
	$id = $_REQUEST['id'];
	$sqlupdate ="SELECT * FROM `micr_entry` WHERE `id`=$id"; 
	$result = mysqli_query($conn,$sqlupdate);
	while($row = mysqli_fetch_array($result))
	{
		$id=$row['id'];	
		$BankName=$row['BankName'];	
		$Brname=$row['name'];
		$ZnName=$row['zone_name'];
		$routingNo=$row['routingNo'];
		$Cname=$row['Cname'];
		$CnameAccNo=$row['CnameAccNo'];
		$ChkStrtNo=$row['ChkStrtNo'];
		$BankCode=$row['BankCode'];
		$DistCode=$row['DistCode'];
		$BrncCode=$row['BrncCode'];
		$ChkDNo=$row['ChkDNo'];
		$TrnCode=$row['TrnCode'];
		$chkPrefix=$row['chkPrefix'];
		$Leaf_Qty=$row['Leaf_Qty'];
		$Book_Qty=$row['Book_Qty'];
	}
}
if (isset($_POST['updateOutsourcingStaff']))
{
	$emp_id=$_POST['emp_id'];
	$id=$_POST['id'];
    //echo $emp_id; exit;	
	//$office_code=$_POST['offcode'];
	$chkBranch=$_POST['branch'];
	$chkZone=$_POST['ZoneList'];
	
	if($chkBranch==NULL){
		$office_code=$chkZone;
	}
	else
		$office_code=$chkBranch;
	//echo $office_code;exit;
	
	$name_eng=$_POST['name_eng'];
	$name_ban=$_POST['name_ban'];
	
	$Designation=$_POST['Designation'];
	$PersonalFileNo=$_POST['PersonalFileNo'];
	
	$pfno=$_POST['pfno'];
	$nid=$_POST['nid'];
	$official_desig=$_POST['official_desig'];
	$Edu_Qua=$_POST['Edu_Qua'];
	$dob=$_POST['dob'];
	$date_joinbank=$_POST['date_joinbank'];
	//$date_promotion=$_POST['date_promotion'];
	$date_present=$_POST['date_present'];
	$prev_WorkingPlace=$_POST['prev_WorkingPlace'];
	$thana=$_POST['thana'];
	$district=$_POST['district'];
	$mobile_pr=$_POST['mobile_pr'];
	$status_employee=$_POST['status_employee'];
	$jobLength=$_POST['jobLength'];
	$comment=$_POST['comment'];
	//$uniontxt=$_POST['potxt'];

	$savingmsg="Data Save Successfully";
		
    /*$sqlchk="SELECT count(*) cnt FROM `outsourcing_staff`  where `emp_id`='".trim($emp_id)."'";
	$chkemp = mysqli_query($conn, $sqlchk);
	$dt = mysqli_fetch_array($chkemp);
	$getemp = trim($dt['cnt']);
		if($getemp>0)
		{
			echo '<br><br><br><h3 style="color: red; background-color:yellow; ">Error: <br>'.trim($emp_id).' ID of outsourcing staff is already inserted. Please try with proper ID No. <a href="outsourceStaff.php"><span class="glyphicon glyphicon-edit"></span> Back </a></h3>';
			exit;
		}*/
	$sqlupdt="UPDATE `outsourcing_staff` SET `office_code`='$office_code',`emp_id`='$emp_id',
	`name_ban`='$name_ban',`Designation`='$Designation',`nid`='$nid',`Edu_Qua`='$Edu_Qua',
	`dob`='$dob',`date_joinbank`='$date_joinbank',`date_present`='$date_present',
	`prev_WorkingPlace`='$prev_WorkingPlace',`thana`='$thana',`district`='$district',
	`status_employee`='Temporary',`comment`='$comment',mobile_pr='".$mobile_pr."' 
	 WHERE id=".$id;
	   
	//echo $sqlQry;
		

	if(mysqli_query($conn,$sqlupdt))
	{
			echo'<center>';
			echo'<h2><br><br><br><br><span style="color: blue;">Successfully Update Inforamation</span></h2>';

			echo "<a class='btn btn-warning btn-lg ' href='outsourceStaff.php'><span class='glyphicon glyphicon-edit'></span> Back</a>";									
	
			echo'</center>';
			exit;

	}
	else
	{
		echo'<center>';
		echo'<h2><br><br><span style="color: red;">Error:'.mysqli_error($conn).'</span></h2>';
		
        echo "<a class='btn btn-default btn-lg blue' href='Outsource_edit.php?id=".trim($id)."'><span class='glyphicon glyphicon-edit'></span>Back</a>";									

		echo'</center>';
		exit;
		
	}
}
?>
<script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
<script src="js/validation_pds.js"></script>
<script src="js/ajax-pds.js"></script>
<style>
label.error {
    color: red;
    font-size: 1rem;
    display: block;
    margin-top: 5px;
}
input.error, textarea.error {
    border: 1px dashed red;
	background-color:#FFE4E1;
    font-weight: 300;
    color: red;
}
.errortxt {
    color: red;
	background-color:#FFE4E1;
}
.nav-pills > li.active > a, .nav-pills > li.active > a:hover, .nav-pills > li.active > a:focus {
    color: #ffffff;
    background-color: #04aa26;

}
ul a {
	color: green;
}

.items {
    color: #ffffff;
    background-color: #04aa26;
	padding-left:15px;
	padding-right:15px;
	border:solid 1px green; 
	background-color: #DFF0D8; 
	color: #058203;
}
.items-nopad
{
	color: #ffffff;
    background-color: #04aa26;
	padding-left:15px;
	padding-right:0px;
	border:solid 1px green; 
	background-color: #DFF0D8; 
	color: #058203;
}

.response {
    padding: 10px;
    margin-top: 10px;
    border-radius: 2px;
}

.error {
    background: red;
    border: #ecc0c1 1px solid;
	color: white;
}

.success {
    background: #c5f3c3;
    border: #bbe6ba 1px solid;
}
.required:after {
	content:" *";
	color: red;
	font-weight: bold;
}
#SalaryAccountNo{
	border:0px ;
	width:90%;
}
.blueClass{
	background-color: #6e6bc7;
	border:0px;
}
.blueClass:hover, .blueClass:focus{
	background-color: #4440aa;
}
#addChildren:active, #newChildAdd:active,
#addTraining:active, #newTrainAdd:active,
#newPromotionAdd:active, #addPromotion:active,
#newPunishAdd:active, #addPunish:active
{
	background-color: #4440aa;	
}
.greenClass{
	background-color: #5cb85c;
	border:0px;
}
.greenClass:hover, .greenClass:focus{
	background-color: #449d44;
}

#customers {
   
    border-collapse: collapse;
    width: 100%;
	font-size:x-small;
}

#customers td, #customers th {
    border: 1px solid blue;
    padding: 1px;
	vertical-align: top;
}

#customers tr:nth-child(even){background-color: #f2f2f0;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 1px;
    padding-bottom: 1px;
    text-align: center;
background-color:#E4F0F0;
    color: black;
	 font-weight: bold;
}
#customers td 
{
	font-weight: bold;
	text-align:center;
}
h1{
	font-size: em;
    font-family: serif;
	text-align: center;
	color:green;
}


table, th, td {
	  border:1px solid white;
	  
	}
	.center 
	{
	  margin-left: auto;
	  margin-right: auto;
	}
</style>
<body>	
<div class="container">
<h2 style=" color:magenta; text-align:center;"  ><b>MICR-Edit Form</b></h2> 	  
<form id="MICR_Entry" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data" >
<div class="row" style="font-size:14px;">
<div  class="col-sm-12 col-md-12">
<div class="items"><br>
<div class="panel panel-default">
<div class="panel-body" style="border:1px solid green;  background-color:#f0f5f5;">
	
	<?php 
		$sql="SELECT * FROM `routing` WHERE `code`='".trim($BrCode)."'";
		$chk = mysqli_query($conn, $sql);
		$data = mysqli_fetch_array($chk);
	
		//echo $sql;exit;
		$branchName = trim($data['name']);
		$zoneName = trim($data['zone_name']);
		$BrCode = trim($data['code']);
		$routingNo = trim($data['routing_No']);
		$zone_code = trim($data['zone_code']);	
	?>
	<input type="hidden" name="id" class="form-control" id="id" value="<?php echo $id; ?>"> 
    
    <input type="hidden" name="offcode" class="form-control" id="offcode" value="<?php echo $offCode; ?>"> 
    <input type="hidden" name="BankName" id="BankName" value="Rajshahi Krishi Unnayan Bank">
    <input type="hidden" name="BrCode" id="BrCode" value="<?php echo $BrCode ?>">
    <input type="hidden" name="routingNo" id="routingNo" value="<?php echo $routingNo ?>">
    <input type="hidden" name="zone_code" id="zone_code" value="<?php echo $zone_code ?>">

	<b><p style="font-size:20px;text-align: center; color:red">&nbsp; &nbsp;Routing No:<?php echo $routingNo ?>,&nbsp;<?php echo $branchName; ?>,<?php echo ' '.$zoneName; ?>,&nbsp;Rajshahi Krishi Unnayan Bank 
	</p></b>
	<br>
	<div class="col-md-6">
      <label class="required" for="Cname">Customer/ Company Name</label>
      <input type="text" name="Cname" class="form-control" id="Cname" value=<?php echo $Cname; ?> required>
    </div>
		
	<div class="col-md-6">
      <label class="required" for="CnameAccNo">Customer/ Company Account Number</label>
      <input inputmode="numeric" name="CnameAccNo" class="form-control" id="CnameAccNo" maxlength="13" value=<?php echo $CnameAccNo; ?> oninput="this.value = this.value.replace(/\D+/g, '')"  />
      <p id="errorCnameAccNo"></p>
	</div>
	<script>
		$(document).ready(function(){
			$("#CnameAccNo").focusout(function(){
				var txtVal= $("#CnameAccNo").val();
				if(txtVal.length == 13){
					if(Number(txtVal)==0){
						$("#errorCnameAccNo").html('Invalid Customer/ Company Account Number');
						$("#errorCnameAccNo").css('color','red');
					}
					else{
						$("#errorCnameAccNo").html('');
					}
				}
				else{
					$("#errorCnameAccNo").html('Customer/ Company Account Number Must Be 13  Digit');
					$("#errorCnameAccNo").css('color','red');
					//$("#CnameAccNo").focus();
				}
			});
			
		});
	</script>
	<br><br><br><br>
	<div class="col-md-6">
      <label class="required" for="ChkStrtNo"> Check Serial Start Number</label>
      <input type="text" name="ChkStrtNo" class="form-control" id="ChkStrtNo" value=<?php echo $ChkStrtNo; ?> required>
    </div>
	
	
	<input type="hidden" name="BankCode" id="BankCode" value="180">
	
	<div class="col-md-6">
      <label class="required" for="DistCode"> Enter District Code</label>
      <input type="text" name="DistCode" class="form-control" id="DistCode" value=<?php echo $DistCode; ?> required>
    </div>
	<br><br><br><br>
	<div class="col-md-6">
      <label class="required" for="BrncCode"> Enter Branch Code</label>
      <input type="text" name="BrncCode" class="form-control" id="BrncCode" value=<?php echo $BrncCode; ?> required>
    </div>
	
	<div class="col-md-6">
      <label class="required" for="ChkDNo"> Check Digit Number</label>
      <input type="text" name="ChkDNo" class="form-control" id="ChkDNo" value=<?php echo $ChkDNo; ?> required>
    </div>
	<br><br><br><br>
	<div class="col-md-6">
      <label class="required" for="TrnCode"> Transaction Code</label>
      <input type="text" name="TrnCode" class="form-control" id="TrnCode" value=<?php echo $TrnCode; ?> required>
    </div>

	<div class="col-md-6">
		<b class="required">Check Prefix:</b> 
		<input type="radio" name="chkPrefix" id="SB" value="SB" <?php if($chkPrefix=="SB") {echo 'checked';} ?>>
		<label for="SB">SB</label>
		<input type="radio" name="chkPrefix" id="CD" value="CD" <?php if($chkPrefix=="CD") {echo 'checked';} ?>>
		<label for="CD">CD</label>
		<input type="radio" name="chkPrefix" id="DD" value="DD" <?php if($chkPrefix=="DD") {echo 'checked';} ?>>
		<label for="DD">DD</label>
		<input type="radio" name="chkPrefix" id="PO" value="PO" <?php if($chkPrefix=="PO") {echo 'checked';} ?>>
		<label for="PO">PO</label>
	</div>
	<br><br>
	<div class="col-md-6">
	
	<label class="required" for="Leaf_Qty">Choose Leaf Qty:</label>
		<select name="Leaf_Qty" id="Leaf_Qty" required>
		  <option disabled selected>Select</option>
		  <option value="10" <?php if($Leaf_Qty=="10") {echo 'selected';} ?>>10</option>
		  <option value="20" <?php if($Leaf_Qty=="20") {echo 'selected';} ?>>20</option>
		  <option value="100" <?php if($Leaf_Qty=="100") {echo 'selected';} ?>>100</option>
		</select>
    &nbsp; &nbsp; &nbsp; 
	
	<label class="required" for="Book_Qty">Choose Book Qty:</label>
		<?php
			echo '<select id="Book_Qty" name="Book_Qty">';
			echo '<option disabled selected>Select</option>';
			$selected = $Book_Qty;
			foreach (range(1,24) as $Book_Qty) {
				if($Book_Qty == $selected){
				echo '<option selected="selected" value="'.$Book_Qty.'">'.$Book_Qty."</option>";
				}else{
				echo '<option value="'.$Book_Qty.'">'.$Book_Qty."</option>";
				}	
			}
			echo '</select>';
		?>
    </div>		
	</div>			
	</div>
	<div class="form-group">        
		<div class="save" style="text-align:center;">
		<button type="submit" id="MICR_Entry" name="MICR_Entry" class="btn btn-success"><span class='glyphicon glyphicon-saved'></span>Save</button>	
		</div>
	</div>
</div>	
</div>
</form>
</div>
</div>
</body>
<br>
<?php
include('templates/footer.php');
?>
