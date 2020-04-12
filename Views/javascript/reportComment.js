function reportComment(commid,blogid) {
  var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "?controller=comments&action=report&commid=" + commid, true);
        console.log(commid);
        xmlhttp.send();
        console.log('here');
        
        goBackToBlog(blogid);
    }
    function goBackToBlog(blogid) {
        window.refresh;
        window.location.href = "index.php?controller=blog&action=read&id=" + blogid,true;
}

  