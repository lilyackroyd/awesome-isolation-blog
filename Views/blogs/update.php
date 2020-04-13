<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-te/1.4.0/jquery-te.js"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"></script>
<link type="text/css" rel="stylesheet" href="views/css/jqte-style.css"> 
</head>




<section class="intro-section">
    <h1>Edit "<?php echo$blog->title?>"</h1>
    <p>Make changes and save as a draft or publish now.<br/></p>
</section>

<section class ="main-section-update" >

    <form method="post" action="" name="createblog" class="createblog">
        <div class="updateform" >
        <div class="pure-control-group">
            
            <!--Title input-->
        <p>Title<br/></p>
        <input class="shadow-sm p-3 mb-5 bg-white rounded form-update" name="blogTitle" value="<?=$blog->title?>" required>
        
        
        
        
        <!--Content input-->
        <div >
        <p>Your content<br/></p>
        
        <textarea class="jqte-test"  rows="10" cols="100" name="blogContent"  required><?= $blog->text?></textarea>
       
        
        
            
            
            
            
        <!--Genre tag input using radio buttons-->
       
        <p>Please choose the relevant genre tag from the list:</br></p>
        <input type='radio' id='genretag' name='genretag' value ='Food'<?php if ($blog->genre==='Food'){echo "checked";}?>>
        <label for="food">Food</label></br>
        <input type='radio' id ='genretag' name='genretag' value='Family' <?php if ($blog->genre==='Family'){echo "checked";}?>>
        <label for="family">Family</label></br>
        <input type='radio' id ='genretag' name='genretag' value='Craft'<?php if ($blog->genre==='Craft'){echo "checked";}?>>
        <label for='craft'>Craft</label></br>
        <input type='radio' id ='genretag' name='genretag' value='Fitness'<?php if ($blog->genre==='Fitness'){echo "checked";}?> >
        <label for='fitness'>Fitness</label></br>
        </br>
         
        <script>
        document.getElementById("genretag").required = true;
        </script>

        <!--Keywords-->
        <p>Please enter any relevant keywords for your blog.</br> <i>(Keywords make it easier for visitors to find your blog)</i></p>
        <input class="shadow-sm p-3 mb-5 bg-white rounded form-update" name="keywords" value="<?= $blog->img?>">
        
        <!--Image upload, not fully ready yet-->
        <p>Image</p>
        <input type="hidden" name="MAX_FILE_SIZE" value="10000000" required/>
        <input type="file" name="blogimage" value=""/>
        </br>
<!--        <?php
//        const InputKey = 'blogimage';
////        const AllowedTypes = ['png/jpeg'];
////        if (!in_array($_FILES[InputKey]['type'], AllowedTypes)) { //if file type is not correct
////        die("Handle File Type Not Allowed");
//
        ?> -->
       

        <?php 
        if(file_exists($blog->img)){
        echo "<img src=".$blog->img." height='20%' width='20%'/>";}
        ?>
        
       
        <p>Video</p>
        <input class="shadow-sm p-3 mb-5 bg-white rounded form-update" name="videolink" value="<?php if($blog->video !=""){echo "www.youtube.com/watch?v=$blog->video";}?>">
        
   
        
        <p>Save as draft or publish</br></p>
        <input type='radio' id='status' name='blogstatus' value ='Save draft'<?php if ($blog->status==='Draft'){echo "checked";}?>>
        <label for="draft">Save as draft</label></br>
        <input type='radio' id='status' name='blogstatus' value='Publish'<?php if ($blog->status==='Published'){echo "checked";}?>>
        <label for='published'>Publish</label></br>
        <script>
        document.getElementById("status").required = true;
        </script>

       
 <p align="center">
 <input class="btn btn-light " type="submit" value="Update">      
        </div> 
        </div> 
   </div>
    </form>
    
     
         
    
</section>




 



 

<script>
	$('.jqte-test').jqte();
	
	// settings of status
	var jqteStatus = true;
	$(".status").click(function()
	{
		jqteStatus = jqteStatus ? false : true;
		$('.jqte-test').jqte({"status" : jqteStatus});
	});
        </script>
