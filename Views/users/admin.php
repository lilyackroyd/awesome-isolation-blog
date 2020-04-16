<?php 
$bloggers = userController::bloggerlist();
$subscribers = userController::subscriberList();
$flagged= CommentsController::getflaggedcomments();
?> <br>
 

                <div class="table-container-intro-account" role="table" aria-label="">
                    <div class="flex-table-account row" role="rowgroup">  
                        
                        <div class="flex-row-intro-account" id="blogger-name" role="cell"> 
                        <h1>Hello, <?php $admin=userController::admin();echo $admin['user_FN'];?> !</h1>  
                        </div> 
                        
                        <div class="flex-row-intro-account" role="cell"> 
                        <img src="<?php $admin=userController::admin();echo $admin['user_IMG'];?>" class="account-img"   alt="...">
                    
                        </div> 
                        
                  </div>
                    
                   
                    
                </div>

 
 <div class="container">
  <div class="row">
      <?php if (count($bloggers) > 0) { ?>
         <h2>List of Bloggers by total likes</h2>
             <table class="table">
                                  <thead class="thead-dark">
                                    <tr>
                                      <th scope="col">Image</th>
                                      <th scope="col">First name</th>
                                      <th scope="col">Last name</th>
                                       <th scope="col">Email</th>
                                       <th scope="col">Total Likes</th>
                                     
                                    </tr>
                                  </thead>
                                  <tbody>
                                       <?php foreach ($bloggers as $blogger) { ?> 
                                    <tr>
                                        <th scope="row"><img src="<?php 
                                        if (file_exists($blogger->img)) {
                                        echo $blogger->img; }
                                        else {
                                        echo "Views/images/avatar.png";
                                        }
                                        
                                        
                                        
                                        ?>" width="75" height="75" style ="border-radius: 50%" alt="no profile pic"></th>
                                      <td><?php echo $blogger->firstname; ?></td>
                                      <td><?php echo $blogger->lastname; ?></td>
                                      <td><?php echo $blogger->email; ?></td>
                                      <td><?php echo $blogger->totallikes; ?></td>
                                      
                                    </tr>
                                    
                                
                   <?php
                }
                
                ?> 
                       </tbody>
                                </table>   
                        
                <?php }
            else {
                echo '<p>There are currently no bloggers. </p>';
            }
            ?> 
                                

                     </div><!-- end of row -->
                     
                     
                     
 <div class="row">
      <?php if (count($subscribers) > 0) { ?>
         <h2>List of Subscribers</h2>
             <table class="table">
                                  <thead class="thead-dark">
                                    <tr>
                                     
                                      <th scope="col">Username</th>
                                      <th scope="col">Email</th>
                                      
                                    </tr>
                                  </thead>
                                  <tbody>
                                       <?php foreach ($subscribers as $subscriber) { ?> 
                                    <tr>
                                     
                                      <td><?php echo $subscriber->username; ?></td>
                                      <td><?php echo $subscriber->email; ?></td>
                                     
                                    </tr>
                                    
                                
                   <?php
                }
                
                ?> 
                       </tbody>
                                </table>   
                        
                <?php }
            else {
                echo '<p>There are currently no bloggers. </p>';
            }
            ?> 
                                

                     </div><!-- end of row -->
                     
    <div class="row">
      <?php if (count($flagged) > 0) { ?>
         <h2>List of flagged comments</h2>
             <table class="table">
                                  <thead class="thead-dark">
                                    <tr>
                                      <th scope="col">Comment</th>
                                      <th scope="col">User</th>
                                      <th scope="col">View Blog</th>
                                      <th scope="col">Remove comment?</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                       <?php foreach ($flagged as $comment) { ?> 
                                    <tr>
                                      <th scope="row"><?php echo $comment->text; ?></th>
                                      <td><?php echo $comment->username; ?></td>
                                      <td><a class="btn btn-warning" href="/awesome/index.php?controller=blog&action=read&id=<?php echo $comment->blogid; ?>" role="button">View</a></td>
                                      <td><a class="btn btn-danger" href="/awesome/index.php?controller=comments&action=removeflaggedcomment&commid=<?php echo $comment->commid; ?>" role="button">Remove</a></td>
                                    </tr>
                                    
                                
                   <?php
                }
                
                ?> 
                       </tbody>
                                </table>   
                        
                <?php }
            else {
                echo '<p>There are currently no bloggers. </p>';
            }
            ?> 
                                

                     </div><!-- end of row -->                 
                     
                     
     </div><!-- end of container -->
                    
 
 
