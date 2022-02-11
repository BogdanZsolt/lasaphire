<form id="contact-email-form">
	<div class="form-group">
		<label for="name"><?php _e( 'Név', 'lasaphire' ); ?></label>
		<input type="text" class="form-control" id="name" name="name" placeholder="<?php _e( 'Adja meg a nevét...', 'lasaphire' ); ?>" required>
	</div>
	<div class="form-group">
		<label for="email"><?php _e( 'Email cím', 'lasaphire' ); ?></label>
		<input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="<?php _e( 'Adja meg az email címét...', 'lasaphire' ); ?>" required>
		<small id="emailHelp" class="form-text text-muted"><?php _e( 'Mi soha nem osztjuk meg email címét mással.', 'lasaphire' ); ?></small>
	</div>
	<div class="form-group">
		<label for="phone"><?php _e( 'Telefonszám', 'lasaphire' ); ?></label>
		<input type="tel" class="form-control" id="phone" name="phone" aria-describedby="emailHelp" placeholder="<?php _e( 'Adja meg a telefonszámát...', 'lasaphire' ); ?>">
	</div>
	<div class="form-group">
		<label for="enquiry"><?php _e( 'Megkeresések', 'lasaphire' ); ?></label>
		<textarea id="enquiry" class="form-control" id="enquiry" name="enquiry" rows="5" placeholder="<?php _e( 'Adja meg az üzenetet...', 'lasaphire' ); ?>" required></textarea>
	</div>
	<button type="submit" class="col-6 col-md-3 btn-alt btn-normal" id="send-email"><?php _e( 'Elküld', 'lasaphire' ); ?></button>
	<div class=row>
		<div class="col-6 col-md-9">
			<small class="field-msg success form-success"><?php _e( 'A megkeresés sikeresen elküldve, köszönjük!', 'lasaphire' ); ?></small>
			<small class="field-msg error form-error"><?php _e( 'Probléma merült fel az űrlap elküldése során. Kérem próbálja meg újra!', 'lasaphire' ); ?></small>
		</div>
	</div>

	<input type="hidden" name="action" value="contact">
	<input type="hidden" name="nonce" value="<?php echo wp_create_nonce('ajax-nonce'); ?>">
</form>

<script>
	const contactEmailForm = document.querySelector('#contact-email-form');
	endpoint = '<?php echo admin_url('admin-ajax.php'); ?>';
	contactEmailForm.addEventListener('submit', (e)=>{
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
			if(response === 0 || response.status === 'error'){
				contactEmailForm.querySelector('.form-error').classList.add('show');
				return;
			}
			contactEmailForm.reset();
			contactEmailForm.querySelector('.form-success').classList.add('show');

		})
	})

	const resetMessages = () => {
		document.querySelectorAll('field-msg').forEach(f=>f.classList.remove('show'));
	}
</script>