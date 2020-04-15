  function deleteBlog(id) {
        var xmlhttp = new XMLHttpRequest();
        console.log('here');
        xmlhttp.open("GET", "?controller=blog&action=delete&id=" + id, true);
        console.log(id);
        xmlhttp.send();
        goBackToHome();
    }
    function goBackToHome() {
        window.refresh;
        window.location.href = "index.php?controller=blog&action=myblogs";
}
