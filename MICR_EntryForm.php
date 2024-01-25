<?php
date_default_timezone_set('Asia/Dhaka'); // CDT
include 'templates/header.php';
ob_start();
session_start();
include 'config.php';
include("convertToBangla.php");
$offCode = $_SESSION['offCode'];
$OifficeLevel = $_SESSION['OifficeLevel'];
$type = $_SESSION['type'];
$BrCode = $_SESSION['offCode'];
$uid = $_SESSION['uid'];
$dayFirstId = $BrCode . trim(date("dmY"));

if (isset($_POST['MICR_Entry']))
{
	
	$sql="SELECT `Id` FROM `micr_entry` WHERE BrCode='".$BrCode."' and date(timestamp)=curdate()
	order by sl desc limit 1";
	$res = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($res);
	$id="".$row['Id'];

	if($id!=""){
		$id1 = substr($id,0,12);
		$id2 = substr($id,12);
		$id2++;
		$id = $id1.$id2;
	}
	else{
		$id=$dayFirstId."1";
	}
		
	$BankName=$_POST['BankName'];
	$BrCode=$_POST['BrCode'];
	$zone_code=$_POST['zone_code'];
	$routingNo=$_POST['routingNo'];
	$Cname=$_POST['Cname'];
	$CnameAccNo=$_POST['CnameAccNo'];
	$ChkStrtNo=$_POST['ChkStrtNo'];
	$BankCode=$_POST['BankCode'];
	$DistCode=$_POST['DistCode'];
	$BrncCode=$_POST['BrncCode'];
	$ChkDNo=$_POST['ChkDNo'];
	$TrnCode=$_POST['TrnCode'];
	$chkPrefix	=$_POST['chkPrefix'];
	$Leaf_Qty=$_POST['Leaf_Qty'];
	$Book_Qty=$_POST['Book_Qty'];
	
	$savingmsg="Data Save Successfully";
		
	$sqlQry="INSERT INTO `micr_entry`(`id`, `BankName`, `BrCode`, `zone_code`, `routingNo`, `Cname`, `CnameAccNo`, `ChkStrtNo`, `BankCode`, `DistCode`, `BrncCode`, `ChkDNo`, `TrnCode`, `chkPrefix`, `Leaf_Qty`, `Book_Qty`, `status`) VALUES 
	('$id','$BankName','$BrCode','$zone_code','$routingNo','$Cname','$CnameAccNo','$ChkStrtNo','$BankCode','$DistCode','$BrncCode','$ChkDNo','$TrnCode','$chkPrefix','$Leaf_Qty','$Book_Qty','0')";
	   
	//echo $sqlQry; exit;
		

	if(mysqli_query($conn,$sqlQry))
	{
		echo '<script type="text/javascript">alert("'.$savingmsg.'"); 
		window.location.href="MICR_EntryForm.php"</script>';
		//header("Location: staffPositionBr.php");	
		/*echo '<center>';
		echo '<h2><br><br><br><br><span style="color: green;">Successfully Save Inforamation</span></h2>';
		echo "<a class='btn btn-default btn-lg blue' href='MICR_EntryForm.php'><span class='glyphicon glyphicon-edit'></span> Back</a>";									
		echo '</center>';
		exit;*/

	}
	else
	{
		echo'<center>';
		echo'<h2><br><br><span style="color: red;">Error:'.mysqli_error($conn).'</span></h2>';
		echo "<a class='btn btn-default btn-lg blue' href='pdsaddress.php'><span class='glyphicon glyphicon-edit'></span>Back</a>";									

		echo'</center>';
		exit;	
	}
}
?>
<HTML>
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
    border: 1px solid green;
    padding: 1px;
	vertical-align: top;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 1px;
    padding-bottom: 1px;
    text-align: center;
background-color:#E4F0F5;
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
	border:1px solid green;
	  
	}
	.center 
	{
	  margin-left: auto;
	  margin-right: auto;
	}
</style>

<body>	
<div class="container">
<h2 style=" color:blue; text-align:center;"  ><b>MICR-Entry Form</b></h2> 	  
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
      <input type="text" name="Cname" class="form-control" id="Cname" required>
    </div>
		
	<div class="col-md-6">
      <label class="required" for="CnameAccNo">Customer/ Company Account Number</label>
      <input inputmode="numeric" name="CnameAccNo" class="form-control" id="CnameAccNo" maxlength="13" oninput="this.value = this.value.replace(/\D+/g, '')"  />
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
      <input type="text" name="ChkStrtNo" class="form-control" id="ChkStrtNo" required>
    </div>
	
	
	<input type="hidden" name="BankCode" id="BankCode" value="180">
	
	<div class="col-md-6">
      <label class="required" for="DistCode"> Enter District Code</label>
      <input type="text" name="DistCode" class="form-control" id="DistCode" required>
    </div>
	<br><br><br><br>
	<div class="col-md-6">
      <label class="required" for="BrncCode"> Enter Branch Code</label>
      <input type="text" name="BrncCode" class="form-control" id="BrncCode" required>
    </div>
	
	<div class="col-md-6">
      <label class="required" for="ChkDNo"> Check Digit Number</label>
      <input type="text" name="ChkDNo" class="form-control" id="ChkDNo" required>
    </div>
	<br><br><br><br>
	<div class="col-md-6">
      <label class="required" for="TrnCode"> Transaction Code</label>
      <input type="text" name="TrnCode" class="form-control" id="TrnCode" required>
    </div>

	<div class="col-md-6">
		<b class="required">Check Prefix:</b> 
		<input type="radio" name="chkPrefix" id="SB" value="SB">
		<label for="SB">SB</label>
		<input type="radio" name="chkPrefix" id="CD" value="CD">
		<label for="CD">CD</label>
		<input type="radio" name="chkPrefix" id="DD" value="DD">
		<label for="DD">DD</label>
		<input type="radio" name="chkPrefix" id="PO" value="PO">
		<label for="PO">PO</label>
	</div>
	<br><br>
	<div class="col-md-6">
	
	<label class="required" for="Leaf_Qty">Choose Leaf Qty:</label>
		<select name="Leaf_Qty" id="Leaf_Qty" required>
		  <option disabled selected>Select</option>
		  <option value="10">10</option>
		  <option value="20">20</option>
		  <option value="100">100</option>
		</select>
    &nbsp; &nbsp; &nbsp; 
	
	<label class="required" for="Book_Qty">Choose Book Qty:</label>
		<?php
			echo '<select id="Book_Qty" name="Book_Qty">';
			echo '<option disabled selected>Select</option>';
			foreach (range(1,24) as $Book_Qty) {
				echo '<option value='.$Book_Qty.'>'.$Book_Qty.'</option>';
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
<!-------Show Data---------->
<h1 style='color:magenta'>MICR-Entry List</h1>
<table style="width:100%" id="customers">
		<thead>
			<tr class="headerSection">
				<th>#SL</th>
				<th>Bank Name</th>
				<th>Branch Name</th>
				<th>Zone Name</th>
				<th>Customer/ Company Name</th>
				<th>Routing Number</th>
				<th>Check Prefix</th>
				<th>Customer/ Company Account Number</th>
				<th>Check Serial Start Number</th>
				<th>Leaf Qty</th>
				<th>Book Qty</th>
				<th>Bank Code</th>	
				<th>District Code</th>
				<th>Branch Code</th>
				<th>Check Digit Number</th>	
				<th>Transaction Code</th>	
				<th colspan="2">Action</th>	
			</tr>
		</thead>				
<?php
	if($OifficeLevel==1)
	{
		$sql='SELECT m.*,r.name,r.zone_name FROM `micr_entry` m LEFT join routing r ON r.code=m.BrCode WHERE m.`BrCode`="'.trim($BrCode).'" and `status`=0 ORDER BY `m`.`sl` DESC';	
		//echo $sql;
	}	
   $result = mysqli_query($conn, $sql);

   if (!$result) {
       die("Invalid query: " . mysqli_error($conn));
   }

   $kn = 1;
   while ($row = mysqli_fetch_assoc($result)) {
	
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
	$edit="<a href='MICR_edit.php?id=".trim($id)."' target='_blank'><center><span style='font-size:15px; color:blue' class='glyphicon glyphicon-edit'>Edit</span></center></a>";
	$delete="<a href='MICR_delete.php?id=".trim($id)."' target='_blank'><center><span style='font-size:15px; color:red' class='glyphicon glyphicon-remove'>Delete</span></center></a>";
				   
	
   $footerSum =
	   "<tr><td>" .
	   $kn .
	   "</td><td style='text-align:left'>" .
	   $BankName .
	   "</td><td style='text-align:left'>" .
	   $Brname .
	   "</td><td style='text-align:left'>" .
	   $ZnName .
	   "</td><td style='text-align:left'>" .
	   $Cname .
	   "</td><td>" .
	   $routingNo .
	   "</td><td>" .
	   $chkPrefix .
	   "</td><td>" .
	   $CnameAccNo .
	   "</td><td>" .
	   $ChkStrtNo .
	   "</td><td>" .
	   $Leaf_Qty .
	   "</td><td>" .
	   $Book_Qty .
	   "</td><td>" .
	   $BankCode .
	   "</td><td>" .
	   $DistCode .
	   "</td><td>" .
	   $BrncCode .
	   "</td><td>" .
	   $ChkDNo .
	   "</td><td>" .
	   $TrnCode .
	   "</td>
	   <td style='text-align:left'>" .
	   $edit .
	   "</td>
	   <td style='text-align:left'>" .
	   $delete .
	   "</td>
	   </tr>";
   //echo $footerSum;
   $kn++;
   
   echo $footerSum;   
}?>
	</table>

</div>
</div>
</body>
</HTML>
<br><br>
<?php
include('templates/footer.php');
?>
