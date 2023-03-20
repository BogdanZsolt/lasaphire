<?php
/**
 * Displays the Home page News Section
 *
 * @package La Saphire
 */
?>

<section id="news" class="blog my-10">
  <div class="container">
    <div class="division__header row">
      <h5 class="division__title col-12 col-md-6">
        <?php echo esc_html( get_theme_mod( 'set_blog_title', __( 'La\'Saphire Blog', 'lasaphire' ) ) ); ?></h5>
      <a href="<?php echo esc_url( get_permalink( get_theme_mod( 'set_blog_link', '' ) ) ); ?>"
        class="division__link btn-txt col-12 col-md-6"><?php echo esc_html( get_theme_mod( 'set_blog_button_text', __('Check the posts', 'lasaphire') ) ); ?></a>
    </div>
    <div class="row">
      <?php
				$args = array(
					'post_type'			=> 'post',
					'posts_per_page'	=> 3,
				);

				$blog_posts = new WP_Query( $args );
				$j=1;
				if( $blog_posts->have_posts() ):
					while( $blog_posts->have_posts() ): $blog_posts->the_post();
			?>
      <div class="news-post">

        <a href="<?php the_permalink(); ?>">
          <?php
							if( has_post_thumbnail() ):
							the_post_thumbnail( 'la-saphire-blog', array( 'class' => 'img-fluid' ) );
							endif;
							?>
          <h4 class="py-3 post-title"><?php the_title(); ?></h4>
          <div class="excerpt text-beauty"><?php wp_trim_words(the_excerpt(),18); ?></div>
        </a>
      </div>
      <?php
					wp_reset_postdata();
					$j++;
					endwhile;
				else:
			?>
      <p><?php _e( 'Nothing to display.', 'lasaphire' ); ?></p>
      <?php endif; ?>
    </div>
  </div>
</section>