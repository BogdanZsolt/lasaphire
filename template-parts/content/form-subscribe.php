<div id="success-subscribe" class="text-center"><?php esc_html_e( 'Email address successfully added', 'lasaphire' ); ?>
</div>
<form id="subscribe">
  <div class="form-row align-items-center justify-content-center">
    <div class="form-group col-md-4 mb-2 mb-md-0">
      <input type="text" class="form-control text-beauty" name="name" id="name"
        placeholder="<?php echo esc_html( get_theme_mod( 'set_name_placeholder', __( 'I am called...', 'lasaphire' ) ) ); ?>"
        required>
    </div>
    <div class="form-group col-md-4 mb-2 mb-md-0">
      <input type="email" class="form-control text-beauty" name="email" id="email"
        placeholder="<?php echo esc_html( get_theme_mod( 'set_email_placeholder', __( 'Email', 'lasaphire' ) ) ); ?>"
        required>
    </div>
    <div class="col-md-2">
      <button type="submit"
        class="btn-alt btn-alt-sm btn-normal"><?php esc_html_e( 'subscribe', 'lasaphire' ); ?></button>
    </div>
  </div>
  <input type="hidden" name="action" value="newsletter_subscribe">
  <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('ajax-nonce'); ?>">
</form>
<div class="row justify-content-center mt-2 mb-4">
  <p class="subscribe-text">
    <?php echo esc_html( get_theme_mod( 'set_subscription_text', __( 'Sign up to get to know the latest products, stories and nicest offers and tips!', 'lasaphire' ) ) ); ?>
  </p>
</div>

<script>
const subscribeForm = document.querySelector('#subscribe');
endpoint = '<?php echo admin_url('admin-ajax.php'); ?>';
const successSubscribe = document.querySelector('#success-subscribe');
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