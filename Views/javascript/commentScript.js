$(document).ready(function(){
	// When user clicks on submit comment to add comment under post
	$(document).on('click', '#submit_comment', function(e) {
		e.preventDefault();
                
		var comment_text = $('#comment_text').val();
               console.log(comment_text);
               
               var user_id = $('#user_id').val();
               
               
               var blog_id = $('#blog_id').val();
               console.log(blog_id);
               
		var url = $('#comment_form').attr('action');
               console.log(url);
               
		// Stop executing if not value is entered
		if (comment_text === "" ) return;
		$.ajax({
			url: url,
			type: "POST",
			data: { blog_id: blog_id,
                                user_id: user_id,
				comment_text: comment_text,
				comment_posted: 1
			},
			success: function(data){
                            console.log(data);
				var response = JSON.parse(data);
                                
				if (data === "error") {
					alert('There was an error adding comment. Please try again');
				} else {
					$('#comments-wrapper').prepend(response.comment)
					$('#comments_count').text(response.comments_count); 
					$('#comment_text').val('');
				}
			}
		});
	});
        
        
        
        
	// When user clicks on submit reply to add reply under comment
	$(document).on('click', '.reply-btn', function(e){
		e.preventDefault();
		// Get the comment id from the reply button's data-id attribute
		var comment_id = $(this).data('id');
                
                
                
                
                
		// show/hide the appropriate reply form (from the reply-btn (this), go to the parent element (comment-details)
		// and then its siblings which is a form element with id comment_reply_form_ + comment_id)
		$(this).parent().siblings('form#comment_reply_form_' + comment_id).toggle(500);
		
            
            $(document).on('click', '.submit-reply', function(e){
                console.log('here'); 
			e.preventDefault();
			// elements
                        
			var reply_textarea = $(this).siblings('textarea'); // reply textarea element
                        console.log(reply_textarea);
                        
                        var user_id = $('#user_id_reply').val();
                        console.log(user_id);
                        
              
                        var blog_id = $('#blog_id_reply').val();
                        console.log(blog_id);
                        
			var reply_text = $(this).siblings('textarea').val();
                         console.log(reply_text);
                         
			var url = $(this).parent().attr('action');
                        
			$.ajax({
				url: url,
				type: "POST",
				data: { 
                                        user_id: user_id,
                                        blog_id: blog_id,
					comment_id: comment_id,
					reply_text: reply_text,
					reply_posted: 1
				},
				success: function(data){
					if (data === "error") {
						alert('There was an error adding reply. Please try again');
					} else {
						$('.replies_wrapper_' + comment_id).append(data);
						reply_textarea.val('');
					}
				}
			});
		});
                
                
                
                
                
                
                
	});
});
