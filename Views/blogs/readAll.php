<section class="intro-section">

                    <h1>Welcome to the <?php echo $_GET['tag']?> section</h1>
                    <p>a subheading</p>

                </section>  
                <div class="view-all">
                    <ul>
                        <li>  <h3> a subtitle</h3></li>

                    </ul>
                </div>
               <div class="table-container" role="table" aria-label="">
      <div class="flex-table row" role="rowgroup">  
     
          
          

      
      
  
  
  
      <?php foreach ($blogs as $blog){ ?>
    
        
        <!-----one------->
        <div class="flex-row" role="cell"><div class="card">
                        <a href='?controller=blog&action=read&id=<?php echo $blog->id; ?>' class="whole-card-link">
                        <img  class="card-img-top" alt="..." src="/awesome/<?php echo $blog->img ?>"/> 
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $blog->title ?></h4>
                            <p class="card-text"><?php $string = $blog->text;
                                                echo $excerpt = substr($string, 0, 100)?></p>
                            <a href='?controller=blog&action=read&id=<?php echo $blog->id; ?>'>Read more</a>
                        </div></a>

                    </div></div>
 
      <?php }?>
    
      </div> 
      
  
</div>
                   
                    








                   

           
 
 

  
                   

