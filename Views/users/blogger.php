
<div class="table-container-intro-account" role="table" aria-label="">
    <div class="flex-table-account row" role="rowgroup">  

        <div class="flex-row-intro-account" id="blogger-name" role="cell"> 
            <h1>Hello, <?php $blogger = userController::blogger();
echo $blogger['user_FN']; ?> !</h1>  
        </div> 

        <div class="flex-row-intro-account" role="cell"> 
            <img src="Views/<?php $blogger = userController::blogger();
echo $blogger['user_IMG']; ?>" class="account-img"   alt="...">

        </div> 

    </div>
</div>


<div class="table-container-account" role="table" aria-label="">
    <div class="flex-table-account row" role="rowgroup">  

 
<div class="accountrow" role="cell">
                <div class="card" style="width: 22rem;">
                        <div class="account-your-details">
                            <h2 class="card-title">Your details</h2>
                            <p>First name: <?= $blogger['user_FN'] ?></p>
                            <p>Last name: <?= $blogger['user_LN'] ?></p>
                            <p>Email: <?= $blogger['user_EMAIL'] ?></p>
                            <p>Username: <?= $blogger['user_UN'] ?></p>
                            <button id="" onClick="document.location.href='?controller=user&action=update'" class="btn btn-primary"><i class="fas fa-edit"></i> Edit details</button>
                        </div>
                </div></div>
        

            <div class="accountrow" role="cell">
                <div class="card" style="width: 22rem;"><a class="acc-link" href="?controller=blog&action=create">
                        <div class="card-body-account">
                            <img class="acc-icon" src="Views/images/plus2.png"style="width: 70px;height: 70px;"/>
                            <h2 class="card-title">Create a blog</h2>
                        </div>
                    </a>
                </div></div>




            <div class="accountrow" role="cell">
                <div class="card" style="width: 22rem;"><a class="acc-link" href="?controller=blog&action=myblogs" >
                        <div class="card-body-account">
                            <img class="acc-icon" src="Views/images/edit.png"style="width: 70px;height: 70px;"/>   
                            <h2 class="card-title">My blogs</h2>
                        </div></a>
                </div>
            </div>








       

    </div>

   </div>

