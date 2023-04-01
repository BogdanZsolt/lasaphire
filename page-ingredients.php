<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package La Saphire
 */

get_header();
	while( have_posts() ): the_post();
		$src = get_the_post_thumbnail_url( null, 'la-saphire-banner' );
		$src_mobile = get_the_post_thumbnail_url( null, 'la-saphire-mobile' );
	?>
<section id="ingredients-section">
  <div class="banner mb-5">
    <img src="<?php echo esc_url($src) ?>" class="img-fluid" alt="banner photo">
    <img src="<?php echo esc_url($src_mobile) ?>" class="img-mobile" alt="banner photo">
    <div class="banner-content overlay">
      <h1><?php the_title(); ?></h1>
    </div>
  </div>
  <div class="container">
    <?php
			echo do_shortcode("[ls_ingredients_list]");
			endwhile;
		?>
  </div>
</section>
<?php get_footer(); ?>