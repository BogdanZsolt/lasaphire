<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package La Saphire
 *
 */

get_header();
?>

<div id="primary" class="content-area">
  <div id="main">
    <div class="banner mb-5">
      <?php the_post_thumbnail( 'la-saphire-banner', array( 'class' => 'img-fluid' )  ); ?>
      <div class="banner-content overlay">
        <div class="banner-title">
          <h1><?php the_title(); ?></h1>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <?php if( is_active_sidebar( 'la_saphire-sidebar-1' ) ):  ?>
        <div class="col-lg-9 col-md-8 col-12">
          <?php else : ?>
          <div class="col">
            <?php endif; ?>
            <?php
					while( have_posts() ): the_post();
						get_template_part( 'template-parts/content/content', 'single' );
						if( comments_open() || get_comments_number() ):
							comments_template();
						endif;
					endwhile;
					?>
          </div>
          <?php
				get_sidebar();
			?>
        </div>
      </div>
    </div>

    <?php get_footer(); ?>