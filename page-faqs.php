<?php
/*
Template Name: FAQs Page
*/

get_header();
	while( have_posts() ): the_post();
		$src = has_post_thumbnail() ? get_the_post_thumbnail_url( null, 'la-saphire-banner' ) : get_placeholder_image('la-saphire-banner');
		$src_mobile = has_post_thumbnail() ? get_the_post_thumbnail_url( null, 'la-saphire-mobile' ) : get_placeholder_image('la-saphire-mobile');
	?>
<section id="faqs" class="mb-5" data-spy="scroll" data-target="#faq-category-list" data-offset="0">
  <div class="banner mb-5">
    <img src="<?php echo esc_url($src) ?>" class="img-fluid" alt="banner photo">
    <img src="<?php echo esc_url($src_mobile) ?>" class="img-mobile" alt="banner photo">
    <div class="banner-content overlay">
      <h1><?php the_title(); ?></h1>
      <?php
					// Load posts loop
					endwhile;
				?>
    </div>
  </div>

  <div class="container mt-5">
    <div class="row">
      <div class="col-12 col-md-3">
        <div id="faq-category-list" class="list-group">
          <?php
						$terms = get_terms(
    						array(
        						'taxonomy'		=> 'faq_categories',
        						'hide_empty'	=> true,
								'order'			=> 'DESC'
    						)
						);

						// Check if any term exists
						if ( ! empty( $terms ) && is_array( $terms ) ) {
							// Run a loop and print them all
							$i=1;
							foreach ( $terms as $term ) {
								$html = '<a class="list-group-item list-group-item-action text-beauty" href="#item-' . $i . '">';
								$html .= $term->name;
								$html .= '</a>';
								echo $html;
								$i++;
							}
						}
	 					?>
        </div>
      </div>

      <div class="col-12 col-md-9">
        <div class="accordion faq-scrollspy" id="faq-accordion">
          <?php
						$i = 1;
						$j = 1;
						foreach($terms as $term){
						echo '<h4 id="item-' . $i . '" class="text-beauty list-category-title">' . $term->name . '</h4>';
						$args = array(
							'post_type' 		=> 'ls_faq',
							'post_per_page'		=> -1,
							'tax_query' 		=> array(
								array(
									'taxonomy'	=> 'faq_categories',
									'field'		=> 'term_id',
									'terms'		=> $term->term_id,
								)
							)
						);
						$faqs = new WP_Query($args);
						if( $faqs->have_posts() ) {
							while( $faqs->have_posts() ){
								$faqs->the_post();
								// $faqansw = get_post_meta( get_the_ID(), '_faq_question_answer', true);
						?>
          <div class="card">
            <div class="card-header" id="heading-<?php echo $j; ?>">
              <h4 class="mb-0">
                <button class="btn btn-link btn-block text-left text-beauty" type="button" data-toggle="collapse"
                  data-target="#collapse-<?php echo $j; ?>" aria-expanded="false"
                  aria-controls="collapse-<?php echo $j; ?>">
                  <?php the_title(); ?>
                </button>
              </h4>
            </div>

            <div id="collapse-<?php echo $j; ?>" class="faq-collapse collapse"
              aria-labelledby="heading-<?php echo $j; ?>" data-parent="#faq-accordion">
              <div class="card-body text-beauty">
                <p><?php the_content(); ?></p>
              </div>
            </div>
          </div>
          <?php
							$j++;
							wp_reset_postdata();
							}
							} else {
								echo '<p>' . _e( 'Nothing to display.', 'lasaphire' ) . '</p>';
							}
							$i++;
						}
						?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>