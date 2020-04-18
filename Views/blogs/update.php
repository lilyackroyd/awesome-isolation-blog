<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-te/1.4.0/jquery-te.js"></script>
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"></script>
    <link type="text/css" rel="stylesheet" href="views/css/jqte-style.css"> 
</head>


<section class="intro-section">
    <h1>Edit "<?php echo$blog->title ?>"</h1>
    <p>Make changes and save as a draft or publish now.<br/></p>
</section>

<section class ="main-section-update" >

    <form method="post" action="" name="createblog" class="createblog" enctype="multipart/form-data">
        <div class="updateform" >

            <div class="pure-control-group">

                <!-------------Title input------------------>
                <label for="blogTitle">Title:</label>
                </br>
                <input class="shadow-sm p-3 mb-3 bg-white rounded form-update col-12" name="blogTitle" value="<?= $blog->title ?>" required>
                </br>
                </br>

                <!-------------Content input------------------>

                <label for="blogContent">Your content:</label>

                <textarea class="jqte-test"  rows="10" cols="100" name="blogContent"  required><?= $blog->text ?></textarea>
                </br>
                </br>

                <!----------video---------->

                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="videolink">Upload a YouTube video:</label>

                            </br>
                            <input class="shadow-sm p-3 mb-3 bg-white rounded form-update col-12" name="videolink" value="<?php
                            if ($blog->video != "") {
                                echo "www.youtube.com/watch?v=$blog->video";
                            }
                            ?>">
                            </br>
                            </br>
                        </div>

                        <!-----------Keywords----------------------------->
                        <div class="col">
                            <label for="keywords">Enter keywords you'd like your blog to be found for: </label> 

                            </br>
                            <input class="shadow-sm p-3  bg-white rounded form-update col-12" name="keywords" value="<?= $blog->keywords ?>">
                            <small id="keywordHelp" class="form-text text-muted">Keywords make it easier for visitors to find your blog.</small>
                        </div>
                    </div>
                </div>
                <br/></br>

                <!--------Image upload--------------------------->
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="blogimage">Upload a new image, or keep the image below:</label>
                            </br>
                            <input type="hidden" name="MAX_FILE_SIZE" value="10000000" required/>
                            <input type="file"  name="blogimage"  accept="image/*" >
                            </br>
                            </br>

                            <!--------Image preview--------------------------->
                            <?php
                            if (file_exists($blog->img)) {
                                echo "<div class='image-preview'><img id='preview' class='preview' src=" . $blog->img . " />"
                                . "<i style='z-index:2' id='cross'  class='image-preview fas fa-times-circle fa-2x'></i>";
                            }
                            ?>
                            <script>

                                $("#cross").click(function () {
                                    $("#preview").hide();
                                    $("#cross").hide();
                                });


                            </script>   

                            </br>
                            </br>
                            </br>
                        </div>
                        <!--------genre--------------------------->
                        <div class="col">
                            <label for="genretag">Pick a genre category:</label>
                            </br>
                            <input type='radio' id='genretag' name='genretag' value ='Food'<?php
                            if ($blog->genre === 'Food') {
                                echo "checked";
                            }
                            ?>>
                            <label for="food">Food</label></br>
                            <input type='radio' id ='genretag' name='genretag' value='Family' <?php
                            if ($blog->genre === 'Family') {
                                echo "checked";
                            }
                            ?>>
                            <label for="family">Family</label></br>
                            <input type='radio' id ='genretag' name='genretag' value='Craft'<?php
                            if ($blog->genre === 'Craft') {
                                echo "checked";
                            }
                            ?>>
                            <label for='craft'>Craft</label></br>
                            <input type='radio' id ='genretag' name='genretag' value='Fitness'<?php
                            if ($blog->genre === 'Fitness') {
                                echo "checked";
                            }
                            ?> >
                            <label for='fitness'>Fitness</label></br>
                            </br></br>

                            <script>
                                document.getElementById("genretag").required = true;
                            </script>
                        </div>
                    </div>
                </div>

                <!--------status--------------------------->
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="blogstatus">Save as draft or publish now:</label>
                            </br>
                            <input type='radio' id='status' name='blogstatus' value ='Draft'<?php
                            if ($blog->status === 'Draft') {
                                echo "checked";
                            }
                            ?>>
                            <label for="draft">Save as draft</label></br>
                            <input type='radio' id='status' name='blogstatus' value='Published'<?php
                            if ($blog->status === 'Published') {
                                echo "checked";
                            }
                            ?>>
                            <label for='published'>Publish</label></br>
                            <script>
                                document.getElementById("status").required = true;
                            </script>

                        </div>
                    </div> 
                </div>
                </br>
                </br>
                <!--------update--------------------------->
                <input class="btn btn-primary" type="submit" value="Update">      

            </div> 
        </div>
    </form>
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
