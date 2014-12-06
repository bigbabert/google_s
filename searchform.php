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
		<input class="search"  value="<?php echo get_search_query(); ?>" name="s" id="s" />
	        <button type="submit" id="searchsubmit" ><img src="<?php echo get_template_directory_uri(); ?>/images/search.png"></button>
        </div>
</form>