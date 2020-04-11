<section class="intro-section">
    <h1>Edit blog</h1>
    <p>Please fill in the below form to create a blog and add it to the website.<br/></p>
</section>
<section class ="main-section" align="center">

    <form method="post" action="" name="createblog" class="createblog">
        <div class="pure-form pure-form-aligned" >
        <div class="pure-control-group">
            
            <!--Title input-->
        <p>Title<br/></p>
        <input class="shadow-sm p-3 mb-5 bg-white rounded form" name="blogTitle" placeholder="<?=$blog->title?>" required="">
        
        
        
        
        <!--Content input-->
        <div align="center">
        <p>Your content<br/></p>
        <textarea class="boxsizingBorder" name="blogContent" placeholder="<?=$blog->text?>"required="" rows="10" cols="150"></textarea>
        </br>
        <div>
        
            
            
            
            
        <!--Genre tag input using radio buttons-->
       
        <p>Please choose the relevant genre tag from the list:</br></p>
        <input type='radio' id='food' name='genretag' value ='food'<?php if ($blog->genre==='Food'){echo "checked";}?>>
        <label for="food">Food</label></br>
        <input type='radio' id ='family' name='genretag' value='family' <?php if ($blog->genre==='Family'){echo "checked";}?>>
        <label for="family">Family</label></br>
        <input type='radio' id ='craft' name='genretag' value='craft'<?php if ($blog->genre==='Craft'){echo "checked";}?>>
        <label for='craft'>Craft</label></br>
        <input type='radio' id ='fitness' name='genretag' value='fitness'<?php if ($blog->genre==='Fitness'){echo "checked";}?> >
        <label for='fitness'>Craft</label></br>
        </br>
         
        
        
        
        <!--Image upload, not fully ready yet-->
        <p>Image</p>
        <input type="hidden" name="MAX_FILE_SIZE" value="10000000"/>
        <input type="file" name="blogimage"/>
        </br>
<!--        <?php
//        const InputKey = 'blogimage';
////        const AllowedTypes = ['png/jpeg'];
////        if (!in_array($_FILES[InputKey]['type'], AllowedTypes)) { //if file type is not correct
////        die("Handle File Type Not Allowed");
//
////        $file ='views/images/' . $_FILES[InputKey]['name'];
//////        if(file_exists($file)){
//////            $img="<img src='$file' width='150'/>";
//////            echo $img;
//////        }
        ?> -->
        </br>
        <?php echo "<img src=".$blog->img." height='20%' width='20%'/>";?>
        
       
        <p>Video.</br></p>
        <input class="shadow-sm p-3 mb-5 bg-white rounded form" name="videolink" value="<?php if($blog->video !=""){echo "www.youtube.com/watch?v=$blog->video";}?>">
        
   
        
        <p>Save as draft or publish</br></p>
        <input type='radio' id='draft' name='blogstatus' value ='draft'>
        <label for="draft">Save as draft</label></br>
        <input type='radio' id='published' name='blogstatus' value='published'>
        <label for='published'>Publish</label></br>
        </br>

       
 <p align="center">
   <input class="btn btn-light text-center" type="submit" value="Update">
        
    </form>
        </div>
        </div>
         
    
</section>
