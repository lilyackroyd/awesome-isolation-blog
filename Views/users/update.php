
<section class="intro-section">
    <h1>Edit your details</h1>
    <p>Make changes and save as a draft or publish now.<br/></p>
</section>



<section class ="main-section-update-user" >
    <form method="post" action="" name="update details" class="" enctype="multipart/form-data">



        <div class="update-img-container" role="cell"> 
            <img src="<?php echo $blogger['user_IMG']; ?>" class="update-img"   alt="...">
        </div> 
        
       <input type="hidden" name="MAX_FILE_SIZE" value="10000000" required/>
       <input type="file"  name="userimage-update"  accept="image/*" >

        
        
        <div class="form-group">
            
             
            <div class="row">
                <div class="col">
                    First Name:<input  type="text" class="form-control"  name="firstName" id="firstName" value="<?= $blogger['user_FN'] ?>" required autofocus="true" />              
                </div> 
                <div class="col">
                    Last Name:<input  type="text" class="form-control"  name="lastName" id="lastName" value="<?= $blogger['user_LN'] ?>" required autofocus="true" />        
                </div>
            </div></div>
        <br/>


        
        <div class="form-group">
            <div class="row">
                <div class="col">
                    Username:<input  type="text" class="form-control"  name="userName" id="userName" value="<?= $blogger['user_UN'] ?>" required autofocus="true" />          
                </div> 
                <div class="col">
                    Email:<input  type="text" class="form-control" name="email" id="email" value="<?= $blogger['user_EMAIL'] ?>" required autofocus="true" />        
                </div>
            </div></div>
        <br/>
        
        

        <input class="btn btn-primary " type="submit" name="update" value="Update details">  


    </form>         

</section>