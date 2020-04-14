<?php 
$bloggers = userController::bloggerlist();
$subscribers = userController::subscriberList();
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
         <h2>List of Bloggers</h2>
             <table class="table">
                                  <thead class="thead-dark">
                                    <tr>
                                      <th scope="col">Image</th>
                                      <th scope="col">First name</th>
                                      <th scope="col">Last name</th>
                                      <th scope="col">Delete?</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                       <?php foreach ($bloggers as $blogger) { ?> 
                                    <tr>
                                        <th scope="row"><img src="<?php echo $blogger->img; ?>" width="75" height="75" style ="border-radius: 50%" alt="no profile pic"></th>
                                      <td><?php echo $blogger->firstname; ?></td>
                                      <td><?php echo $blogger->lastname; ?></td>
                                      <td><?php echo $blogger->id; ?></td>
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
                                      <!--<th scope="col">Image</th>-->
                                      <th scope="col">First name</th>
                                      <th scope="col">Last name</th>
                                      <th scope="col">Delete?</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                       <?php foreach ($subscribers as $subscriber) { ?> 
                                    <tr>
                                      <!--<th scope="row"><?php echo $subscriber->img; ?></th>-->
                                      <td><?php echo $subscriber->firstname; ?></td>
                                      <td><?php echo $subscriber->lastname; ?></td>
                                      <td><?php echo $subscriber->id; ?></td>
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
                    
 
 
