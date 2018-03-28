<?php if( $slider = get_field('slide', $postid) ): ;?>

    <div class="flexslider">
    	
    	<ul class="slides">
        	
    	    <?php 
        	    foreach( $slider as $slide )
        	    {
                    echo '<li>
                            <img src="'.$slide['image']['sizes']['slider'].'" alt="'.$slide['image']['alt'].'" />';
                            
                        if( $slide['caption'] )
                        {
                            echo '<div class="slider-caption">'.$slide['caption'].'</div>';
                        };
                        
                    echo '</li>';
                    
                };?>
    	    	
    	</ul>
    	
    </div>


<?php endif ;?>