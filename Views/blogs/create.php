<section class="intro-section">
    <h1>Create a blog</h1>
    <p>Please fill in the below form to create a blog and add it to the website.<br/></p>
</section>
<section class ="main-section" align="center">
    
    <!--Form to add blog post-->
    <!--Need to add action in -->
    <form method="post" name="createblog" class="createblog">
        <div class="pure-form pure-form-aligned" >
        <div class="pure-control-group">
            
            <!--Title input-->
        <p>Title for your blog<br/></p>
        <input class="shadow-sm p-3 mb-5 bg-white rounded form" name="blogTitle" placeholder="Enter Title" required="">
        
        <!--Content input-->
        <div align="center">
        <p>Please type the content for your blog below.<br/></p>
        <textarea class="boxsizingBorder" name="blogContent" placeholder="Enter blog text" required="" rows="10" cols="150"></textarea>
        </br>
        <div>
        
        <!--Genre tag input using radio buttons-->
        <p>Please choose the relevant genre tag from the list:</br></p>
        <input type='radio' id='food' name='genretag' value ='food'>
        <label for="food">Food</label></br>
        <input type='radio' id ='family' name='genretag' value='family' >
        <label for="family">Family</label></br>
        <input type='radio' id ='craft' name='genretag' value='craft' >
        <label for='craft'>Craft</label></br>
        <input type='radio' id ='fitness' name='genretag' value='fitness' >
        <label for='fitness'>Craft</label></br>
        </br>
         
        <!--ADD KEYWORDS OPTION-->
        <p>Please enter any relevant keywords for your blog.</br> (Keywords make it easier for visitors to find your blog)</p>
        <input class="shadow-sm p-3 mb-5 bg-white rounded form" name="keywords" placeholder="Enter keywords">
            
        
        
        <!--Image upload, not fully ready yet-->
        <p>Please upload a relevant image to be displayed with your blog.</p>
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
        </br>
        
        <!--include youTube link-->
        <p>If you want to embed a YouTube video, please paste the embed link here.</br></p>
        <input class="shadow-sm p-3 mb-5 bg-white rounded form" name="videolink" placeholder="Link here">
        
        <!--Status to be either draft or published-->
        <p>Please choose the status of your blog</br></p>
        <input type='radio' id='draft' name='blogstatus' value ='draft'>
        <label for="draft">Draft</label></br>
        <input type='radio' id='published' name='blogstatus' value='published'>
        <label for='published'>Publish</label></br>
        </br>

       
 <p align="center">
   <input class="btn btn-light text-center" type="submit" value="Add blog post">
        
    </form>
        </div>
        </div>
         
    
</section>
