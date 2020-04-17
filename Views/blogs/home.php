                <section class="intro-section">

                    <h1>"What a lovely surprise to finally discover how unlonely being alone can be". </h1>    
                    <h4 style align="left" >- Ellen Burstyn</h4>
                    <br>
                    <p>Living in the time of the Covid 19 outbreak is scary, strange and unprecedented. We're here to help you through it with a bit of advice, silliness and real life experiences.</p>

                </section>  

                <!-------------------------BLOG SECTION 1--------------------------->               
                <div class="view-all">
                    <ul>
                        <li>  <h3>Food and recipes</h3></li>
                        <li class="viewalllink"> <a href="?controller=blog&action=readAll&tag=food">View all <i class="fa fa-angle-right"></i></a></li> 
                    </ul>
                </div>      
  <div class="table-container" role="table" aria-label="">
      <div class="flex-table row" role="rowgroup">  
                    
                    
             
      <?php 
      foreach($blogs as $blog){     
      if ($blog->genre==='Food'){
      ?>
    
        
        <!-----card list------->
        <div class="flex-row" role="cell"><div class="card">
                        <a href='?controller=blog&action=read&id=<?php echo $blog->id;?>' class="whole-card-link">
                        <img  class="card-img-top" alt="..." src="/awesome/<?php echo $blog->img; ?>"/> 
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $blog->title;?></h4>
                            
                            <p class="card-text"><?php $string = strip_tags("$blog->text");
                                                 $excerpt = substr($string, 0, 100);
                                                 echo $result = substr($excerpt, 0, strrpos($excerpt, ' '));  
//                                              //gets text, takes first 100 characters, but cuts off at the end of a whole word
                                                        ?></p>
                            </p>
                            <a href='?controller=blog&action=read&id=<?php echo $blog->id;?>'>Read more</a>
                        </div></a>

                    </div></div>
      <?php   }} ?>    
</div>
  </div>
                
                
                            <!-------------------------BLOG SECTION 2--------------------------->               
                <div class="view-all">
                    <ul>
                        <li>  <h3>Fitness and exercise</h3></li>
                       <li class="viewalllink"> <a href="?controller=blog&action=readAll&tag=fitness">View all <i class="fa fa-angle-right"></i></a></li> 
                    </ul>
                </div>      
  <div class="table-container" role="table" aria-label="">
      <div class="flex-table row" role="rowgroup">  
                    
                    
             
      <?php 
      foreach($blogs as $blog){     
      if ($blog->genre==='Fitness'){
      ?>
    
        
           <!-----card list------->
        <div class="flex-row" role="cell"><div class="card">
                        <a href='?controller=blog&action=read&id=<?php echo $blog->id;?>' class="whole-card-link">
                        <img  class="card-img-top" alt="..." src="/awesome/<?php echo $blog->img; ?>"/> 
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $blog->title;?></h4>
                            <p class="card-text"><?php $string = strip_tags("$blog->text");
                                                 $excerpt = substr($string, 0, 100);
                                                 echo $result = substr($excerpt, 0, strrpos($excerpt, ' '));  
//                                              //gets text, takes first 100 characters, but cuts off at the end of a whole word
                                                        ?></p>
                            <a href='?controller=blog&action=read&id=<?php echo $blog->id;?>'>Read more</a>
                        </div></a>

                    </div></div>
      <?php   }} ?>    
</div>
  </div>
                            
                            
                             <!-------------------------BLOG SECTION 3--------------------------->               
                <div class="view-all">
                    <ul>
                        <li>  <h3>Family and kids</h3></li>
                        <li class="viewalllink"><a href="?controller=blog&action=readAll&tag=family"><p>View all <i class="fa fa-angle-right"></i></p></a></li> 
                    </ul>
                </div>      
  <div class="table-container" role="table" aria-label="">
      <div class="flex-table row" role="rowgroup">  
                    
                    
             
      <?php 
      foreach($blogs as $blog){     
      if ($blog->genre==='Family'){
      ?>
    
        
           <!-----card list------->
        <div class="flex-row" role="cell"><div class="card">
                        <a href='?controller=blog&action=read&id=<?php echo $blog->id;?>' class="whole-card-link">
                        <img  class="card-img-top" alt="..." src="/awesome/<?php echo $blog->img; ?>"/> 
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $blog->title;?></h4>
                            <p class="card-text"><?php $string = strip_tags("$blog->text");
                                                 $excerpt = substr($string, 0, 100);
                                                 echo $result = substr($excerpt, 0, strrpos($excerpt, ' '));  
//                                              //gets text, takes first 100 characters, but cuts off at the end of a whole word
                                                        ?></p>
                            <a href='?controller=blog&action=read&id=<?php echo $blog->id;?>'>Read more</a>
                        </div></a>

                    </div></div>
      <?php   }} ?>    
</div>
  </div>
                             
                             
                              <!-------------------------BLOG SECTION 4--------------------------->               
                <div class="view-all">
                    <ul>
                        <li>  <h3>Crafts and activities</h3></li>
                        <li class="viewalllink"> <a href="?controller=blog&action=readAll&tag=craft"><p>View all <i class="fa fa-angle-right"></i></p></a></li> 
                    </ul>
                </div>      
  <div class="table-container" role="table" aria-label="">
      <div class="flex-table row" role="rowgroup">  
                    
                    
             
      <?php 
      foreach($blogs as $blog){     
      if ($blog->genre==='Craft'){
      ?>
    
        
           <!-----card list------->
        <div class="flex-row" role="cell"><div class="card">
                        <a href='?controller=blog&action=read&id=<?php echo $blog->id;?>' class="whole-card-link">
                        <img  class="card-img-top" alt="..." src="/awesome/<?php echo $blog->img; ?>"/> 
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $blog->title;?></h4>
                            <p class="card-text"><?php $string = strip_tags("$blog->text");
                                                 $excerpt = substr($string, 0, 100);
                                                 echo $result = substr($excerpt, 0, strrpos($excerpt, ' '));  
//                                              //gets text, takes first 100 characters, but cuts off at the end of a whole word
                                                        ?></p>
                            <a href='?controller=blog&action=read&id=<?php echo $blog->id;?>'>Read more</a>
                        </div></a>

                    </div></div>
      <?php   }} ?>    
</div>
  </div>
              


               