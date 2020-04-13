
<section class="intro-section">
    <h1>Edit your details</h1>
    <p>Make changes and save as a draft or publish now.<br/></p>
</section>



<section class ="main-section-update" >

    


    <form method="post" action="" name="update details" class="">

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

