<?php
/**
 * The template for the sidebar containing the Shop widget area
 *
 * @package La Saphire
 */
?>

<?php if( is_active_sidebar( 'la_saphire-sidebar-shop' ) ): ?>
	<?php dynamic_sidebar( 'la_saphire-sidebar-shop' ); ?>
<?php endif;

