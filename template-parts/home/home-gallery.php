<?php
/**
 * Displays the Home page Gallery Section
 *
 * @package La Saphire
 */
?>

<section id="gallery" class="mb-10">
  <div class="container">
    <div class="gallery-content">
      <?php
			for ($i=1; $i < 9; $i++) {
				// $id = get_theme_mod( 'set_gallery_image' . $i );
        $src = esc_url(get_theme_mod( 'set_gallery_image' . $i ), 'la-saphire-mobile', false);
        $data_src = esc_url(get_theme_mod( 'set_gallery_image' . $i ), 'full', false);
        if (!$src){
          $src = 'https://picsum.photos/1080/720/?random=' . $i;
					$data_src = $src;
        }
				// if( $id ){
				// 	$src = wp_get_attachment_image_url(get_theme_mod( 'set_gallery_image' . $i ), 'la-saphire-mobile', false);
				// 	$data_src = wp_get_attachment_image_url(get_theme_mod( 'set_gallery_image' . $i ), 'full', false);
				// } else {
				// 	$src = 'https://picsum.photos/1080/720/?random=' . $i;
				// 	$data_src = $src;
				// }
				?>
      <img class="<?php echo 'zoom-img item-' . $i; ?>" data-imagesrc="<?php echo esc_url($data_src); ?>"
        src="<?php echo esc_url($src); ?>" alt="La Saphire Photo">
      <?php
			}
		?>
    </div>
    <div class="lightbox-container">
      <div class="lightbox-image-wrapper">
        <button class="lightbox-btn left" id="left">
          <i class="far fa-arrow-alt-circle-left"></i>
        </button>
        <img src="" alt="La Saphire Photo" class="lightbox-image">
        <button class="lightbox-btn right" id="right">
          <i class="far fa-arrow-alt-circle-right"></i>
        </button>
      </div>
    </div>
  </div>
</section>