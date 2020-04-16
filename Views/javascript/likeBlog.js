
//js to animate like icon
//var likeBtn = document.querySelector('.ico');


//                likeBtn.addEventListener('click', function () { 
//                likeBtn.classList.toggle('liked');
//            });




//$('.ico').click(function(e) {
//  e.preventDefault();
//  $('.ico').attr('data-status', 'liked');
//    likeBtn.classList.toggle('liked');
//});



//document.addEventListener('keydown', function (key) {
//    if (key.key === 'l' || key.key === 'L') {
//        likeBtn.classList.toggle('liked');
//    }
//});




//js to send like data
$(document).ready(function () {

    var likeBtn = document.querySelector('.ico');







    // when the user clicks on like
   // $('.ico').on('click', function () {
      $('#ico[data-status="unliked"]').on('click', function () {
        
        $('#ico').attr('data-status', 'liked');
        likeBtn.classList.toggle('liked');
        console.log('here');

        var icon = document.getElementById('ico');
        console.log(icon);
        var blogid = icon.getAttribute('data-id');
        console.log(blogid);
        var userid = icon.getAttribute('data-user');
        console.log(userid);

        var xmlhttp = new XMLHttpRequest();

        xmlhttp.open("GET", "?controller=blog&action=likes&blogid=" + blogid + "&userid=" + userid, true);

        xmlhttp.responseType = 'text';

        xmlhttp.onload = function () {
            if (xmlhttp.readyState === xmlhttp.DONE) {
                if (xmlhttp.status === 200) {
//            console.log(xmlhttp.response);
//            console.log(xmlhttp.responseText);
                }
            }
        };
        xmlhttp.send(null);

    });


 });






//$(document).ready(function () {

    // when the user clicks on an already liked icon - i.e. unlikes
    //$('.ico liked').on('click', function(){

 $('#ico[data-status="liked"]').on('click', function () {

$('.ico liked').attr('data-status', 'unliked');
        console.log('unlike');

        var icon = document.getElementById('ico');
        console.log(icon);
        var blogid = icon.getAttribute('data-id');
        console.log(blogid);
        var userid = icon.getAttribute('data-user');
        console.log(userid);

        var xmlhttp = new XMLHttpRequest();

        xmlhttp.open("GET", "?controller=blog&action=unlikes&blogid=" + blogid + "&userid=" + userid, true);

        xmlhttp.responseType = 'text';

        xmlhttp.onload = function () {
            if (xmlhttp.readyState === xmlhttp.DONE) {
                if (xmlhttp.status === 200) {
//            console.log(xmlhttp.response);
//            console.log(xmlhttp.responseText);
                }
            }
        };

        xmlhttp.send(null);

    });









//});


















//			$.ajax({
//				url: "?controller=blog&action=likes&blogid=" + blogid + "&userid=" + userid,
//				type: 'GET',
////				data: {
////					  'liked': 1,
////					'blogid': blogid,
////                                        'userid': userid
////				},
//				success: function(response){
//                                    console.log(response); 
////					$post.parent().find('span.likes_count').text(response + " likes");
////					$post.addClass('hide');
////					$post.siblings().removeClass('hide');
//				}
//			        });
//		});});




// when the user clicks on unlike
//		$('.unlike').on('click', function(){
//			var postid = $(this).data('id');
//		    $post = $(this);
//
//			$.ajax({
//				url: 'index.php',
//				type: 'post',
//				data: {
//					'unliked': 1,
//					'postid': postid
//				},
//				success: function(response){
//					$post.parent().find('span.likes_count').text(response + " likes");
//					$post.addClass('hide');
//					$post.siblings().removeClass('hide');
//				}
//			});
//		});



