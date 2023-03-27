<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package La Saphire
 */

get_header();
$src = get_the_post_thumbnail_url( get_option( 'page_for_posts' ), 'la-saphire-page-banner' );
$src_mobile = get_the_post_thumbnail_url( get_option( 'page_for_posts' ), 'woocommerce_thumbnail' );
?>
<div class="content-area">
  <main>
    <div class="banner mb-5">
      <img src="<?php echo esc_url($src) ?>" class="img-fluid" alt="banner photo">
      <img src="<?php echo esc_url($src_mobile) ?>" class="img-mobile" alt="banner photo">
      <div class="banner-content overlay">
        <h1><?php echo get_the_title(get_option( 'page_for_posts' )); ?></h1>
      </div>
    </div>
    <div class="container">
      <div class="row mb-5">
        <!-- </?php if( is_active_sidebar( 'la_saphire-sidebar-1' ) ):  ?>
					<div class="col-lg-9 col-md-8 col-12">
					</?php else : ?>
					<div class="">
					</?php endif; ?> -->
        <?php
						// If there are any posts
						if( have_posts() ):

							// Load posts loop
							while( have_posts() ): the_post();
								get_template_part( 'template-parts/content/content' );
							endwhile;
							the_posts_pagination(
								array(
									'prev_text'		=> '<',
									'next_text'		=> '>',
								)
							);
						else:
					?>
        <p><?php _e( 'Nothing to display.', 'lasaphire' ); ?></p>
        <?php endif; ?>
      </div>
      <!-- </?php
					get_sidebar();
				?> -->
    </div>
</div>
</main>
</div>
<?php get_footer(); ?>