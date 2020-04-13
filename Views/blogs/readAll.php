<section class="intro-section">

                    <h1>Welcome to the <?php $tag=$_GET['tag']; echo $tag?> section</h1>
                    <p>
                        <?php
                        if ($tag === 'food') {
                        echo "A one stop shop of helpful recipes and resources for store cupboard and self isolation cooking.";
                        }elseif ($tag === 'fitness') {
                        echo"Get tips on how to get moving during self-isolation, from at-home activities for kids to exercises for gym goers. ";
                        }elseif ($tag === 'craft') {
                        echo "Creative projects and new hobbies to try at home.";
                        }elseif ($tag === 'family') {
                        echo "Tips on maintaining good relations with children and partners from working from home, to keeping the family occupied.";
                        }?>
                    </p>

                </section>  
                <div class="view-all">
                    <ul>
                        <li>  <h3>
                            <?php
                        if ($tag==='food'){
                            echo "Get cooking...";
                        }elseif ($tag==='family'){
                            echo "Keep them occupied...";
                        }elseif ($tag==='fitness'){
                            echo "Keep fit...";
                         }elseif ($tag==='craft'){
                            echo "Get creative...";
                         }?>
                        </h3></li>

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
                            <p class="card-text"><?php $string = strip_tags("$blog->text");
                                                 $excerpt = substr($string, 0, 100);
                                                 echo $result = substr($excerpt, 0, strrpos($excerpt, ' '));  
//                                              //gets text, takes first 100 characters, but cuts off at the end of a whole word
                                                        ?></p>
                            <a href='?controller=blog&action=read&id=<?php echo $blog->id; ?>'>Read more</a>
                        </div></a>

                    </div></div>
 
      <?php }?>
    
      </div> 
      
  
</div>
                   
                    








                   

           
 
 

  
                   

