<?php
/**
 * Displays the Home page New Arrivals
 *
 * @package La Saphire
 */
?>

<?php
$showarrivals = get_theme_mod( 'set_new_arrivals_show', false );
if( $showarrivals ):
	$arrivals_limit = get_theme_mod( 'set_new_arrivals_max_num', 4 );
	$arrivals_col = get_theme_mod( 'set_new_arrivals_max_col', 4 );
?>
<section class="new-arrivals mt-10">
  <div class="container">
    <?php echo do_shortcode( '[products limit=" ' . $arrivals_limit . ' " columns=" ' . $arrivals_col . ' " orderby="date"]' ); ?>
  </div>
</section>
<?php endif; ?>