
    //js to animate like icon
            var likeBtn = document.querySelector('.ico');

            likeBtn.addEventListener('click', function () {
                likeBtn.classList.toggle('liked');
            });

            document.addEventListener('keydown', function (key) {
                if (key.key === 'l' || key.key === 'L') {
                    likeBtn.classList.toggle('liked');
                }
            });
      
   


    //js to send like data
	$(document).ready(function(){
		// when the user clicks on like
		$('.ico').on('click', function(){
                    
                    console.log('here');
                 
                var icon = document.getElementById('ico');
                console.log(icon);
                var blogid = icon.getAttribute('data-id');    
                console.log(blogid); 
                var userid = icon.getAttribute('data-user');    
                console.log(userid); 
                    
//			$.ajax({
//				url: 'index.php',
//				type: 'post',
//				data: {
//					'liked': 1,
//					'blogid': blogid,
//                                        'userid': userid
//				},
//				success: function(response){
//					$post.parent().find('span.likes_count').text(response + " likes");
//					$post.addClass('hide');
//					$post.siblings().removeClass('hide');
//				}
//			});
//		});

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
		});
	});


