<?php

/*  Replace custom search form
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * @package Google_S
 */
?>
<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div>
            	<label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label' ); ?></label>
                <input type="text" class="search" placeholder="<?php echo esc_attr__( 'Search' ); ?>" name="s" id="s" />
	        <button type="submit" id="searchsubmit" ><img src="<?php echo get_template_directory_uri(); ?>/images/search.png"></button>
        </div>
</form>