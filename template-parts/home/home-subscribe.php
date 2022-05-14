<?php
/**
 * Displays the Home page subscribe Section
 *
 * @package La Saphire
 */
?>

<?php
	if( get_theme_mod( 'set_subscribe_show', 0 ) == 1 ) :
?>
<section class="home-subscribe">
 <div class="container">
  <div class="home-subscribe__message">
   <p class="home-subscribe__text">
    <?php esc_html_e( 'Be the first to find out about new products, events and news at La Saphire', 'lasaphire' ); ?>
   </p>
  </div>
  <form id="home-subscribe">
   <div class="home-form__row">
    <div class="home-form__group">
     <input type="text" class="form-control" name="name" id="name"
      placeholder="<?php esc_html_e( 'How to call...', 'lasaphire' ); ?>" required>
    </div>
    <div class="home-form__group">
     <input type="email" class="form-control" name="email" id="email"
      placeholder="<?php esc_html_e( 'Email...', 'lasaphire' ); ?>" required>
    </div>
    <div class="col-md-2">
     <button type="submit"
      class="btn-alt btn-alt-sm btn-light"><?php esc_html_e( 'subscribe', 'lasaphire' ); ?></button>
    </div>
   </div>
   <input type="hidden" name="action" value="newsletter_subscribe">
   <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('ajax-nonce'); ?>">
  </form>
  <div id="success-subscribe" class="text-center">
   <?php esc_html_e( 'Email address successfully added', 'lasaphire' ); ?></div>
 </div>
</section>
<?php endif; ?>

<script>
const subscribeForm = document.querySelector('#home-subscribe');
endpoint = '<?php echo admin_url('admin-ajax.php'); ?>';
const successSubscribe = document.querySelector('.home-subscribe #success-subscribe');
subscribeForm.addEventListener('submit', (e) => {
 e.preventDefault();
 const formData = new URLSearchParams(new FormData(subscribeForm));
 fetch(endpoint, {
   method: 'POST',
   body: formData,
  })
  .then(response => response.json())
  .catch(error => console.log('error', error))
  .then(result => {
   console.log(result['status']);
   if (result['status'] == 'success') {
    subscribeForm.classList.add('hidden');
    successSubscribe.classList.add('show');
   }
  });
})
</script>