<?php 
$bloggers = userController::bloggerlist();
$subscribers = userController::subscriberList();
?> <br>
 <?php if (count($bloggers) > 0) { ?>
 <?php foreach ($bloggers as $blogger) { ?> <br>
                  
<?php echo $blogger->firstname . ' '. $blogger->lastname; ?>
                    <?php
                }
                }
            else {
                echo '<p>There are currently no bloggers. </p>';
            }
            ?>
 
 <?php if (count($subscribers) > 0) { ?>
 <?php foreach ($subscribers as $subscriber) { ?> <br>
                  
<?php echo $subscriber->firstname . ' '. $subscriber->lastname; ?>
                    <?php
                }
                }
            else {
                echo '<p>There are currently no subscribers. </p>';
            }
            ?>

                <div class="table-container-intro-account" role="table" aria-label="">
                    <div class="flex-table-account row" role="rowgroup">  
                        
                        <div class="flex-row-intro-account" id="blogger-name" role="cell"> 
                        <h1>Hello, <?php $admin=userController::admin();echo $admin['user_FN'];?> !</h1>  
                        </div> 
                        
                        <div class="flex-row-intro-account" role="cell"> 
                        <img src="Views/<?php $admin=userController::admin();echo $admin['user_IMG'];?>" class="account-img"   alt="...">
                    
                        </div> 
                        
                  </div>
                </div>
