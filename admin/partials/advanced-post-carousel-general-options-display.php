<?php

/**
 * Partial of the clean up settings
 *
 *
 *
 * @link       http://lostwebdesigns.com
 * @since      1.0.0
 *
 * @package    advanced-post-carousel
 * @subpackage advanced-post-carousel/admin/partials
 */
?>

<div id="display-options" class="wrap  carousel-settings-tab ">

	
	<table class="form-table">
			  				<tr>
			  					<td><?php _e( 'Post Types', $this->plugin_name ); ?>:</td>
			  					<td><select class="widefat">
			  						    <?php
                							$all_post_types = Advanced_Post_Carousel_Utils::getPosttypes();
                							foreach($all_post_types as $key => $type) {
                   							echo "<option value=\"" .$key ."\"".">". $type->label ."</option>";
                							}
            							?>
            						</select>
			  						
        		  						
			  					</td>
			  					<td>
			  						<?php echo Advanced_Post_Carousel_Utils::getTooltip(__("Select any post type to populate posts from. By default it is 'Posts'.", $this->plugin_name)); ?>
			  					</td>
			  				</tr>



    </table>	
</div>
