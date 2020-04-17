
function reportComment(commid,blogid) {
     
     $("#report-"+commid).text("reported ✓" );
     $('#report-'+commid).attr('disabled', 'disabled');
    
  var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "?controller=comments&action=report&commid=" + commid, true);
        console.log(commid);
        xmlhttp.send();
        console.log('here');
        

    }
    
   


  