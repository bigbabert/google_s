<?php

/*  Replace custom search product form
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * @package Google_S
 */
?>
<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
			<div>
				<input type="text" class="search" name="s" id="s" placeholder="<?php _e( 'Search for products', 'woocommerce' ); ?>" />
	        <button type="submit" id="searchsubmit" ><img src="<?php echo get_template_directory_uri(); ?>/images/search.png"></button>
				<input type="hidden" name="post_type" value="product" />
			</div>
		</form>