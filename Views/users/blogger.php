
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

<div class="intro-section">               
    <h2>Your details</h2>
</div>

<div class="main-section">  
    <div class="blogger-table">
        <table role="table" class="table table-striped table-dark">
            <thead role="rowgroup">
                <tr role="row">
                    <th role="columnheader"><h6>First Name</h6></th>
                    <th role="columnheader"><h6>Last Name</h6></th>
                    <th role="columnheader"><h6>Email</h6></th>
                    <th role="columnheader"><h6>Username</h6></th>
                    <th role="columnheader"><h6>Password</h6></th>
                    <th role="columnheader"></th>


                </tr>
            </thead>
            <tbody role="rowgroup">
                <tr role="row">
                    <td role="cell"><p><?= $blogger['user_FN'] ?></p></td>
                    <td role="cell"><p><?= $blogger['user_LN'] ?></p></td>
                    <td role="cell"><p><?= $blogger['user_EMAIL'] ?></p></td>
                    <td role="cell"><p><?= $blogger['user_UN'] ?></p></td>
                    <td role="cell"><p><?= $blogger['user_PWD'] ?></p></td>
                    <td role="cell"><a href="memUpdate.php?user_ID=<?= $blogger['user_ID'] ?>" class="edit"><i class="fas fa-pen fa-xs"></i></a></td>
                </tr>

            </tbody>
        </table>

    </div>
</div>





<div class="table-container-account" role="table" aria-label="">
    <div class="flex-table-account row" role="rowgroup">  

 


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

