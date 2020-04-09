
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
