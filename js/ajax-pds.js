/// present postin place

    $(document).ready(function() {
        $(".OfficeLoc").change(function() {
            var id = $(this).val();
            $(".result").html("");
            var dataString = 'id=' + id ;
			$(".ZoneList").val('');
			$(".branch").html('');
            if ($(this).val() != 1) {
                $('.branch').hide();
				$(".branch").html('');
            } else {
                $('.branch').show();
				$(".branch").val('');
            }
            $.ajax({
                type: "POST",
                url: "zoneList.php",
                data: dataString,
                cache: false,
                success: function(html)
                {
                    $(".ZoneList").html(html);
					$(".branch").val('');
					
                }
            });
        });

        $(".ZoneList").change(function() {
                var id = $(this).val();
                $(".result").html("");
                var nameoff = $('.ZoneList option:selected').text();
                var dataString = 'id=' + id;
                var offloc = $('.OfficeLoc option:selected').val();
				/*
                if (offloc != 1)
                {
                    if (offloc == 2)
                    {
                        $(".result").html("Zonal Office,  " + nameoff );
                        $(".result").css({
                            'color': 'red',
                            'font-size': '120%'
                        });
                    } 
				else if (offloc == 3)
                    {
                        $(".result").html("Zonal Audit Office,  " + nameoff);
                        $(".result").css({
                            'color': 'red',
                            'font-size': '120%'
                        });
                    } 
				else if (offloc == 4)
                    {
                        $(".result").html(" Divisional Office, " + nameoff);
                        $(".result").css({
                            'color': 'red',
                            'font-size': '120%'
                        });
                    } 
					else if (offloc == 5)
                    {
                        $(".result").html("Divisional Audit Office, "+ nameoff );
                        $(".result").css({
                            'color': 'red',
                            'font-size': '120%'
                        });
                    } 
					else if (offloc == 6)
                    {
                        $(".result").html(nameoff+", Head Office, Rajshahi");
                        $(".result").css({
                            'color': 'red',
                            'font-size': '120%'
                        });
                    }
                    return false;
                }
				else
				{
					$(".result").html(nameoff+" Branch, "+);
					$(".result").css({
					'color': 'red',
					'font-size': '120%'
					});
				}	
				
				*/
                $.ajax
                    ({
                    type: "POST",
                    url: "brList.php",
                    data: dataString,
                    cache: false,
                    success: function(html)
                    {
                        $(".branch").html(html);
                    }
                });
            });
			
			/*
        $(".branch").change(function() {
                var idbr = $(this).val();
                var brname = $('.branch option:selected').text();
                var offloc = $('.OfficeLoc option:selected').val();
				
                if (offloc == 1) {
                    $(".result").html("<br/> শাখার নাম : " + brname + "<br/> শাখার কোড: " + idbr);
					//$(".txt").val("<br/> শাখার নাম : " + brname + "<br/> শাখার কোড: " + idbr);
                    $(".result").css({
                        'color': 'red',
                        'font-size': '120%'
                    });
                    return false;
                }
				
            }); */
			
    });

///  end present posting place
//load Basic Pay
$(document).ready(function(){
//$("#dvbasicpay").show();
	
	$("#SalaryScale").change(function(){
        $("#dvbasicpay").show();
		var id=$(this).val();
        var dataString = "id="+id;

		//alert(dataString);
		$.ajax({
			type: "POST",
			url: "loadBasicPay.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				
				$("#dvbasicpay").html(html);
				
			} 
		});
		
	 });
});

// load education 
$(document).ready(function(){
	
$("#txtexamName").hide();
$("#txtGrpName").hide();

	$("#ExamName").change(function(){
        $("#txtGrpName").hide();
		var id=$(this).val();
        var dataString = "id="+id;
			if(id=='other' || id=='Graduation' || id=='Post-Graduation')
			{
			  $("#txtexamName").show();
			}
			else
			{
				$("#txtexamName").hide();
			}
			
		//alert(dataString);
		$.ajax({
			type: "POST",
			url: "loadEduGrp.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				
				$("#dvGrpEdu").html(html);
				
			} 
		});
		
	 });
	 
	 $(".drpGrpName").change(function(){
		 
		var grpVal=$('#grpName').val();
		if(grpVal=='Others')
		{
			$("#txtGrpName").show();
		}
		else
		{
			$("#txtGrpName").hide();
		}
		
		
		
	 });
	 
	 
});


/// end load education

//Professional Information
$(document).ready(function() {

 $("#addProfessional").click(function () {
        if ($('#professionalInfo').valid()) {
            return true;
			
        } else {
            alert("There are something wrong in the Professional form. Please verify all fields and try again.");
			//$('.errortxt').filter(":first").focus();
			return false;
        }
    });

 });
 /*
$(document).ready(function() {

$(document).on('click', '#addProfessional', function()
{	

	
var frmProAdd = $('#professionalInfo')[0];
var fdProAdd = new FormData(frmProAdd);
 
var txtPersonalFileNo=$("#txtPersonalFileNo").val();
var Desi=$("#Desi").val();
var date_joinbank=$("#date_joinbank").val();
var Desi_join=$("#Desi_join").val();
var joiningscale=$("#joiningscale").val();
var postingplace=$("#postingplace").val();
var date_present=$("#date_present").val();
var date_promotion=$("#date_promotion").val();
var promotionDtOfficer=$("#promotionDtOfficer").val();
var date_prlstart=$("#date_prlstart").val();
var date_retirement=$("#date_retirement").val();
var status_employee=$("#status_employee").val();
var status_employment=$("#status_employment").val();
var pftype=$("#pftype").val();
var date_jobconfirm=$("#date_jobconfirm").val();
var policeverification=$("#policeverification").val();
var scale_present=$("#scale_present").val();
var basicpay=$("#basicpay").val();
var SalaryAccountNo=$("#SalaryAccountNo").val();
var increment_last=$("#increment_last").val();
var pf_gpf=$("#pf_gpf").val();
var pf_rate=$("#pf_rate").val();
var bvno=$("#bvno").val();
var FreedomFighterSelf=$("#FreedomFighterSelf").val();
var QuotaAvailed=$("#QuotaAvailed").val();
var GuaranteeName=$("#GuaranteeName").val();
var GuaranteeAddress=$("#GuaranteeAddress").val();
var GuaranteeAmount=$("#GuaranteeAmount").val();
var account_security=$("#account_security").val();
var OfficeMobile=$("#OfficeMobile").val();
var TelephoneNo=$("#TelephoneNo").val();
var OfficialEmailAddress=$("#OfficialEmailAddress").val();
var diploma_JAIBB=$("#diploma_JAIBB").val();
var EnrollmentNo=$("#EnrollmentNo").val();
var RollNo=$("#RollNo").val();
var PassingYear=$("#PassingYear").val();
var PassingMonth=$("#PassingMonth").val();
var diploma_DAIBB=$("#diploma_DAIBB").val();
var EnrollmentNo=$("#EnrollmentNo").val();
var RollNo_DAIBB=$("#RollNo_DAIBB").val();
var PassingYear_DAIBB=$("#PassingYear_DAIBB").val();
var PassingMonth_DAIBB=$("#PassingMonth_DAIBB").val();
var ApprovalAuthority=$("#ApprovalAuthority").val();
var LetterReferenceNo=$("#LetterReferenceNo").val();
var IssuingDate=$("#IssuingDate").val();
var DegreeCourse=$("#DegreeCourse").val();
var field_exp=$("#field_exp").val();


 fdProAdd.append("insPro", 11);

      $.ajax({
        url:"insert_Professional.php",
        type:"POST",
        data:fdProAdd,
		processData: false,
		contentType: false,
		cache: false,
		async: false,
		
        success:function(rsInPro)
		{
			
			if($.trim(rsInPro)=='svPro')
			{
				alert("Successful");
			}
			else
			{
				alert(rsInPro);
			}
         	 
         
		 }
		});
	
});
});
*/
//Personal Information

$(document).ready(function() {

 $("#addPersonal").click(function () {
        if ($('#personalInfo').valid()) {
            return true;
			
        } else {
            alert("There are something wrong in the Personal form. Please verify all fields and try again.");
			//$('.errortxt').filter(":first").focus();
			return false;
        }
    });

 });

/*
$(document).ready(function() {

$(document).on('click', '#addPersonal', function()
{	

	
var frmPerAdd = $('#personalInfo')[0];
var fdPerAdd = new FormData(frmPerAdd);
 
var nameEng=$("#nameEng").val();
var nameBng=$("#nameBng").val();
var BirthDate=$("#BirthDate").val();
var bpdistricts=$("#bpdistricts").val();
var Religion=$("#Religion").val();
var gender=$("#gender").val();
var BloodGroup=$("#BloodGroup").val();
var NIDCardNo=$("#NIDCardNo").val();
var FatherName=$("#FatherName").val();
var FatherContactNo=$("#FatherContactNo").val();
var MotherName=$("#MotherName").val();
var MotherContactNo=$("#MotherContactNo").val();
var Nationality=$("#Nationality").val();
var BirthCertificate=$("#BirthCertificate").val();
var MaritalStatus=$("#MaritalStatus").val();
var HomeDistrict=$("#HomeDistrict").val();
var Hobby=$("#Hobby").val();
var PersonalMobile=$("#PersonalMobile").val();
var EmergencyContactNo=$("#EmergencyContactNo").val();
var PersonalEmailAddress=$("#PersonalEmailAddress").val();
var PassportNo=$("#PassportNo").val();
var eTIN=$("#eTIN").val();
var PrVill=$("#PrVill").val();
var PrRoad=$("#PrRoad").val();
var Div=$("#Div").val();
var Distict=$("#Distict").val();
var prps=$("#prps").val();
var postOffice=$("#postOffice").val();
var PerVill=$("#PerVill").val();
var PerRoad=$("#PerRoad").val();
var PerDiv=$("#PerDiv").val();
var PerDistict=$("#PerDistict").val();
var perps=$("#perps").val();
var PerPO=$("#PerPO").val();
var SpouseName=$("#SpouseName").val();
var spGender=$("#spGender").val();
var spDateBirth=$("#spDateBirth").val();
var spNationalIDNo=$("#spNationalIDNo").val();
var Relation=$("#Relation").val();
var SpouseContactNo=$("#SpouseContactNo").val();
var SpousePermanentAddress=$("#SpousePermanentAddress").val();
var SpouseOrganization=$("#SpouseOrganization").val();
var SpouseOrganizationPlace=$("#SpouseOrganizationPlace").val();
var SpouseProfession=$("#SpouseProfession").val();
var spFather=$("#spFather").val();
var sptMotherName=$("#sptMotherName").val();
var ExtraCurriculum=$("#ExtraCurriculum").val();

var imgfile = $('.InputImg').prop('files')[0];
var signfile = $('.ImgSign').prop('files')[0];
 
 fdPerAdd.append('imgfile', imgfile);
 fdPerAdd.append('signfile', signfile);
 fdPerAdd.append("insPer", 11);

      $.ajax({
        url:"insert_Personal.php",
        type:"POST",
        data:fdPerAdd,
		processData: false,
		contentType: false,
		cache: false,
		async: false,
		
        success:function(rsInPer)
		{
			//alert(rs);
			if($.trim(rsInPer)=='svPer')
			{

				alert("Successful");
			}
			else
			{
				alert(rsInPer);
			}

			
          	 
         
		 }
		});

	
});
});

*/

$(document).ready(function() 
{
$(document).on('click', '.delPn', function()
{

var pid=this.id;
var frmn = $('#punishment')[0];
var fdPn = new FormData(frmn);
fdPn.append("del", 8);
fdPn.append("pnshiId", pid);

if(confirm('Are you sure to delete this record ?')) {
      $.ajax({
        url:"del_Pn.php",
        type:"POST",
		data:fdPn, 
		processData: false,
		contentType: false,
		cache: false,
		async: false,
		
        success:function(rsPn)
		{
			 //alert(rsPn);
			 if($.trim(rsPn)=='del')
			 {
			   show_Punishment();
			 }
			 else
			 {
				 alert(rsPn);
			 }
			  
		}
		});
 }
//}
});
});



$(document).ready(function() {

 $("#addPunish").click(function () {
        if ($('#punishment').valid()) {
            return true;
			
        } else {
            alert("There are something wrong in the Punsihment form. Please verify all fields and try again.");
			return false;
        }
    });

 });
 
 
$(document).ready(function() {
show_Punishment();

$("#PunishTab").hide();
$("#newPunishAdd").show();
$(document).on('click','#newPunishAdd',function(){
	$("#newPunishAdd").hide();
	$("#PunishTab").slideDown();
	$("#hidePunish").show();
});
$(document).on('click','#hidePunish',function(){
	$("#newPunishAdd").slideDown();
	$("#PunishTab").slideUp();
	$("#hidePunish").hide();
});


$(document).on('click', '#addPunish', function()
{	

	
var frmPnAdd = $('#punishment')[0];
var fdPnAdd = new FormData(frmPnAdd);
 
var PunishmentName=$("#PunishmentName").val();
var PunishmentDesc=$("#PunishmentDesc").val();
var PunishmentDate=$("#PunishmentDate").val();
var PunishmentRefNo=$("#PunishmentRefNo").val();
var PunishmentRefAuth=$("#PunishmentRefAuth").val();

var pnfile = $('.pnfile').prop('files')[0];
 
 fdPnAdd.append('pnfile', pnfile);
 fdPnAdd.append("insPn", 11);

      $.ajax({
        url:"insert_Punish.php",
        type:"POST",
        data:fdPnAdd,
		processData: false,
		contentType: false,
		cache: false,
		async: false,
		
        success:function(rsInPn)
		{
			//alert(rs);
		    show_Punishment();
			if($.trim(rsInPn)=='svPn')
			{
				$("#PunishTab").slideUp();
				$("#newPunishAdd").show();
		
				$("#PunishmentName").val('');
				$("#PunishmentDesc").val('');
				$("#PunishmentDate").val('');
				$("#PunishmentRefNo").val('');
				$("#PunishmentRefAuth").val('');
				$(".pnfile").val('');
				
				$("#msgPn").show();
				setTimeout(function(){$("#msgPn").slideUp();},5000);
				
			}
			else
			{
				alert(rsInPn);
			}

			
          	 
         
		 }
		});

	
});
//update 	
$(document).on('click', '.updatePunish', function(){	
///alert('update');

$Pid=$(this).val();
//alert($Pid);
var frmPn = $('#punishment')[0];
var fdPn = new FormData(frmPn);
var filePn = $('#Pnfile'+$Pid).prop('files')[0];
 
var p_cause=$('#p_cause'+$Pid).val();
var p_description=$('#p_description'+$Pid).val();
var p_date=$('#p_date'+$Pid).val();
var p_refno=$('#p_refno'+$Pid).val();
var p_refauth=$('#p_refauth'+$Pid).val();

 
	fdPn.append('p_cause', p_cause);
	fdPn.append('p_description', p_description);
	fdPn.append('p_date', p_date);
	fdPn.append('p_refno', p_refno);
	fdPn.append('p_refauth', p_refauth);
    fdPn.append('filePn', filePn);
	fdPn.append('Pid', $(this).val());
	fdPn.append('editPn', 1);

      $.ajax({
        url:"update-Punishment.php",
        type:"POST",
        data:fdPn,
		processData: false,
		contentType: false,
		cache: false,
		async: false,
		
        success:function(rsPn)
		{
			if($.trim(rsPn)=='updPn')
			{
				$('#editPn'+$Pid).modal('hide');
				$('body').removeClass('modal-open');
				$('.modal-backdrop').remove();
				show_Punishment();
			}
			else
			{
				alert(rsPn);
			}
     	 
         
		 }
		});



});


	
});

//Showing Punsihment Information
function show_Punishment(){
	$.ajax({
		url: 'punishList.php',
		type: 'POST',
		async: false,
		data:{
			show: 2
		},
		success: function(rsp)
			{
			// alert (rsp);
			 $('#pnLst').html(rsp);
			}
	});
}


//Promotion
	
$(document).ready(function() 
{
$(document).on('click', '.delProm', function()
{

var promid=this.id;
var frmn = $('#promotion')[0];
var fdProm = new FormData(frmn);
fdProm.append("del", 8);
fdProm.append("promotion_id", promid);

if(confirm('Are you sure to delete this record ?')) {
      $.ajax({
        url:"del_Prom.php",
        type:"POST",
		data:fdProm, 
		processData: false,
		contentType: false,
		cache: false,
		async: false,
		
        success:function(rsProm)
		{
			 //alert(rsPn);
			 if($.trim(rsProm)=='del')
			 {
			   show_Promotion();
			 }
			 else
			 {
				 alert(rsProm);
			 }
			  
		}
		});
 }
//}
});
});



$(document).ready(function() {

 $("#addPromotion").click(function () {
        if ($('#promotion').valid()) {
            return true;
			
        } else {
            alert("There are something wrong in the Promotion form. Please verify all fields and try again.");
			return false;
        }
    });

 });
 
 
$(document).ready(function() {
show_Promotion();

$("#PromotionTab").hide();
$("#newPromotionAdd").show();
$(document).on('click','#newPromotionAdd',function(){
	$("#newPromotionAdd").hide();
	$("#PromotionTab").slideDown();
	$("#hidePromotion").show();
});
$(document).on('click','#hidePromotion',function(){
	$("#newPromotionAdd").slideDown();
	$("#PromotionTab").slideUp();
	$("#hidePromotion").hide();
});


$(document).on('click', '#addPromotion', function()
{	

	
var frmPromAdd = $('#promotion')[0];
var fdPromAdd = new FormData(frmPromAdd);
 
var FromDesg=$("#FromDesg").val();
var ToDesg=$("#ToDesg").val();
var PromotionDate=$("#PromotionDate").val();
var PromotionRefNo=$("#PromotionRefNo").val();

var promfile = $('.promfile').prop('files')[0];
 
 fdPromAdd.append('promfile', promfile);
 fdPromAdd.append("insProm", 11);

      $.ajax({
        url:"insert_Promotion.php",
        type:"POST",
        data:fdPromAdd,
		processData: false,
		contentType: false,
		cache: false,
		async: false,
		
        success:function(rsInProm)
		{
			
		    show_Promotion();
			if($.trim(rsInProm)=='svProm')
			{
				$("#PromotionTab").slideUp();
				$("#newPromotionAdd").show();
		
				$("#FromDesg").val('');
				$("#ToDesg").val('');
				$("#PromotionDate").val('');
				$("#PromotionRefNo").val('');
				$(".promfile").val('');
				
				$("#msgProm").show();
				setTimeout(function(){$("#msgProm").slideUp();},5000);
				
			}
			else
			{
				alert(rsInProm);
			}

			
          	 
         
		 }
		});

	
});
//update 	
$(document).on('click', '.updatePromotion', function(){	
///alert('update');

$Promid=$(this).val();
//alert($Promid);
var frmProm = $('#promotion')[0];
var fdProm = new FormData(frmProm);
var fileProm = $('#Promfile'+$Promid).prop('files')[0];

var FromDesg=$('#FromDesg'+$Promid).val();
var ToDesg=$('#ToDesg'+$Promid).val();
var PromotionDate=$('#PromotionDate'+$Promid).val();
var PromotionRefNo=$('#PromotionRefNo'+$Promid).val();

 
	fdProm.append('FromDesg', FromDesg);
	fdProm.append('ToDesg', ToDesg);
	fdProm.append('PromotionDate', PromotionDate);
	fdProm.append('PromotionRefNo', PromotionRefNo);
    fdProm.append('fileProm', fileProm);
	fdProm.append('Promid', $(this).val());
	fdProm.append('editProm', 1);

      $.ajax({
        url:"update-Promotion.php",
        type:"POST",
        data:fdProm,
		processData: false,
		contentType: false,
		cache: false,
		async: false,
		
        success:function(rsProm)
		{
			if($.trim(rsProm)=='updProm')
			{
				$('#editProm'+$Promid).modal('hide');
				$('body').removeClass('modal-open');
				$('.modal-backdrop').remove();
				show_Promotion();
			}
			else
			{
				alert(rsProm);
			}
     	 
         
		 }
		});



});


	
});

//Showing Promotion Information
function show_Promotion(){
	$.ajax({
		url: 'promotionList.php',
		type: 'POST',
		async: false,
		data:{
			show: 2
		},
		success: function(rsprom)
			{
			// alert (rsp);
			 $('#promLst').html(rsprom);
			}
	});
}
	

	
//Showing Lien Information
function show_lien(){
	$.ajax({
		url: 'lienList.php',
		type: 'POST',
		async: false,
		data:{
			show: 1
		},
		success: function(response)
			{
			 $('#LienLst').html(response);
			}
	});
}

$(document).ready(function() {
show_lien();

$("#LienTab").hide();
$("#newLienAdd").show();
$(document).on('click','#newLienAdd',function(){
	$("#newLienAdd").hide();
	$("#LienTab").slideDown();
	$("#hideLien").show();
});
$(document).on('click','#hideLien',function(){
	$("#newLienAdd").slideDown();
	$("#LienTab").slideUp();
	$("#hideLien").hide();
});

 $("#addLien").click(function () {
        if ($('#lieninfo').valid()) {
            return true;
			
        } else {
            alert("There are something wrong in the Lien form. Please verify all fields and try again.");
			return false;
        }
    });

//$("#addLien").click(function(){		
$(document).on('click', '#addLien', function()
{

 var frmn = $('#lieninfo')[0];
 var fdata = new FormData(frmn);
 

var LienFromToOrg=$("#LienFromToOrg").val();
var PostingBankLien=$("#PostingBankLien").val();
var FromDateLien=$("#FromDateLien").val();
var ToDateLien=$("#ToDateLien").val();
var LienRefDate=$("#LienRefDate").val();

var file_ref = $('.file').prop('files')[0];
 
 fdata.append('file', file_ref);
 fdata.append("clkBtnId", this.id);
 fdata.append("ins", 1);

      $.ajax({
        url:"insert_lien.php",
        type:"POST",
        data:fdata,
		processData: false,
		contentType: false,
		cache: false,
		async: false,
		
        success:function(rs)
		{
			//alert(rs);
		    show_lien();
			if($.trim(rs)=='save')
			{
				$("#LienTab").slideUp();
				$("#newLienAdd").show();
		
				$("#LienFromToOrg").val('');
				$("#PostingBankLien").val('');
				$("#ToDateLien").val('');
				$("#FromDateLien").val('');
				
				$(".file").val('');
				
				$("#msgLien").show();
				setTimeout(function(){$("#msgLien").slideUp();},5000);
				
			}
			else
			{
				alert(rs);
			}

			
          	 
         
		 }
		});

//e.preventDefault();	
	});
});



$(document).ready(function() 
{
show_lien();
//delete lien 
$(document).on('click', '.delLn', function()
{

var frmn = $('#lieninfo')[0];
var fd = new FormData(frmn);
fd.append("LnId", this.id);

if(confirm('Are you sure to delete this record ?')) {
      $.ajax({
        url:"del_lien.php",
        type:"POST",
		data:fd, 
		processData: false,
		contentType: false,
		cache: false,
		async: false,
		
        success:function(rs)
		{
			 //alert(rs);
			 show_lien();
		}
		});
 }
//}
});
});

//upate lien
$(document).ready(function(){

$(document).on('click', '.updateLien', function()
{
$uid=$(this).val();

var frm = $('#lieninfo')[0];
var fd = new FormData(frm);
var file_ln = $('#lnfile'+$uid).prop('files')[0];
 
var LienFromToOrg=$('#LienFromToOrg'+$uid).val();
var PostingBankLien=$('#PostingBankLien'+$uid).val();
var FromDateLien=$('#FromDateLien'+$uid).val();
var ToDateLien=$('#ToDateLien'+$uid).val();
var LienRefDate=$('#LienRefDate'+$uid).val();
 
	fd.append('LienFromToOrg', LienFromToOrg);
	fd.append('PostingBankLien', PostingBankLien);
	fd.append('FromDateLien', FromDateLien);
	fd.append('ToDateLien', ToDateLien);
	fd.append('LienRefDate', LienRefDate);
	fd.append('lnfile', file_ln);
	fd.append('lnId', $(this).val());
	fd.append('edit', 1);

      $.ajax({
        url:"Lien_update.php",
        type:"POST",
        data:fd,
		processData: false,
		contentType: false,
		cache: false,
		async: false,
		
        success:function(rsln)
		{
			//alert(rsln);
		    //show_lien();
			if($.trim(rsln)=='update')
			{

				
				$('#edit'+$uid).modal('hide');
				$('body').removeClass('modal-open');
				$('.modal-backdrop').remove();
				show_lien();

			}
			else
			{
				alert(rsln);
			}

			
          	 
         
		 }
		});



/*
      
		    $uid=$(this).val();
			$('#edit'+$uid).modal('hide');
			$('body').removeClass('modal-open');
			$('.modal-backdrop').remove();
		   // alert($uid);
			
			$LienFromToOrg=$('#LienFromToOrg'+$uid).val();
			$PostingBankLien=$('#PostingBankLien'+$uid).val();
			$FromDateLien=$('#FromDateLien'+$uid).val();
			$ToDateLien=$('#ToDateLien'+$uid).val();
			//$file = $('#file'+$uid)[0].files;

				$.ajax({
					type: "POST",
					url: "Lien_update.php",
					data: {
						id: $uid,
						LienFromToOrg: $LienFromToOrg,
						PostingBankLien: $PostingBankLien,
						FromDateLien: $FromDateLien,
						ToDateLien: $ToDateLien,
						//file: $file,
						edit: 1,
					},
					success: function(r){
						alert(r);
						show_lien();
					}
				});
	
*/			
				
		});

	
});

//////Reward
$(document).ready(function() 
{

$(document).on('click', '.delRd', function()
{

var Rdid=this.id;
var frmn = $('#reward')[0];
var fdRd = new FormData(frmn);
fdRd.append("del", 8);
fdRd.append("rwrdId", Rdid);

if(confirm('Are you sure to delete this record ?')) {
      $.ajax({
        url:"del_Rd.php",
        type:"POST",
		data:fdRd, 
		processData: false,
		contentType: false,
		cache: false,
		async: false,
		
        success:function(rsRd)
		{
			 //alert(rsPn);
			 if($.trim(rsRd)=='del')
			 {
			   show_Reward();
			 }
			 else
			 {
				 alert(rsRd);
			 }
			  
		}
		});
 }
//}
});
});



$(document).ready(function() {

 $("#addReward").click(function () {
        if ($('#reward').valid()) {
            return true;
			
        } else {
            alert("There are something wrong in the Reward form. Please verify all fields and try again.");
			return false;
        }
    });

 });
 
 
$(document).ready(function() {
show_Reward();

$("#RewardTab").hide();
$("#newRewardAdd").show();
$(document).on('click','#newRewardAdd',function(){
	$("#newRewardAdd").hide();
	$("#RewardTab").slideDown();
	$("#hideReward").show();
});
$(document).on('click','#hideReward',function(){
	$("#newRewardAdd").slideDown();
	$("#RewardTab").slideUp();
	$("#hideReward").hide();
});

$(document).on('click', '#addReward', function()
{	
	
var frmRdAdd = $('#reward')[0];
var fdRdAdd = new FormData(frmRdAdd);
 
var RewardName=$("#RewardName").val();
var RewardDesc=$("#RewardDesc").val();
var RewardDate=$("#RewardDate").val();
var RewardedBy=$("#RewardedBy").val();
var RewardRefNo=$("#RewardRefNo").val();

var Rewardfile = $('.Rewardfile').prop('files')[0];
 
 fdRdAdd.append('Rewardfile', Rewardfile);
 fdRdAdd.append("insRd", 11);

      $.ajax({
        url:"insert_Reward.php",
        type:"POST",
        data:fdRdAdd,
		processData: false,
		contentType: false,
		cache: false,
		async: false,
		
        success:function(rsInRd)
		{
			//alert(rs);
		    show_Reward();
			if($.trim(rsInRd)=='svRd')
			{
				$("#RewardTab").slideUp();
				$("#newRewardAdd").show();
		
				$("#RewardName").val('');
				$("#RewardDesc").val('');
				$("#RewardDate").val('');
				$("#RewardedBy").val('');
				$("#RewardRefNo").val('');
				$(".Rewardfile").val('');
				
				$("#msgReward").show();
				setTimeout(function(){$("#msgReward").slideUp();},5000);
				
			}
			else
			{
				alert(rsInRd);
			}

		
         
		 }
		});

	
	
});
//update 	
$(document).on('click', '.updateReward', function(){	
///alert('update');

$Rdid=$(this).val();
//alert($Rdid);
var frmRd = $('#reward')[0];
var fdRd = new FormData(frmRd);
var fileRd = $('#Rdfile'+$Rdid).prop('files')[0];
 
var Rwardcause=$('#Rwardcause'+$Rdid).val();
var RwardDecs=$('#RwardDecs'+$Rdid).val();
var Rwarddate=$('#Rwarddate'+$Rdid).val();
var RwardBy=$('#RwardBy'+$Rdid).val();
var RwardRefNo=$('#RwardRefNo'+$Rdid).val();

	fdRd.append('Rwardcause', Rwardcause);
	fdRd.append('RwardDecs', RwardDecs);
	fdRd.append('Rwarddate', Rwarddate);
	fdRd.append('RwardBy', RwardBy);
	fdRd.append('RwardRefNo', RwardRefNo);
    fdRd.append('fileRd', fileRd);
	fdRd.append('Rdid', $(this).val());
	fdRd.append('editRd', 1);

      $.ajax({
        url:"update-Reward.php",
        type:"POST",
        data:fdRd,
		processData: false,
		contentType: false,
		cache: false,
		async: false,
		
        success:function(rsRd)
		{
			if($.trim(rsRd)=='updRd')
			{
				$('#editRd'+$Rdid).modal('hide');
				$('body').removeClass('modal-open');
				$('.modal-backdrop').remove();
				show_Reward();
			}
			else
			{
				alert(rsRd);
			}
     	 
         
		 }
		});



});


	
});

//Showing Reward Information
function show_Reward(){
	$.ajax({
		url: 'rewardList.php',
		type: 'POST',
		async: false,
		data:{
			show: 2
		},
		success: function(rsRd)
			{
			// alert (rsp);
			 $('#rdLst').html(rsRd);
			}
	});
}


// Transfer Information

//For Transfer From field

$(document).ready(function(){
	
	$("#trFromLoc").change(function() {
            var id = $(this).val();
            $(".trFromresult").html("");
            var dataString = 'id=' + id ;
			//alert('OK');
			$(".trFromZoneList").val('');
            if ($(this).val() != 1) {
                $('.trFrombranch').hide();
				$(".trFrombranch").html('');
            } else {
                $('.trFrombranch').show();
				$(".trFrombranch").val('');
            }
            $.ajax({
                type: "POST",
                url: "zoneList.php",
                data: dataString,
                cache: false,
                success: function(html)
                {
                    $(".trFromZoneList").html(html);
					$(".trFrombranch").val('');
					
                }
            });
        });

        $(".trFromZoneList").change(function() {
                var id = $(this).val();
                $(".trFromresult").html("");
                var nameoff = $('.trFromZoneList option:selected').text();
                var dataString = 'id=' + id;
                var offloc = $('.trFromLoc option:selected').val();
				/*
                if (offloc != 1)
                {
                    if (offloc == 2)
                    {
                        $(".trFromresult").html("জোনাল কার্যালয়,  " + nameoff + "<br/> কার্যালয় কোড: " + id);
                        $(".trFromresult").css({
                            'color': 'red',
                            'font-size': '120%'
                        });
                    } 
				else if (offloc == 3)
                    {
                        $(".trFromresult").html("জোনাল  নিরীক্ষা কার্যালয়,  " + nameoff + "<br/> কার্যালয় কোড: " + id);
                        $(".trFromresult").css({
                            'color': 'red',
                            'font-size': '120%'
                        });
                    } 
				else if (offloc == 4)
                    {
                        $(".trFromresult").html(" বিভাগীয় কার্যালয়, " + nameoff + "<br/> কার্যালয় কোড: " + id);
                        $(".trFromresult").css({
                            'color': 'red',
                            'font-size': '120%'
                        });
                    } 
					else if (offloc == 5)
                    {
                        $(".trFromresult").html("বিভাগীয়  নিরীক্ষা কার্যালয়, " + nameoff + "<br/> কার্যালয় কোড: " + id);
                        $(".trFromresult").css({
                            'color': 'red',
                            'font-size': '120%'
                        });
                    } else if (offloc == 6)
                    {
                        $(".trFromresult").html(" " + nameoff + "<br/> বিভাগের  কোড: " + id);
                        $(".trFromresult").css({
                            'color': 'red',
                            'font-size': '120%'
                        });
                    }
                    return false;
                } */
                $.ajax
                    ({
                    type: "POST",
                    url: "brList.php",
                    data: dataString,
                    cache: false,
                    success: function(html)
                    {
                        $(".trFrombranch").html(html);
                    }
                });
            });
			
			/*
        $(".trFrombranch").change(function() {
                var idbr = $(this).val();
                var brname = $('.trFrombranch option:selected').text();
                var offloc = $('.trFromLoc option:selected').val();
				
                if (offloc == 1) {
                    $(".trFromresult").html("<br/> শাখার নাম : " + brname + "<br/> শাখার কোড: " + idbr);
					//$(".txt").val("<br/> শাখার নাম : " + brname + "<br/> শাখার কোড: " + idbr);
                    $(".trFromresult").css({
                        'color': 'red',
                        'font-size': '120%'
                    });
                    return false;
                }
				
            }); */
			
    });

//For Transfer To field

$(document).ready(function(){
	$(".trToLoc").change(function() {
            var id = $(this).val();
            $(".trToresult").html("");
            var dataString = 'id=' + id ;
			$(".trToZoneList").val('');
			$(".trTobranch").html('');
            if ($(this).val() != 1) {
                $('.trTobranch').hide();
				$(".trTobranch").html('');
            } else {
                $('.trTobranch').show();
				$(".trTobranch").val('');
            }
            $.ajax({
                type: "POST",
                url: "zoneList.php",
                data: dataString,
                cache: false,
                success: function(html)
                {
                    $(".trToZoneList").html(html);
					$(".trTobranch").val('');
					
                }
            });
        });

        $(".trToZoneList").change(function() {
                var id = $(this).val();
                $(".trToresult").html("");
                var nameoff = $('.trToZoneList option:selected').text();
                var dataString = 'id=' + id;
                var offloc = $('.trToLoc option:selected').val();
				/*
                if (offloc != 1)
                {
                    if (offloc == 2)
                    {
                        $(".trToresult").html("জোনাল কার্যালয়,  " + nameoff + "<br/> কার্যালয় কোড: " + id);
                        $(".trToresult").css({
                            'color': 'red',
                            'font-size': '120%'
                        });
                    } 
				else if (offloc == 3)
                    {
                        $(".trToresult").html("জোনাল  নিরীক্ষা কার্যালয়,  " + nameoff + "<br/> কার্যালয় কোড: " + id);
                        $(".trToresult").css({
                            'color': 'red',
                            'font-size': '120%'
                        });
                    } 
				else if (offloc == 4)
                    {
                        $(".trToresult").html(" বিভাগীয় কার্যালয়, " + nameoff + "<br/> কার্যালয় কোড: " + id);
                        $(".trToresult").css({
                            'color': 'red',
                            'font-size': '120%'
                        });
                    } 
					else if (offloc == 5)
                    {
                        $(".trToresult").html("বিভাগীয়  নিরীক্ষা কার্যালয়, " + nameoff + "<br/> কার্যালয় কোড: " + id);
                        $(".trToresult").css({
                            'color': 'red',
                            'font-size': '120%'
                        });
                    } else if (offloc == 6)
                    {
                        $(".trToresult").html(" " + nameoff + "<br/> বিভাগের  কোড: " + id);
                        $(".trToresult").css({
                            'color': 'red',
                            'font-size': '120%'
                        });
                    }
                    return false;
                } */
                $.ajax
                    ({
                    type: "POST",
                    url: "brList.php",
                    data: dataString,
                    cache: false,
                    success: function(html)
                    {
                        $(".trTobranch").html(html);
                    }
                });
            });
			
			/*
        $(".trTobranch").change(function() {
                var idbr = $(this).val();
                var brname = $('.trTobranch option:selected').text();
                var offloc = $('.trToLoc option:selected').val();
				
                if (offloc == 1) {
                    $(".trToresult").html("<br/> শাখার নাম : " + brname + "<br/> শাখার কোড: " + idbr);
					//$(".txt").val("<br/> শাখার নাম : " + brname + "<br/> শাখার কোড: " + idbr);
                    $(".trToresult").css({
                        'color': 'red',
                        'font-size': '120%'
                    });
                    return false;
                }
				
            }); */
			
    });



$(document).ready(function() 
{
$(document).on('click', '.delTr', function()
{

var Trid=this.id;
var frmn = $('#transfer')[0];
var fdTr = new FormData(frmn);
fdTr.append("del", 8);
fdTr.append("trnsId", Trid);

if(confirm('Are you sure to delete this record ?')) {
      $.ajax({
        url:"del_Tr.php",
        type:"POST",
		data:fdTr, 
		processData: false,
		contentType: false,
		cache: false,
		async: false,
		
        success:function(rsTr)
		{
			 //alert(rsTr);
			 if($.trim(rsTr)=='del')
			 {
			   show_Transfer();
			 }
			 else
			 {
				 alert(rsTr);
			 }
			  
		}
		});
 }
//}
});
});



$(document).ready(function() {

 $("#addTransfer").click(function () {
        if ($('#transfer').valid()) {
            return true;
			
        } else {
            alert("There are something wrong in the Transfer form. Please verify all fields and try again.");
			return false;
        }
    });

 });
 
 
$(document).ready(function() {
show_Transfer();

$("#TransferTab").hide();
$("#newTransferAdd").show();
$(document).on('click','#newTransferAdd',function(){
	$("#newTransferAdd").hide();
	$("#TransferTab").slideDown();
	$("#hideTransfer").show();
});
$(document).on('click','#hideTransfer',function(){
	$("#newTransferAdd").slideDown();
	$("#TransferTab").slideUp();
	$("#hideTransfer").hide();
});


$(document).on('click', '#addTransfer', function()
{	

	
var frmTrAdd = $('#transfer')[0];
var fdTrAdd = new FormData(frmTrAdd);
 
var trFromLoc=$("#trFromLoc").val();
var trFromZoneList=$("#trFromZoneList").val();
var trFrombranch=$("#trFrombranch").val();
var trToLoc=$("#trToLoc").val();
var trToZoneList=$("#trToZoneList").val();
var trTobranch=$("#trTobranch").val();
var ReleaseDate=$("#ReleaseDate").val();
var ReleaseRefNo=$("#ReleaseRefNo").val();
var JoinDate=$("#JoinDate").val();
var JoinRefNo=$("#JoinRefNo").val();
var DesignationTransfer=$("#DesignationTransfer").val();

var Transferfile = $('.Transferfile').prop('files')[0];
 
 fdTrAdd.append('Transferfile', Transferfile);
 fdTrAdd.append("insTr", 11);

      $.ajax({
        url:"insert_Transfer.php",
        type:"POST",
        data:fdTrAdd,
		processData: false,
		contentType: false,
		cache: false,
		async: false,
		
        success:function(rsInTr)
		{
			//alert(rsInTr);
		    show_Transfer();
			if($.trim(rsInTr)=='svTr')
			{
				$("#TransferTab").slideUp();
				$("#newTransferAdd").show();
		
				$("#trFromLoc").val('');
				$("#trFromZoneList").val('');
				$("#trFrombranch").val('');
				$("#trToLoc").val('');
				$("#trToZoneList").val('');
				$("#trTobranch").val('');
				$("#JoinRefNo").val('');
				$("#ReleaseDate").val('');
				$("#ReleaseRefNo").val('');
				$("#JoinDate").val('');
				$("#DesignationTransfer").val('');
				$(".Transferfile").val('');
				
				$("#msgTransfer").show();
				setTimeout(function(){$("#msgTransfer").slideUp();},5000);
				
			}
			else
			{
				alert(rsInTr);
			}

		 }
		});

	
});
//update 	
$(document).on('click', '.updateTransfer', function(){	
///alert('update');

$Trid=$(this).val();
//alert($Trid);
var frmTr = $('#transfer')[0];
var fdTr = new FormData(frmTr);
var fileTr = $('#Transferfile'+$Trid).prop('files')[0];
 
var ReleaseDate=$('#ReleaseDate'+$Trid).val();
var ReleaseRefNo=$('#ReleaseRefNo'+$Trid).val();
var JoinRefNo=$('#JoinRefNo'+$Trid).val();
var JoinDate=$('#JoinDate'+$Trid).val();
var DesignationTransfer=$('#DesignationTransfer'+$Trid).val();

 
	fdTr.append('ReleaseDate', ReleaseDate);
	fdTr.append('ReleaseRefNo', ReleaseRefNo);
	fdTr.append('JoinRefNo', JoinRefNo);
	fdTr.append('JoinDate', JoinDate);
	fdTr.append('DesignationTransfer', DesignationTransfer);
    fdTr.append('fileTr', fileTr);
	fdTr.append('Trid', $(this).val());
	fdTr.append('editTr', 1);

      $.ajax({
        url:"update-Transfer.php",
        type:"POST",
        data:fdTr,
		processData: false,
		contentType: false,
		cache: false,
		async: false,
		
        success:function(rsTr)
		{
			if($.trim(rsTr)=='updTr')
			{
				$('#editTr'+$Trid).modal('hide');
				$('body').removeClass('modal-open');
				$('.modal-backdrop').remove();
				show_Transfer();
			}
			else
			{
				alert(rsTr);
			}
     	 
         
		 }
		});



});


	
});

//Showing Transfer Information
function show_Transfer(){
	$.ajax({
		url: 'transferList.php',
		type: 'POST',
		async: false,
		data:{
			show: 2
		},
		success: function(rsTr)
			{
			// alert (rsTr);
			 $('#transferLst').html(rsTr);
			}
	});
}
	
	
	
// Spouse Information	


$(document).ready(function() 
{
$(document).on('click', '.delSpu', function()
{

var Spuid=this.id;
var frmn = $('#spouse')[0];
var fdSpu = new FormData(frmn);
fdSpu.append("del", 8);
fdSpu.append("spId", Spuid);

if(confirm('Are you sure to delete this record ?')) {
      $.ajax({
        url:"del_Spu.php",
        type:"POST",
		data:fdSpu, 
		processData: false,
		contentType: false,
		cache: false,
		async: false,
		
        success:function(rsSpu)
		{
			 //alert(rsChd);
			 if($.trim(rsSpu)=='del')
			 {
			   show_Spouse();
			 }
			 else
			 {
				 alert(rsSpu);
			 }
			  
		}
		});
 }
//}
});
});



$(document).ready(function() {

 $("#addSpouse").click(function () {
        if ($('#spouse').valid()) {
            return true;
			
        } else {
            alert("There are something wrong in the Spouse form. Please verify all fields and try again.");
			return false;
        }
    });

 });
 
 
$(document).ready(function() {
show_Spouse();

$("#SpouseTab").hide();
$("#newSpouseAdd").show();
$(document).on('click','#newSpouseAdd',function(){
	$("#newSpouseAdd").hide();
	$("#SpouseTab").slideDown();
	$("#hideSpouse").show();
});
$(document).on('click','#hideSpouse',function(){
	$("#newSpouseAdd").slideDown();
	$("#SpouseTab").slideUp();
	$("#hideSpouse").hide();
});

$(document).on('click', '#addSpouse', function()
{	
	
var frmSpuAdd = $('#spouse')[0];
var fdSpuAdd = new FormData(frmSpuAdd);
 
var marital=$("#MaritalStatus").val();

var SpouseName=$("#SpouseName").val();
var SpouseGender=$("#SpouseGender").val();
var SpouseFather=$("#SpouseFather").val();
var SpouseMother=$("#SpouseMother").val();
var SpouseRelation=$("#SpouseRelation").val();
var SpouseContact=$("#SpouseContact").val();
var Spousedob=$("#Spousedob").val();
var SpouseNID=$("#SpouseNID").val();
var SpouseAddress=$("#SpouseAddress").val();
var SpouseOrg=$("#SpouseOrg").val();
var SpouseOrgAddress=$("#SpouseOrgAddress").val();
var SpouseDesignation=$("#SpouseDesignation").val();


 fdSpuAdd.append("insSpu", 11);
 fdSpuAdd.append("marital", marital);

      $.ajax({
        url:"insert_Spouse.php",
        type:"POST",
        data:fdSpuAdd,
		processData: false,
		contentType: false,
		cache: false,
		async: false,
		
        success:function(rsInSpu)
		{
			//alert(rsInChd);
		    show_Spouse();
			if($.trim(rsInSpu)=='svSpu')
			{
				$("#SpouseTab").slideUp();
				$("#newSpouseAdd").show();
		
				$("#SpouseName").val('');
				$("#SpouseFather").val('');
				$("#SpouseMother").val('');
				$("#Spousedob").val('');
				$("#SpouseNID").val('');
				$("#SpouseContact").val('');
				$("#SpouseAddress").val('');
				$("#SpouseOrg").val('');
				$("#SpouseOrgAddress").val('');
				$("#SpouseDesignation").val('');
				
				$("#msgSpouse").show();
				setTimeout(function(){$("#msgSpouse").slideUp();},5000);
				
			}
			else
			{
				alert(rsInSpu);
			}

		 }
		});

	
});

//update 	
$(document).on('click', '.updateSpouse', function(){	
///alert('update');

$Spuid=$(this).val();

var frmSpu = $('#spouse')[0];
var fdSpu = new FormData(frmSpu);
 
var SpouseName=$('#SpouseName'+$Spuid).val();
var SpouseGender=$('#SpouseGender'+$Spuid).val();
var SpouseFather=$('#SpouseFather'+$Spuid).val();
var SpouseMother=$('#SpouseMother'+$Spuid).val();
var SpouseRelation=$('#SpouseRelation'+$Spuid).val();
var SpouseNID=$('#SpouseNID'+$Spuid).val();
var Spousedob=$('#Spousedob'+$Spuid).val();
var SpouseContact=$('#SpouseContact'+$Spuid).val();
var SpouseAddress=$('#SpouseAddress'+$Spuid).val();
var SpouseOrg=$('#SpouseOrg'+$Spuid).val();
var SpouseOrgAddress=$('#SpouseOrgAddress'+$Spuid).val();
var SpouseDesignation=$('#SpouseDesignation'+$Spuid).val();

 
	fdSpu.append('SpouseName', SpouseName);
	fdSpu.append('SpouseGender', SpouseGender);
	fdSpu.append('SpouseFather', SpouseFather);
	fdSpu.append('SpouseMother', SpouseMother);
	fdSpu.append('SpouseRelation', SpouseRelation);
	fdSpu.append('SpouseNID', SpouseNID);
	fdSpu.append('Spousedob', Spousedob);
	fdSpu.append('SpouseContact', SpouseContact);
	fdSpu.append('SpouseAddress', SpouseAddress);
	fdSpu.append('SpouseOrg', SpouseOrg);
	fdSpu.append('SpouseOrgAddress', SpouseOrgAddress);
	fdSpu.append('SpouseDesignation', SpouseDesignation);
    
	fdSpu.append('Spuid', $(this).val());
	fdSpu.append('editSpu', 1);

      $.ajax({
        url:"update-Spouse.php",
        type:"POST",
        data:fdSpu,
		processData: false,
		contentType: false,
		cache: false,
		async: false,
		
        success:function(rsSpu)
		{
			if($.trim(rsSpu)=='updSpu')
			{
				$('#editSpu'+$Spuid).modal('hide');
				$('body').removeClass('modal-open');
				$('.modal-backdrop').remove();
				show_Spouse();
			}
			else
			{
				alert(rsSpu);
			}
     	 
         
		 }
		});



});


	
});

//Showing Spouse Information
function show_Spouse(){
	$.ajax({
		url: 'spouseList.php',
		type: 'POST',
		async: false,
		data:{
			show: 2
		},
		success: function(rsSpu)
			{
			// alert (rsChd);
			 $('#spouseLst').html(rsSpu);
			}
	});
}
	
	
// Children Information	


$(document).ready(function() 
{
$(document).on('click', '.delChd', function()
{

var Chdid=this.id;
var frmn = $('#children')[0];
var fdChd = new FormData(frmn);
fdChd.append("del", 8);
fdChd.append("chId", Chdid);

if(confirm('Are you sure to delete this record ?')) {
      $.ajax({
        url:"del_Chd.php",
        type:"POST",
		data:fdChd, 
		processData: false,
		contentType: false,
		cache: false,
		async: false,
		
        success:function(rsChd)
		{
			 //alert(rsChd);
			 if($.trim(rsChd)=='del')
			 {
			   show_Children();
			 }
			 else
			 {
				 alert(rsChd);
			 }
			  
		}
		});
 }
//}
});
});



$(document).ready(function() {

 $("#addChildren").click(function () {
        if ($('#children').valid()) {
            return true;
			
        } else {
            alert("There are something wrong in the Children form. Please verify all fields and try again.");
			return false;
        }
    });

 });
 
 
$(document).ready(function() {
show_Children();

$("#ChildrenTab").hide();
$("#newChildAdd").show();
$(document).on('click','#newChildAdd',function(){
	$("#newChildAdd").hide();
	$("#ChildrenTab").slideDown();
	$("#hideChild").show();
});
$(document).on('click','#hideChild',function(){
	$("#newChildAdd").slideDown();
	$("#ChildrenTab").slideUp();
	$("#hideChild").hide();
});

$(document).on('click', '#addChildren', function()
{	
	
var frmChdAdd = $('#children')[0];
var fdChdAdd = new FormData(frmChdAdd);
  
var marital=$("#MaritalStatus").val();

var ChildName=$("#ChildName").val();
var ChildGender=$("#ChildGender").val();
var ChildNationality=$("#ChildNationality").val();
var ChildResidence=$("#ChildResidence").val();
var ChildNID=$("#ChildNID").val();
var ChildBirthCert=$("#ChildBirthCert").val();
var ChildDoB=$("#ChildDoB").val();
var ChildDisable=$("#ChildDisable").val();
var ChildQualification=$("#ChildQualification").val();
if(ChildGender == '-1'){
	alert('Please Select Gender Option');
	exit();
}

var ChildQfile = $('.ChildQfile').prop('files')[0];
 
 fdChdAdd.append('ChildQfile', ChildQfile);
 fdChdAdd.append("insChd", 11);
 fdChdAdd.append("marital", marital);

      $.ajax({
        url:"insert_Children.php",
        type:"POST",
        data:fdChdAdd,
		processData: false,
		contentType: false,
		cache: false,
		async: false,
		
        success:function(rsInChd)
		{
			//alert(rsInChd);
		    show_Children();
			if($.trim(rsInChd)=='svChd')
			{
				$("#ChildrenTab").slideUp();
				$("#newChildAdd").show();
		
				$("#ChildName").val('');
				$("#ChildGender").val('-1');
				$("#ChildNationality").val('');
				$("#ChildResidence").val('');
				$("#ChildNID").val('');
				$("#ChildBirthCert").val('');
				$("#ChildDoB").val('');
				$("#ChildDisable").val('No');
				$("#ChildQualification").val('');
				$(".ChildQfile").val('');
				
				$("#msgChildren").show();
				setTimeout(function(){$("#msgChildren").slideUp();},5000);
				
			}
			else
			{
				alert(rsInChd);
			}

		 }
		});

	
});

//update 	
$(document).on('click', '.updateChildren', function(){	
alert('update');

$Chdid=$(this).val();

var frmChd = $('#children')[0];
var fdChd = new FormData(frmChd);
var fileChd = $('#cerChildFile'+$Chdid).prop('files')[0];
 
var ChildName=$('#ChildName'+$Chdid).val();
var ChildGender=$('#ChildGender'+$Chdid).val();
var ChildNationality=$('#ChildNationality'+$Chdid).val();
var ChildResidence=$('#ChildResidence'+$Chdid).val();
var ChildNID=$('#ChildNID'+$Chdid).val();
var ChildBirthCert=$('#ChildBirthCert'+$Chdid).val();
var ChildDoB=$('#ChildDoB'+$Chdid).val();
var ChildDisable=$('#ChildDisable'+$Chdid).val();
var ChildQualification=$('#ChildQualification'+$Chdid).val();


	fdChd.append('ChildName', ChildName);
	fdChd.append('ChildGender', ChildGender);
	fdChd.append('ChildNationality', ChildNationality);
	fdChd.append('ChildResidence', ChildResidence);
	fdChd.append('ChildNID', ChildNID);
	fdChd.append('ChildBirthCert', ChildBirthCert);
	fdChd.append('ChildDoB', ChildDoB);
	fdChd.append('ChildDisable', ChildDisable);
	fdChd.append('ChildQualification', ChildQualification);
    fdChd.append('fileChd', fileChd);
	fdChd.append('Chdid', $(this).val());
	fdChd.append('editChd', 1);

      $.ajax({
        url:"update-Children.php",
        type:"POST",
        data:fdChd,
		processData: false,
		contentType: false,
		cache: false,
		async: false,
		
        success:function(rsChd)
		{
			if($.trim(rsChd)=='updChd')
			{
				$('#editChd'+$Chdid).modal('hide');
				$('body').removeClass('modal-open');
				$('.modal-backdrop').remove();
				show_Children();
			}
			else
			{
				alert(rsChd);
			}
     	 
         
		 }
		});



});


	
});

//Showing Children Information
function show_Children(){
	$.ajax({
		url: 'childrenList.php',
		type: 'POST',
		async: false,
		data:{
			show: 2
		},
		success: function(rsChd)
			{
			// alert (rsChd);
			 $('#childrenLst').html(rsChd);
			}
	});
}
		
	
//////Training

$(document).ready(function() 
{

$(document).on('click', '.delTng', function()
{

var Tngid=this.id;

var frmn = $('#trainingPerson')[0];
var fdTng = new FormData(frmn);
fdTng.append("del", 8);
fdTng.append("trid", Tngid);

if(confirm('Are you sure to delete this record ?')) {
      $.ajax({
        url:"del_Tng.php",
        type:"POST",
		data:fdTng, 
		processData: false,
		contentType: false,
		cache: false,
		async: false,
		
        success:function(rsTng)
		{
			 //alert(rsTng);
			 if($.trim(rsTng)=='del')
			 {
			   show_Training();
			 }
			 else
			 {
				 alert(rsTng);
			 }
			  
		}
		});
 }
//}
});
});



$(document).ready(function() {

$("#addTraining").click(function () {
	
        if ($('#trainingPerson').valid()) {
            return true;
			
        } else {
            alert("There are something wrong in the Training form. Please verify all fields and try again.");
			return false;
        }
    });

});
 
 
$(document).ready(function() {
show_Training();
$("#TrainingTab").hide();
$("#newTrainAdd").show();
$(document).on('click','#newTrainAdd',function(){
	$("#newTrainAdd").hide();
	$("#TrainingTab").slideDown();
	$("#hideTrain").show();
});
$(document).on('click','#hideTrain',function(){
	$("#newTrainAdd").slideDown();
	$("#TrainingTab").slideUp();
	$("#hideTrain").hide();
});

$(document).on('click', '#addTraining', function()
{	

var frmTngAdd = $('#trainingPerson')[0];
var fdTngAdd = new FormData(frmTngAdd);
 
var TrainingName=$("#TrainingName").val();
var title=$("#title").val();
var StartDate=$("#StartDate").val();
var EndDate=$("#EndDate").val();
var PlaceTrain=$("#PlaceTrain").val();
var Duration=$("#Duration").val();
var Evaluation=$("#Evaluation").val();

var TrainCert = $('.TrainCert').prop('files')[0];
if(TrainingName == '-1'){
	alert('Please Select Training/Workshop/Seminer Name');
	exit();
}

 fdTngAdd.append('TrainCert', TrainCert);
 fdTngAdd.append("insTng", 11);

      $.ajax({
        url:"insert_Training.php",
        type:"POST",
        data:fdTngAdd,
		processData: false,
		contentType: false,
		cache: false,
		async: false,
		
        success:function(rsInTng)
		{
			//alert(rs);
		    show_Training();
			if($.trim(rsInTng)=='svTng')
			{
				$("#TrainingTab").slideUp();
				$("#newTrainAdd").show();
				
				$("#TrainingName").val('');
				$("#title").val('');
				$("#StartDate").val('');
				$("#EndDate").val('');
				$("#PlaceTrain").val('');
				$("#Duration").val('');
				$("#Evaluation").val('');
				$(".TrainCert").val('');
				
				$("#msgTraining").show();
				setTimeout(function(){$("#msgTraining").slideUp();},5000);
				
			}
			else
			{
				alert(rsInTng);
			}

		}
		});
	
});
//update 	
$(document).on('click', '.updateTraining', function(){	
///alert('update');

$Tngid=$(this).val();
//alert($Tngid);
var frmTng = $('#trainingPerson')[0];
var fdTng = new FormData(frmTng);
var fileTng = $('#Tngfile'+$Tngid).prop('files')[0];
 
var TrainingName=$('#TrainingName'+$Tngid).val();
var title=$('#title'+$Tngid).val();
var StartDate=$('#StartDate'+$Tngid).val();
var EndDate=$('#EndDate'+$Tngid).val();
var PlaceTrain=$('#PlaceTrain'+$Tngid).val();
var Duration=$('#Duration'+$Tngid).val();
var Evaluation=$('#Evaluation'+$Tngid).val();

	fdTng.append('TrainingName', TrainingName);
	fdTng.append('title', title);
	fdTng.append('StartDate', StartDate);
	fdTng.append('EndDate', EndDate);
	fdTng.append('PlaceTrain', PlaceTrain);
	fdTng.append('Duration', Duration);
	fdTng.append('Evaluation', Evaluation);
    fdTng.append('fileTng', fileTng);
	fdTng.append('Tngid', $(this).val());
	fdTng.append('editTng', 1);

      $.ajax({
        url:"update-Training.php",
        type:"POST",
        data:fdTng,
		processData: false,
		contentType: false,
		cache: false,
		async: false,
		
        success:function(rsTng)
		{
			if($.trim(rsTng)=='updTng')
			{
				$('#editTng'+$Tngid).modal('hide');
				$('body').removeClass('modal-open');
				$('.modal-backdrop').remove();
				show_Training();
			}
			else
			{
				alert(rsTng);
			}
     	 
         
		 }
		});



});


	
});

//Showing training Information
function show_Training(){
	$.ajax({
		url: 'trainingList.php',
		type: 'POST',
		async: false,
		data:{
			show: 2
		},
		success: function(rsTng)
			{
			// alert (rsp);
			 $('#trainingLst').html(rsTng);
			}
	});
}

//EDUCATION



$(document).ready(function() 
{
$(document).on('click', '.delEdu', function()
{

var Eduid=this.id;
var frmn = $('#education')[0];
var fdEdu = new FormData(frmn);
fdEdu.append("del", 8);
fdEdu.append("eduId", Eduid);

if(confirm('Are you sure to delete this record ?')) {
      $.ajax({
        url:"del_Edu.php",
        type:"POST",
		data:fdEdu, 
		processData: false,
		contentType: false,
		cache: false,
		async: false,
		
        success:function(rsEdu)
		{
			 //alert(rsChd);
			 if($.trim(rsEdu)=='del')
			 {
			   show_Education();
			 }
			 else
			 {
				 alert(rsEdu);
			 }
			  
		}
		});
 }
//}
});
/*
$(document).on('click', '#SaveExtraCurri', function()
{
	var frmExtraAdd = $('#extra_curri')[0];
	var fdextraAdd = new FormData(frmExtraAdd);
	 
	var extra_curri=$("#ExtraCurriculum").val();
	
	fdextraAdd.append('extra_curri', extra_curri);
	fdextraAdd.append("insExtra", 11);

	$.ajax({
        url:"insert_ExtraCurri.php",
        type:"POST",
		data:fdextraAdd, 
		processData: false,
		contentType: false,
		cache: false,
		async: false,
		
        success:function(rsExtra)
		{
			
			 if($.trim(rsExtra)=='saveEC')
			 {
			   $("#msgExtraCurri").show();
				setTimeout(function(){$("#msgExtraCurri").slideUp();},5000);
			 }
			 else
			 {
				 alert(rsExtra);
			 }
			  
		}
		});
 }
//}
});
*/
});





$(document).ready(function() {
$("#addEducation").click(function() {
        if ($('#education').valid()) {
            return true;
			
        } else {
            alert("There are something wrong in the Education form. Please verify all fields and try again.");
			return false;
        }
    });


 });
 
 
$(document).ready(function() {
show_Education();

$("#EducationTab").hide();
$("#newEduAdd").show();
$(document).on('click','#newEduAdd',function(){
	$("#newEduAdd").hide();
	$("#EducationTab").slideDown();
	$("#hideEdu").show();
});
$(document).on('click','#hideEdu',function(){
	$("#newEduAdd").slideDown();
	$("#EducationTab").slideUp();
	$("#hideEdu").hide();
});

$(document).on('click', '#addEducation', function()
{	
	
var frmEduAdd = $('#education')[0];
var fdEduAdd = new FormData(frmEduAdd);
 
var ExamName=$("#ExamName").val();
var GroupEdu=$("#grpName").val();
var BoardUniName=$("#BoardUniName").val();
var DurationEdu=$("#DurationEdu").val();
var InsName=$("#InsName").val();
var SessionEdu=$("#SessionEdu").val();
var ResultEdu=$("#ResultEdu").val();
var RollEdu=$("#RollEdu").val();

var Rank;
if(ExamName == 'SSC') Rank=1;
else if(ExamName == 'HSC') Rank=2;
else if(ExamName == 'Graduation') Rank=3;
else if(ExamName == 'Post-Graduation') Rank=4;
else if(ExamName == 'PhD') Rank=5;
else Rank=6;

if(ExamName == '-1'){
	alert('Please Select Examination Name');
	exit();
}
if(GroupEdu == '-1'){
	alert('Please Select Group/Subject');
	exit();
}

if(ExamName == 'other' || ExamName == 'Graduation' || ExamName == 'Post-Graduation'){
	ExamName = $("#txtexamName").val();
}
if(GroupEdu == 'Others'){
	GroupEdu = $("#txtGrpName").val();
}

var Edufile = $('.Edufile').prop('files')[0];

 fdEduAdd.append('ExamName', ExamName);
 fdEduAdd.append('GroupEdu', GroupEdu);
 fdEduAdd.append('BoardUniName', BoardUniName);
 fdEduAdd.append('DurationEdu', DurationEdu);
 fdEduAdd.append('InsName', InsName);
 fdEduAdd.append('SessionEdu', SessionEdu);
 fdEduAdd.append('ResultEdu', ResultEdu);
 fdEduAdd.append('RollEdu', RollEdu);
 fdEduAdd.append('Rank', Rank);
 
 fdEduAdd.append('Edufile', Edufile);
 fdEduAdd.append("insEdu", 11);
 
      $.ajax({
        url:"insert_Education.php",
        type:"POST",
        data:fdEduAdd,
		processData: false,
		contentType: false,
		cache: false,
		async: false,
		
        success:function(rsInEdu)
		{
			//alert(rsInEdu);
		    show_Education();
			
			if($.trim(rsInEdu)=='svEdu')
			{
				$("#EducationTab").slideUp();
				$("#newEduAdd").show();
		
				$("#txtexamName").val('');
				$("#txtexamName").hide();
				$("#txtGrpName").val('');
				$("#txtGrpName").hide();
				$("#ExamName").val('-1');
				$("#grpName").hide();
				$("#BoardUniName").val('');
				$("#InsName").val('');
				$("#DurationEdu").val('');
				$("#SessionEdu").val('');
				$("#ResultEdu").val('');
				$("#RollEdu").val('');
				
				$(".Edufile").val('');

				$("#msgEducation").show();
				setTimeout(function(){$("#msgEducation").slideUp();},5000);
				
			}
			else
			{
				alert(rsInEdu);
			}

		 }
		});

	
});

//update 	
$(document).on('click', '.updateEducation', function(){	
///alert('update');

$Eduid=$(this).val();

var frmEdu = $('#education')[0];
var fdEdu = new FormData(frmEdu);
var fileEdu = $('#Edufile'+$Eduid).prop('files')[0];
 
var ExamName=$('#ExamName'+$Eduid).val();
var GroupEdu=$('#GroupEdu'+$Eduid).val();
var BoardUniName=$('#BoardUniName'+$Eduid).val();
var InsName=$('#InsName'+$Eduid).val();
var DurationEdu=$('#DurationEdu'+$Eduid).val();
var SessionEdu=$('#SessionEdu'+$Eduid).val();
var ResultEdu=$('#ResultEdu'+$Eduid).val();
var RollEdu=$('#RollEdu'+$Eduid).val();


 
	fdEdu.append('ExamName', ExamName);
	fdEdu.append('GroupEdu', GroupEdu);
	fdEdu.append('BoardUniName', BoardUniName);
	fdEdu.append('InsName', InsName);
	fdEdu.append('DurationEdu', DurationEdu);
	fdEdu.append('SessionEdu', SessionEdu);
	fdEdu.append('ResultEdu', ResultEdu);
	fdEdu.append('RollEdu', RollEdu);
	
    fdEdu.append('fileEdu', fileEdu);
	fdEdu.append('Eduid', $(this).val());
	fdEdu.append('editEdu', 1);

      $.ajax({
        url:"update-Education.php",
        type:"POST",
        data:fdEdu,
		processData: false,
		contentType: false,
		cache: false,
		async: false,
		
        success:function(rsEdu)
		{
			if($.trim(rsEdu)=='updEdu')
			{
				$('#editEdu'+$Eduid).modal('hide');
				$('body').removeClass('modal-open');
				$('.modal-backdrop').remove();
				show_Education();
			}
			else
			{
				alert(rsEdu);
			}
     	 
         
		 }
		});



});


	
});
//Showing Education Information
function show_Education(){
	$.ajax({
		url: 'educationList.php',
		type: 'POST',
		async: false,
		data:{
			show: 2
		},
		success: function(rsEdu)
			{
			// alert (rsChd);
			 $('#educationLst').html(rsEdu);
			}
	});
}
	