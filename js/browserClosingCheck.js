
window.onbeforeunload  = function() {
	
 
  
  jQuery.ajax({url:"session.php", async:false})
   
   
};

/**/

/*
window.onbeforeunload=testfunc;

function testfunc()
{
window.location="session.php";
}

/**/
   
    
            
