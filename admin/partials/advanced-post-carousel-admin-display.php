<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://ajiteshdeb.com
 * @since      1.0.0
 *
 * @package    Advanced_Post_Carousel
 * @subpackage Advanced_Post_Carousel/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">

    <h2><?php echo esc_html(get_admin_page_title()); ?></h2>
    <h2 class="nav-tab-wrapper">
	  
        <a href="#display-options" class="nav-tab nav-tab-active"><?php _e('Display options', $this->plugin_name);?></a>
        <a href="#post-options" class="nav-tab"><?php _e('Post options', $this->plugin_name);?></a>
        <a href="#carousel-options" class="nav-tab"><?php _e('Carousel options', $this->plugin_name);?></a>
        <a href="#custom-css" class="nav-tab"><?php _e('Custom css', $this->plugin_name);?></a>
        

        
    </h2>

    </h2>

    <form method="post" name="cleanup_options" action="options.php">   
    <?php 
      // Include tabs partials
      require_once('advanced-post-carousel-general-options-display.php');
      require_once('advanced-post-carousel-post-options-display.php');
    ?>
</form> 

</div>



