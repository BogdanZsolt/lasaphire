<?php
/**
 * Template for displaying search forms in La Saphire
 *
 * @package La Saphire
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'lasaphire' ); ?>" value="<?php echo get_search_query(); ?>" name="s" autocomplete="off"/>
	<button type="submit" class="btn search-submit"><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'lasaphire' ); ?></span><i class="fas fa-search"></i></button>
</form>

