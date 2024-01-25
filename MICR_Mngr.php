<?php
date_default_timezone_set('Asia/Dhaka');
include 'templates/header.php';
ob_start();
session_start();
include 'config.php';
include("convertToBangla.php");
ini_set('display_errors', 'off');
if (!isset($_SESSION['OifficeLevel'])) {
    header("Location:login.php");
    exit;
}
$offCode = $_SESSION['offCode'];
$OfficeLoc = $_SESSION['OifficeLevel'];
$type = $_SESSION['type'];
$BrCode = $_SESSION['offCode'];
$uid = $_SESSION['uid'];

//Get Branch Name
$sqlBr = "select b.brNameEn,b.ZoneID,z.Zone_en from br b 
left join `zone` z on z.zoneCode =b.ZoneID 
where b.brcode =" . $offCode;
$chkBr = mysqli_query($conn, $sqlBr);
$data = mysqli_fetch_array($chkBr);
$getBr = trim($data['brNameEn']);
$getBrZone = trim($data['Zone_en']);

//Get Zone Name
$sqlZn = "select z.Zone_en from zone z where z.zoneCode =" . $offCode;
$chkZn = mysqli_query($conn, $sqlZn);
$data = mysqli_fetch_array($chkZn);
$getZn = trim($data['Zone_en']);

//Get Zonal Audit Name
$sqlZao = "select z.Zao_en from zao z where z.ZaoCode =" . $offCode;
$chkZao = mysqli_query($conn, $sqlZao);
$data = mysqli_fetch_array($chkZao);
$getZao = trim($data['Zao_en']);

//Get Divisional Office
$sqldiv = "select d.DivisionNameEn from division d where d.divisionId =" . $offCode;
$chkdiv = mysqli_query($conn, $sqldiv);
$data = mysqli_fetch_array($chkdiv);
$getdiv = trim($data['DivisionNameEn']);

//Get Divisional Audit Office
$sqldao = "select d.DivisionNameEn from dao d where d.divisionId =" . $offCode;
$chkdao = mysqli_query($conn, $sqldao);
$data = mysqli_fetch_array($chkdao);
$getdao = trim($data['DivisionNameEn']);

//Get Department Name
$sqlDprt = "select d.DeptName from department d where d.deptCode =" . $offCode;
$chkDprt = mysqli_query($conn, $sqlDprt);
$data = mysqli_fetch_array($chkDprt);
$getDprt = trim($data['DeptName']);

?>
<style>
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
	  border:1px solid white;
	  
	}
	.center 
	{
	  margin-left: auto;
	  margin-right: auto;
	}
#customers1 {
   
    border-collapse: collapse;
    width: 50%;
	font-size:x-small;
}

#customers1 td, #customers1 th {
    border: 1px solid green;
    padding: 1px;
	vertical-align: top;
}

#customers1 tr:nth-child(even){background-color: #f2f2f2;}

#customers1 tr:hover {background-color: #ddd;}

#customers1 th {
    padding-top: 1px;
    padding-bottom: 1px;
    text-align: center;
background-color:#E4F0F5;
    color: black;
	 font-weight: bold;
}
#customers1 td 
{
	font-weight: bold;
	text-align:center;
}
</style>

<script>
    function createPDF() {
		
        var sTable = document.getElementById('tab').innerHTML;

        var style = "<style>";
		style = style + "#customers1 {width: 50%;font: 17px Calibri;}";
        style = style + "#customers {width: 100%;font: 17px Calibri;}";
        style = style + "#customers1, #customers, #customers1 th, #customers1 td, #customers th, #customers td {border: solid 1px #000000; border-collapse: collapse;";
        style = style + "padding: 2px 3px;text-align: center;}";
		//style = style + "@media print, screen{ .headerSection { position: top;}";
		style = style + "@media print { thead {display: table-header-group;} }";
        style = style + "</style>";

        // CREATE A WINDOW OBJECT.
        var win = window.open('', '', 'height=700,width=700');

        win.document.write('<html><head>');
        win.document.write('<title>Staff Position Report</title>');   // <title> FOR PDF HEADER.
        
        win.document.write('</head>');
        win.document.write('<body>');
		win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
        win.document.write(sTable);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
        win.document.write('</body></html>');

        win.document.close(); 	// CLOSE THE CURRENT WINDOW.

        win.print();    // PRINT THE CONTENTS.
		
    }
	$(document).ready(function(){
    $("#btnExport").click(function() {
		
		console.log("INN");
		
		toExcel();
		
		console.log("INN2");
		/*
        let table = document.getElementsByTagName("table");
		
			TableToExcel.convert(table[1], { // html code may contain multiple tables so here we are refering to 1st table tag
			   name: `staffposition.xlsx`, // fileName you could use any name
			   sheet: {
				  name: 'Sheet 1' // sheetName
			   }
			});
			
						TableToExcel.convert(table[2], { // html code may contain multiple tables so here we are refering to 1st table tag
			   name: `staffposition.xlsx`, // fileName you could use any name
			   sheet: {
				  name: 'Sheet 1' // sheetName
			   }
			});
/**/	
		});	
});


function toExcel() {

    if ("ActiveXObject" in window) {
        alert("This is Internet Explorer!");
    } else {

        var cache = {};
        this.tmpl = function tmpl(str, data) {
            var fn = !/\W/.test(str) ? cache[str] = cache[str] || tmpl(document.getElementById(str).innerHTML) :
            new Function("obj",
                         "var p=[],print=function(){p.push.apply(p,arguments);};" +
                         "with(obj){p.push('" +
                         str.replace(/[\r\t\n]/g, " ")
                         .split("{{").join("\t")
                         .replace(/((^|}})[^\t]*)'/g, "$1\r")
                         .replace(/\t=(.*?)}}/g, "',$1,'")
                         .split("\t").join("');")
                         .split("}}").join("p.push('")
                         .split("\r").join("\\'") + "');}return p.join('');");
            return data ? fn(data) : fn;
        };
        var tableToExcel = (function () {
            var uri = 'data:application/vnd.ms-excel;base64,',
                template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{{=worksheet}}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body>{{for(var i=0; i<tables.length;i++){ }}<table>{{=tables[i]}}</table>{{ } }}</body></html>',
                base64 = function (s) {
                    return window.btoa(unescape(encodeURIComponent(s)));
                },
                format = function (s, c) {
                    return s.replace(/{(\w+)}/g, function (m, p) {
                        return c[p];
                    });
                };
            return function (tableList, name) {
                if (!tableList.length > 0 && !tableList[0].nodeType) table = document.getElementById(table);
                var tables = [];
                for (var i = 1; i < tableList.length; i++) {
                    tables.push(tableList[i].innerHTML);
                }
                var ctx = {
                    worksheet: name || 'Worksheet',
                    tables: tables
                };
                window.location.href = uri + base64(tmpl(template, ctx));
            };
        })();
        tableToExcel(document.getElementsByTagName("table"), "one");
    }
}
</script>
<html>
<script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>
  <div class="content">
	<div class="container" >
		<div class="row">
			<form id="chkPrefix" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data" >
				<div class="col-md-6">
					<b class="required" style="font-size: 15px;color: red">হিসাবের ধরণ চিহ্নিত করুণ:</b> 
					<input type="radio" name="chkPrefix" id="SB" value="SB">
					<label for="SB">সঞ্চয়ী হিসাব</label>
					<input type="radio" name="chkPrefix" id="CD" value="CD">
					<label for="CD">চলতি হিসাব</label>
					<input type="radio" name="chkPrefix" id="DD" value="DD">
					<label for="DD">ডিমান্ড ড্রাফ্‌ট</label>
					<input type="radio" name="chkPrefix" id="PO" value="PO">
					<label for="PO">পে অর্ডার</label>
				</div>
				<div class="form-group">        
					<div class="save" style="text-align:left;">
					<button type="submit" id="MICR_Entry" name="MICR_Entry" class="btn btn-danger"><span class='glyphicon glyphicon-eye-open'></span> দেখুন</button>	
					</div>
				</div>
			</form>
	<?php 
		if (isset($_POST['chkPrefix']))
		{
			$chkPrefix=$_POST['chkPrefix'];
		
			//echo $chkPrefix;exit;
			$sql='SELECT * FROM `micr_entry` WHERE BrCode="'.$BrCode.'" AND`chkPrefix`="'.$chkPrefix.'"';
			$result = mysqli_query($conn, $sql);
			if(mysqli_num_rows($result)==0)
			{
				echo '<br><br><br><br><br><br><p style="font-family:NIKOSH;font-size:30px;text-align:center;color:red">কোন তথ্য পাওয়া যায় নি!</p>';
				exit;
			}		
	?>
		<div id="tab">  
 <?php
foreach ($arrayB as $brCode) {
	$sql='SELECT `brNameEn` FROM `br` WHERE `brcode`="'.$brCode.'"';
	$result = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_array($result)) {
		$branch=$row["brNameEn"];
	} 

	$sql='SELECT `Zone_en` FROM `zone` WHERE `zoneCode`="'.$brCode.'"';
	$result = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_array($result)) {
		$zone=$row["Zone_en"];
	}
	$sql='SELECT `Zao_en` FROM `zaoupdate` WHERE `ZaoCode`="'.$brCode.'"';
	$result = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_array($result)) {
		$zao=$row["Zao_en"];
	}
	
	$sql='SELECT `DivisionNameEn` FROM `division` WHERE `divisionId`="'.$brCode.'"';
	$result = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_array($result)) {
		$division=$row["DivisionNameEn"];
	}
	$sql='SELECT `DivisionNameEn` FROM `dao` WHERE `divisionId`="'.$brCode.'"';
	$result = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_array($result)) 
	{
		$divisionAudit=$row["DivisionNameEn"];
	}
	$sql='SELECT `DeptName` FROM `department` WHERE `deptCode`="'.$brCode.'"';
	$result = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_array($result)) {
		$dept=$row["DeptName"];
	}
}
?>	
	<div class="col-md-12 dept-block">		
		<body>
		<table align="center">
		<tr>
		<td><img src="img/rakub.png" width="70" height="70">
		<td align="center"><h2 style="font-family:sans-sherif">Rajshahi Krishi Unnayan Bank</h2>
		<?php if($OfficeLoc=='1')	
		{ ?>
		<p style="text-align:center;font-size: 17px;"><?php echo $getBr?> Branch, <?php echo $getBrZone?> Zone</p></td></tr>
		<?php } ?>
		<?php if($OfficeLoc=='2')	
		{ ?>
			<p style="text-align:center;font-size: 17px;"><?php echo $getZn?> Zone</p></td></tr>
		<?php } ?>
		<?php if($OfficeLoc=='3')	
		{ ?>
			<p style="text-align:center;font-size: 17px;"><?php echo $getZao?> Zonal Audit Office</p></td></tr>
		
		<?php } ?>
		<?php if($OfficeLoc=='4')	
		{ ?>
			<p style="text-align:center;font-size: 17px;"><?php echo $getdiv?> Divisional Office</p></td></tr>
		
		<?php } ?>
		<?php if($OfficeLoc=='5')	
		{ ?>
			<p style="text-align:center;font-size: 17px;"><?php echo $getdao?> Divisional Audit Office</p></td></tr>
		<?php } ?>
		<?php if($OfficeLoc=='6')	
		{ ?>
			<p style="text-align:center;font-size: 17px;"><?php echo $getDprt?>, Head Office, Rajshahi</p></td></tr>
		<?php } ?>
		</table>
		<br>
		<?php 
		if($chkPrefix=='SB')
		{ ?>	
			<u><p style="text-align:center; font-size:22px; font-family: sans-sherif">প্রিন্টিং এর জন্য প্রেরিত ছক-MICR-সঞ্চয়ী হিসাব <?php echo $entryDateMonth ?></p></u>
		<?php 
		} 
		else if($chkPrefix=='CD')
		{ ?>	
			<u><p style="text-align:center; font-size:22px; font-family: sans-sherif">প্রিন্টিং এর জন্য প্রেরিত ছক-MICR-চলতি হিসাব <?php echo $entryDateMonth ?></p></u>
		<?php 
		} 
		else if($chkPrefix=='DD')
		{ ?>	
			<u><p style="text-align:center; font-size:22px; font-family: sans-sherif">প্রিন্টিং এর জন্য প্রেরিত ছক-MICR-ডিমান্ড ড্রাফ্‌ট<?php echo $entryDateMonth ?></p></u>
		<?php 
		} 
		else if($chkPrefix=='PO')
		{ ?>	
			<u><p style="text-align:center; font-size:22px; font-family: sans-sherif">প্রিন্টিং এর জন্য প্রেরিত ছক-MICR-পে অর্ডার<?php echo $entryDateMonth ?></p></u>
		<?php 
		} 
		?>
		<br>
		</div>
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
			</tr>
		</thead>				
<?php
	if($OfficeLoc==1)
	{
		if($chkPrefix=='SB')
		{
			$sql='SELECT m.*,r.name,r.zone_name FROM `micr_entry` m LEFT join routing r ON r.code=m.BrCode WHERE m.`BrCode`="'.trim($BrCode).'" and `status`=0 and `chkPrefix`="SB"' ;
		}
		if($chkPrefix=='CD')
		{
			$sql='SELECT m.*,r.name,r.zone_name FROM `micr_entry` m LEFT join routing r ON r.code=m.BrCode WHERE m.`BrCode`="'.trim($BrCode).'" and `status`=0 and `chkPrefix`="CD"' ;
		}
		if($chkPrefix=='DD')
		{
			$sql='SELECT m.*,r.name,r.zone_name FROM `micr_entry` m LEFT join routing r ON r.code=m.BrCode WHERE m.`BrCode`="'.trim($BrCode).'" and `status`=0 and `chkPrefix`="DD"' ;
		}
		if($chkPrefix=='PO')
		{
			$sql='SELECT m.*,r.name,r.zone_name FROM `micr_entry` m LEFT join routing r ON r.code=m.BrCode WHERE m.`BrCode`="'.trim($BrCode).'" and `status`=0 and `chkPrefix`="PO"' ;
		}
		//echo $sql;EXIT;
	}
	else if($OfficeLoc=='2')//Zone	
	{
		$sql = '';
	}
	else if($OfficeLoc=='3')//Zao	
	{
		$sql = '';
	}	
	else if($OfficeLoc=='4')//Division	
	{
		$sql = '';
	}
	else if($OfficeLoc=='5')//Divisional Audit Office	
	{
		$sql = '';
	}
	else if($OfficeLoc=='6')//HO
	{
		$sql = '';
	}
   $result = mysqli_query($conn, $sql);

   if (!$result) {
       die("Invalid query: " . mysqli_error($conn));
   }

   $kn = 1;
   while ($row = mysqli_fetch_assoc($result)) {
	
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
	   </tr>";
   //echo $footerSum;
   $kn++;
   
   echo $footerSum;   
}?>
	</table><br>
	</body>
	</div> <!-- end print area-->	
	<p align="right">
	<br><a href="#" class="btn btn-warning btn-md"> Back </a>
	<span style="margin-left:10px;"> &nbsp; <a  class="btn btn-info btn-md" value="Create PDF" id="btPrint" onclick="createPDF()" > Get PDF </a> </span>
	<span style="margin-left:10px;"> &nbsp; <a  class="btn btn-success btn-md" value="Create excel" id="btnExport"> Get Excel </a> </span>
	</p>
		</div>	
	</div>
</div>
<!-- /container -->
</HTML>
<br><br>
<?php
include('templates/footer.php');
?>
<?php } ?>