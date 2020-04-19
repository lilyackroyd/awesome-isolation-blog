  function deleteBlog(id) {
      
        const deletebtn = document.querySelector('#editdelete-delete');
        var usertype = deletebtn.dataset.usertype;
        
        var xmlhttp = new XMLHttpRequest();
        console.log('here');
        xmlhttp.open("GET", "?controller=blog&action=delete&id=" + id, true);
        console.log(id);
        xmlhttp.send();
        
        if (usertype==="Admin"){
        goBackToAdmin();
        }
        if(usertype==="Blogger"){
            goBackToBlogger();
        }
    }
    
    
    
    
function goBackToBlogger() {
        window.refresh;
        window.location.href = "index.php?controller=blog&action=myblogs";
}


function goBackToAdmin() {
        window.refresh;
        window.location.href = "index.php?controller=user&action=admin";
}