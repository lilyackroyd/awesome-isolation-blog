<div class="flex-container">
                <section class="intro-section"> 
            <h1>Search results for "<?php echo $searches?>"</h1>
            
                </section> 
            <section class="main-section">

                    
                         <div class="table-container-search" role="table" aria-label="">
      <div class="flex-table-search row" role="rowgroup"> 
            <?php
            if (count($results) > 0) {?>
          
            
  

     <?php foreach ($results as $r){ ?>
        <div class="flex-row-search" role="cell"><div class="card">
                        <a href='?controller=blog&action=read&id=<?php echo $r['blog_ID']; ?>' class="whole-card-link">
                        <img  class="card-img-top" alt="..." src="/awesome/<?php echo $r['blog_IMG'] ?>"/> 
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $r['blog_TITLE'] ?></h4>
                            <p class="card-text">excerpt text here</p>
                            <a href='?controller=blog&action=read&id=<?php echo $r['blog_ID']; ?>'>Read more</a>
                        </div></a>

                    </div></div>
 
            <?php }
            
      }else {
            echo "No results found, try again." . "<br>";
            }
           ?>
    
      </div> 
      
  
</div>
          
            
            

            </section>
            </div>
