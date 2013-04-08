<?php 
global $post;
$meta = get_post_meta($post->ID,'_my_meta',TRUE);
?>
<div class="my_meta_control">
     
    <p>
        <?php _e('Select Page Type');?>
        
    </p>
 
    
    <p>
		<?php 
			$types = array(	0 => 'Regular',
							1 => 'Open Account',
							2 => 'Deposit',
							3 => 'History',
							4 => 'Protfolio',
							5 => 'Withdeawal',
							6 => 'Personal Info',
							7 => 'Platform Page',
							8 => 'Expiry rates'
			);
			
		?>
		
        <select name="_my_meta[page_type]">
			<?php
				foreach ($types as $key => $type):
					if((!empty($meta['page_type']) && $meta['page_type'] == $key ) || (empty($meta['page_type']) && $key == 0))
						$selected = 'selected="selected"';
					else 
						$selected = '';
					echo "<option value='$key' $selected>$type</options>";
				endforeach;
			?>
		</select>
		
    </p>
 
  
    
 
</div>