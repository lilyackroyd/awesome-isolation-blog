<div class="flex-container">
    <section class="intro-section"> 
        <h1>You have <?php echo count($blogs) ?> blogs.</h1><p>     
            <?php
            $count = [];
            foreach ($blogs as $blog) {
                if ($blog['blog_STATUS'] === 'Published') {
                    $count[] = count($blog);
                }
            }
            echo count($count)
            ?>
            published, 
        <?php
            $count = [];
            foreach ($blogs as $blog) {
                if ($blog['blog_STATUS'] === 'Draft') {
                    $count[] = count($blog);
                }
            }
            echo count($count)
            ?> still in draft.</p>

    </section> 



    <div class="table-container" role="table" aria-label="">
        <div class="flex-table row" role="rowgroup"> 
<?php if (count($blogs) > 0) { ?>




    <?php foreach ($blogs as $blog) { ?>
                    <div class="flex-row-search" role="cell"><div class="card">
                            <a href='?controller=blog&action=read&id=<?php echo $blog['blog_ID']; ?>' class="whole-card-link">
                                <img  class="card-img-top" alt="..." src="/awesome/<?php echo $blog['blog_IMG'] ?>"/> 
                                <div class="card-body">
                                    <h4 class="card-title"><?php echo $blog['blog_TITLE'] ?></h4>
                                    <p class="card-text"><?php $string = $blog['blog_TXT'];
                                echo $excerpt = substr($string, 0, 100)
                                ?></p>
                                    <a href='?controller=blog&action=read&id=<?php echo $blog['blog_ID']; ?>'>Edit / Delete</a>
                                </div></a>

                        </div></div>

                <?php
                }
            } else {
                echo '<p>You currently have no draft or published blogs. </p><a href=""> Create a blog </a><p> now.</p>';
            }
            ?>

        </div> 


    </div>





</div>
