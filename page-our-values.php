<?php
/**
 * The template for La Saphire Our page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package La Saphire
 */

get_header();
	while( have_posts() ): the_post();
		$video = get_theme_mod( 'set_ourvalues_video', '' );
		$video = esc_url( wp_get_attachment_url( $video ));
		$src = has_post_thumbnail() ? get_the_post_thumbnail_url( null, 'la-saphire-banner' ) : get_placeholder_image('la-saphire-banner');
		$src_mobile = has_post_thumbnail() ? get_the_post_thumbnail_url( null, 'la-saphire-mobile' ) : get_placeholder_image('la-saphire-mobile');
	?>
<section>
  <div class="banner mb-5">
    <?php if( $video ) { ?>
    <video id="bg-video" src="<?php echo $video ?>" muted loop autoplay></video>
    <?php } else { ?>
    <img src="<?php echo esc_url($src) ?>" class="img-fluid" alt="banner photo">
    <img src="<?php echo esc_url($src_mobile) ?>" class="img-mobile" alt="banner photo">
    <?php }; ?>
    <div class="banner-content overlay">
      <h1><?php the_title(); ?></h1>
    </div>
  </div>

  </div>
  <div class="container my-5">
    <div class="row">
      <?php
					// Load posts loop
					get_template_part( 'template-parts/content/content', 'page' );
					if( comments_open() || get_comments_number() ):
						comments_template();
					endif;
					endwhile;
				?>
    </div>
  </div>
  </main>
</section>
<?php get_footer(); ?>


<!-- ?st_face=dry-or-dehydrated&sc=drydehydrated%2Cdulllack-of-radiance%2Cliftingfirming&st_body=eczema-or-dermatitis&gender=female -->