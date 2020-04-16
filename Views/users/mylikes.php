<div class="flex-container">
    <section class="intro-section"> 
        <h1>You have <?php echo count($blogs) ?> liked blog(s).</h1><p>     
            

    </section> 



    <div class="table-container" role="table" aria-label="">
        <div class="flex-table row" role="rowgroup"> 
            <?php if (count($blogs) > 0) { ?>




                <?php foreach ($blogs as $blog) { ?>
                    <div class="flex-row-search" role="cell"><div class="card">
                            <a href='?controller=blog&action=read&id=<?php echo $blog->id; ?>' class="whole-card-link">
                                <img  class="card-img-top" alt="..." src="/awesome/<?php echo $blog->img ?>"/> 
                                <div class="card-body">
                                    <h4 class="card-title"><?php echo $blog->title ?></h4>
                                    <p class="card-text"><?php $string = strip_tags("$blog->text");
                                                 $excerpt = substr($string, 0, 100);
                                                 echo $result = substr($excerpt, 0, strrpos($excerpt, ' '));  
//                                              //gets text, takes first 100 characters, but cuts off at the end of a whole word
                                                        ?></p>
                                    <a  href='?controller=blog&action=read&id=<?php echo $blog->id; ?>'>Edit / Delete</a>
                                </div></a>

                        </div></div>

                    <?php
                }
            } else {
                echo '<p>You currently have no liked blogs.</p>';
            }
            ?>

        </div> 


    </div>





</div>
