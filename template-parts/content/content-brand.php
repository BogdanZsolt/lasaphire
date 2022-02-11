<div class="brand col text-center my-4">
	<a href="<?php echo home_url( '/' ) ?>">
		<?php if( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
			the_custom_logo();
		} else { ?>
			<svg class="footer-logo">
				<use href="#lasaphire-logo"></use>
			</svg>
			<!-- <span class="footer-brand-logo">La Saphire</span> -->
		<?php } ?>
	</a>
</div>