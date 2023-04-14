<form id="contact-email-form">
  <div class="form-group">
    <?php $user = wp_get_current_user();
      var_dump($user->user_nicename);
      if($user != 0){
        $email = $user->user_email;
        $name = !empty($user->user_nicename) ? $user->user_nicename : '';
      };
    ?>
    <!-- <label for="name"><?php _e( 'Name', 'lasaphire' ); ?></label> -->
    <input type="text" class="form-control" id="name" name="name"
      placeholder="<?php echo esc_html( get_theme_mod( 'set_contactform_name_place', __( 'Name...', 'lasaphire' ) ) ); ?>"
      <?php echo $user != 0 && !empty($name) ? 'value="' . esc_html($name) . '"' : null; ?> required>
  </div>
  <div class="form-group">
    <!-- <label for="email"><?php _e( 'Email address', 'lasaphire' ); ?></label> -->
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
      placeholder="<?php echo esc_html( get_theme_mod( 'set_contactform_email_place', __( 'Email...', 'lasaphire' ) ) ); ?>"
      <?php echo $user != 0 ? 'value="' . esc_html($user->user_email) . '"' : null; ?> required>
    <small id="emailHelp"
      class="form-text text-muted"><?php echo esc_html( get_theme_mod( 'set_contactform_email_note', __( 'We′ll never share your email with anyone else.', 'lasaphire' ) ) ); ?></small>
  </div>
  <div class="form-group">
    <!-- <label for="phone"><?php _e( 'Phone number', 'lasaphire' ); ?></label> -->
    <input type="tel" class="form-control" id="phone" name="phone" aria-describedby="emailHelp"
      placeholder="<?php echo esc_html( get_theme_mod( 'set_contactform_phone_place', __( 'Phone number...', 'lasaphire' ) ) ); ?>">
  </div>
  <div class="form-group">
    <!-- <label for="enquiry"><?php _e( 'Enquiry', 'lasaphire' ); ?></label> -->
    <textarea id="enquiry" class="form-control" id="enquiry" name="enquiry" rows="5"
      placeholder="<?php echo esc_html( get_theme_mod( 'set_contactform_message_place', __( 'Tell me what\'s up...', 'lasaphire' ) ) ); ?>"
      required></textarea>
  </div>
  <button type="submit" class="col-6 col-md-3 btn-alt btn-normal"
    id="send-email"><?php echo esc_html( get_theme_mod( 'set_contactform_button_text', __( 'Send', 'lasaphire' ) ) ); ?></button>
  <div class=row>
    <div class="col-6 col-md-9">
      <small
        class="field-msg success form-success"><?php _e( 'Enquiry Successfully submitted, thank you!', 'lasaphire' ); ?></small>
      <small
        class="field-msg error form-error"><?php _e( 'There was a problem with the Contact Form, please try again!', 'lasaphire' ); ?></small>
    </div>
  </div>

  <input type="hidden" name="action" value="contact">
  <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('ajax-nonce'); ?>">
</form>

<script>
const contactEmailForm = document.querySelector('#contact-email-form');
endpoint = '<?php echo admin_url('admin-ajax.php'); ?>';
contactEmailForm.addEventListener('submit', (e) => {
  e.preventDefault();
  resetMessages();
  const params = new URLSearchParams(new FormData(contactEmailForm));
  console.log(params.toString())
  fetch(endpoint, {
      method: 'POST',
      body: params,
    })
    .then((res) => res.json())
    .catch((error) => console.log(error))
    .then((response) => {
      if (response === 0 || response.status === 'error') {
        contactEmailForm.querySelector('.form-error').classList.add('show');
        return;
      }
      contactEmailForm.reset();
      contactEmailForm.querySelector('.form-success').classList.add('show');

    })
})

const resetMessages = () => {
  document.querySelectorAll('field-msg').forEach(f => f.classList.remove('show'));
}
</script>