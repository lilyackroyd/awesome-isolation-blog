  function deleteBlog(id) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "?controller=blog&action=delete&id=" + id, true);
        xmlhttp.send();
        goBackToHome();
    }
    function goBackToHome() {
        window.refresh;
        window.location.href = "index.php?controller=blog&action=myblogs";
}
