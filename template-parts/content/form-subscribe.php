<?php
/**
 * Displays subscribe Section
 *
 * @package La Saphire
 */
?>

<section class="subscribe col-11 mx-auto">
  <div class="container">
    <div class="subscribe__message">
      <p class="subscribe__text">
        <?php echo esc_html( get_theme_mod( 'set_subscription_text', __( 'Sign up to get to know the latest products, stories and nicest offers and tips!', 'lasaphire' ) ) ); ?>
      </p>
    </div>
    <form id="subscribe-form">
      <div class="subscribe-form__row">
        <div class="subscribe-form__group">
          <input type="text" class="form-control" name="name" id="name"
            placeholder="<?php echo esc_html( get_theme_mod( 'set_name_placeholder', __( 'I am called...', 'lasaphire' ) ) ); ?>"
            required>
        </div>
        <div class="subscribe-form__group">
          <input type="email" class="form-control" name="email" id="email"
            placeholder="<?php echo esc_html( get_theme_mod( 'set_email_placeholder', __( 'Email', 'lasaphire' ) ) ); ?>"
            required>
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

<script>
const subscribeForm = document.querySelector('#subscribe-form');
endpoint = '<?php echo admin_url('admin-ajax.php'); ?>';
const successSubscribe = document.querySelector('.subscribe #success-subscribe');
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