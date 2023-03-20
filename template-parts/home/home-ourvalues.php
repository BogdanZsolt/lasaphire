<?php
/**
 * Displays the Home page Our Values Section
 *
 * @package La Saphire
 */

?>

<?php
    $showvalues = get_theme_mod( 'set_values_show', false );
    if( $showvalues == true ) :
?>
<section id="our-values" class="my-10">
  <div class="container">
    <div class="row justify-content-center">

      <div class="col-6 col-md-3 mb-4">
        <a href="<?php echo home_url( '/our-values' ) ?>">
          <div id="natural-skin" data-koa="flip-left" class="card">
            <svg version="1.1" viewBox="0 -10 107 81.4">
              <path
                d="M53.5,68c-0.4,0-0.7-0.1-1-0.4c-0.2-0.2-4.1-3.8-8.1-9.7c-3.7-5.5-8.1-14.1-8.1-23.7c0-9.6,4.4-18.2,8.1-23.7c4-5.9,7.9-9.6,8.1-9.7c0.5-0.5,1.4-0.5,1.9,0c0.2,0.2,4.1,3.8,8.1,9.7c3.7,5.5,8.1,14.1,8.1,23.7c0,9.6-4.4,18.2-8.1,23.7c-4,5.9-7.9,9.6-8.1,9.7C54.2,67.9,53.9,68,53.5,68z">
              </path>
              <path
                d="M53.5,68c-0.6,0-1.2-0.4-1.4-1c-0.1-0.2-1.7-5.3-2.3-12.4C49.4,48,49.8,38.3,54.5,30c4.7-8.4,12.8-13.6,18.7-16.6c6.4-3.2,11.6-4.4,11.8-4.5c0.7-0.2,1.4,0.2,1.7,0.9c0.1,0.2,1.7,5.3,2.3,12.4c0.5,6.6,0.1,16.2-4.6,24.6c-4.7,8.3-12.8,13.6-18.7,16.6c-6.4,3.2-11.6,4.4-11.8,4.5C53.7,68,53.6,68,53.5,68z">
              </path>
              <path
                d="M67.4,69.9c-8,0-14.1-1.8-14.3-1.8c-0.7-0.2-1.1-0.9-1-1.6c0-0.2,1.1-5.1,3.9-11.2c2.6-5.6,7.3-13.3,15-17.9c5.5-3.3,12.3-5,20.2-5c8,0,14.1,1.8,14.3,1.8c0.7,0.2,1.1,0.9,1,1.6c0,0.2-1.1,5.1-3.9,11.2c-2.6,5.6-7.3,13.3-15,17.9C82.1,68.2,75.3,69.9,67.4,69.9z">
              </path>
              <path
                d="M53.5,68c-0.1,0-0.2,0-0.3,0c-0.2,0-5.4-1.3-11.8-4.5c-5.9-3-14-8.3-18.7-16.6c-4.7-8.3-5.1-18-4.6-24.6c0.5-7.1,2.2-12.2,2.3-12.4c0.2-0.7,1-1.1,1.7-0.9c0.2,0,5.4,1.3,11.8,4.5c5.9,3,14,8.3,18.7,16.6c4.7,8.3,5.1,18,4.6,24.6C56.6,61.7,55,66.8,54.9,67C54.7,67.6,54.1,68,53.5,68z">
              </path>
              <path
                d="M39.6,69.9L39.6,69.9c-7.9,0-14.7-1.7-20.2-5C11.7,60.2,7,52.5,4.4,46.9C1.6,40.9,0.6,36,0.5,35.7c-0.2-0.7,0.3-1.4,1-1.6c0.3-0.1,6.4-1.8,14.3-1.8c7.9,0,14.7,1.7,20.2,5c7.7,4.6,12.4,12.3,15,17.9c2.8,6.1,3.8,10.9,3.9,11.2c0.2,0.7-0.3,1.4-1,1.6C53.6,68.1,47.5,69.9,39.6,69.9z">
              </path>
            </svg>
            <div class="card-body">
              <h5 class="card-title">
                <?php echo esc_html(get_theme_mod( 'set_values_card1_title', __( 'All natural skin care', 'lasaphire' ) ) ); ?>
              </h5>
            </div>
          </div>
        </a>
      </div>

      <div class="col-6 col-md-3 mb-4">
        <a href="<?php echo home_url( '/our-values' ) ?>">
          <div id="manufacture-batches" data-koa="flip-left" class="card">
            <svg viewBox="-35 -15 125 115">
              <path
                d="M66.8 46.2L32.2 80.8M60 42.5V53h10.5M53 49.5V60h10.5M46 56.5V67h10.5M39 63.5V74h10.5M11 .5h21V11H11z">
              </path>
              <path
                d="M42.5 49.5c0-10.5-3.5-19.2-14-22.8V10.9M14.5 11v15.8C4 30.2.5 39 .5 49.5v28C.5 79.4 2.1 81 4 81h19.3">
              </path>
              <path
                d="M28.1 49.9c0 3.6-2.9 6.6-6.6 6.6-3.6 0-6.6-2.9-6.6-6.6 0-3.6 6.6-10.9 6.6-10.9s6.6 7.3 6.6 10.9z">
              </path>
            </svg>
            <div class="card-body">
              <h5 class="card-title">
                <?php echo esc_html(get_theme_mod( 'set_values_card2_title', __( 'Manufacture of small batches', 'lasaphire' ) ) ); ?>
              </h5>
            </div>
          </div>
        </a>
      </div>

      <div class="col-6 col-md-3 mb-4">
        <a href="<?php echo home_url( '/our-values' ) ?>">
          <div id="beauty-intent" data-koa="flip-right" class="card">
            <svg version="1.1" viewBox="-25 -25 120 120">
              <path
                d="M58.1 4.1C50-2.7 36.4-.5 32.4 16.1 26.6-8 .5-1.7.5 18.1.5 28.3 11.8 40.7 20.9 49M27.5 75.5C25.9 71.8 16 53.9 30 40.6c6.3-5.9 10.9-9.6 14.5-13.5s4.4-6.1 5.5-5.2 3.2 5.6.5 9.9-10.4 9.7-11 11.5 1 3.2 3.4 1.5 8-3 11.4-14.3 2.3-19.6 5.3-24 4.9-4.4 4.9-4.4 2.8 18-1.7 33.6S53 55.9 46.4 60.3s-12.1 9-18.9 15.2z">
              </path>
            </svg>
            <div class="card-body">
              <h5 class="card-title">
                <?php echo esc_html(get_theme_mod( 'set_values_card3_title', __( 'Beauty with intent', 'lasaphire' ) ) ); ?>
              </h5>
            </div>
          </div>
        </a>
      </div>
      <div class="col-6 col-md-3 mb-4">
        <a href="<?php echo home_url( '/our-values' ) ?>">
          <div id="reliability" data-koa="flip-right" class="card">
            <svg viewBox="0 -25 120.5 80.4">
              <path
                d="M39.1 12.7s3.9 18.6 4.5 20.8c.7 2.1.9 4.4-2.3 6.1-3.2 1.7-15.8 2-21.3 3.9S9.8 49.5 9.8 51s1.7 2.8 3.2 1.6c5.5-4.1 13.3-5.6 19.7-5.5 4.9.1 4.8 2.7 2.1 2.9-2.7.3-5.6 2-5.3 2.9s.1 2.4 5.6 1.5c5.5-.9 15.4-.5 18.6-3.5 3.2-2.9 4.4-9.8 2.9-14.4C55.2 32 52.5 0 52.5 0M56.6 45.8h3.7M.2 55s3.1-1.6 9.6-3.4">
              </path>
              <path
                d="M81.4 12.7s-3.9 18.6-4.5 20.8c-.7 2.1-.9 4.4 2.3 6.1 3.2 1.7 15.8 2 21.3 3.9s10.2 6 10.2 7.5-1.7 2.8-3.2 1.6c-5.5-4.1-13.3-5.6-19.7-5.5-4.9.1-4.8 2.7-2.1 2.9 2.7.3 5.6 2 5.3 2.9s-.1 2.4-5.6 1.5c-5.5-.9-15.4-.5-18.6-3.5-3.2-2.9-4.4-9.8-2.9-14.4 1.4-4.5 4-36.5 4-36.5M63.9 45.8h-3.7M120.2 55s-3.1-1.6-9.6-3.4">
              </path>
            </svg>
            <div class="card-body">
              <h5 class="card-title">
                <?php echo esc_html(get_theme_mod( 'set_values_card4_title', __( 'Reliability', 'lasaphire' ) ) ); ?>
              </h5>
            </div>
          </div>
        </a>
      </div>

    </div>
  </div>
</section>
<?php endif; ?>