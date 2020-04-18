<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-te/1.4.0/jquery-te.js"></script>
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"></script>
    <link type="text/css" rel="stylesheet" href="views/css/jqte-style.css"> 
</head>



<section class="intro-section">
    <h1>Create a blog</h1>
    <p>Please fill in the below form to create a blog and add it to the website.<br/></p>
</section>
<section class ="main-section-create">

    <!--Form to add blog post-->
    <form method="post" class="createblog" enctype="multipart/form-data">
        <div class="pure-form pure-form-aligned" >
            <div class="pure-control-group">

                <!--Title input-->
                <p>Title for your blog:<br/></p>
                <input class="shadow-sm p-3 mb-5 bg-white rounded form" name="blogTitle" placeholder="Enter Title" required="">

                <!--Content input-->
                <div align="center">
                    <p>Please type the content for your blog below.<br/></p>
                    <textarea align="left" class="jqte-test"  rows="10" cols="150" name="blogContent"  required placeholder="Enter blog text"></textarea>
            
<!--<textarea class="boxsizingBorder" name="blogContent" placeholder="Enter blog text" required="" rows="10" cols="150"></textarea>-->
                    </br>
                    <div>

                        <!--Genre tag input using radio buttons-->
                        <p>Please choose the relevant genre tag from the list:</br></p>
                        <input type='radio' id='food' name='genretag' value ='Food'>
                        <label for="food">Food</label></br>
                        <input type='radio' id ='family' name='genretag' value='Family'>
                        <label for="family">Family</label></br>
                        <input type='radio' id ='craft' name='genretag' value='Craft' >
                        <label for='craft'>Craft</label></br>
                        <input type='radio' id ='fitness' name='genretag'value='Fitness'>
                        <label for='fitness'>Fitness</label></br>
                        </br>

                        <!--Keywords-->
                        <p>Please enter any relevant keywords for your blog.</br> <i>(Keywords make it easier for visitors to find your blog)</i></p>
                        <input class="shadow-sm p-3 mb-5 bg-white rounded form" name="keywords" placeholder="Enter keywords">

                        <!--Image upload, not fully ready yet-->
                        <p>Please upload a relevant image to be displayed with your blog.</p>
                        <input type="hidden" name="MAX_FILE_SIZE" value="10000000" required/>
                        <input type="file" name="blogimage" >
                        </br>
                        </br>

                        <p>Please give a short caption for your image.</p>
                        <input class="shadow-sm p-3 mb-5 bg-white rounded form" name = "caption" placeholder="Enter caption">
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



                <script>
                    $('.jqte-test').jqte();

                    // settings of status
                    var jqteStatus = true;
                    $(".status").click(function ()
                    {
                        jqteStatus = jqteStatus ? false : true;
                        $('.jqte-test').jqte({"status": jqteStatus});
                    });
                </script>
