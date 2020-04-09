                <section class="intro-section">

                    <h1>A big sentence about the isolation blog...</h1>
                    <p>A subtitle line about the blog, what it does, why it's here, what you can do</p>

                </section>  

                <!-------------------------BLOG SECTION 1--------------------------->               
                <div class="view-all">
                    <ul>
                        <li>  <h3>Food subtitle</h3></li>
                        <li> <a href="?controller=blog&action=readAll&tag=food"><p>View all <i class="fa fa-angle-right"></i></p></a></li> 
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
                            <p class="card-text">excerpt text here</p>
                            <a href='?controller=blog&action=read&id=<?php echo $blog->id;?>'>Read more</a>
                        </div></a>

                    </div></div>
      <?php   }} ?>    
</div>
  </div>
                
                
                            <!-------------------------BLOG SECTION 2--------------------------->               
                <div class="view-all">
                    <ul>
                        <li>  <h3>Fitness subtitle</h3></li>
                        <li> <a href="?controller=blog&action=readAll&tag=fitness"><p>View all <i class="fa fa-angle-right"></i></p></a></li> 
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
                            <p class="card-text">excerpt text here</p>
                            <a href='?controller=blog&action=read&id=<?php echo $blog->id;?>'>Read more</a>
                        </div></a>

                    </div></div>
      <?php   }} ?>    
</div>
  </div>
                            
                            
                             <!-------------------------BLOG SECTION 3--------------------------->               
                <div class="view-all">
                    <ul>
                        <li>  <h3>Family subtitle</h3></li>
                        <li> <a href="?controller=blog&action=readAll&tag=family"><p>View all <i class="fa fa-angle-right"></i></p></a></li> 
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
                            <p class="card-text">excerpt text here</p>
                            <a href='?controller=blog&action=read&id=<?php echo $blog->id;?>'>Read more</a>
                        </div></a>

                    </div></div>
      <?php   }} ?>    
</div>
  </div>
                             
                             
                              <!-------------------------BLOG SECTION 4--------------------------->               
                <div class="view-all">
                    <ul>
                        <li>  <h3>Craft subtitle</h3></li>
                        <li> <a href="?controller=blog&action=readAll&tag=craft"><p>View all <i class="fa fa-angle-right"></i></p></a></li> 
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
                            <p class="card-text">excerpt text here</p>
                            <a href='?controller=blog&action=read&id=<?php echo $blog->id;?>'>Read more</a>
                        </div></a>

                    </div></div>
      <?php   }} ?>    
</div>
  </div>
              


               