<?php
	$page = get_page_by_path( 'contact' );
?>
<div class="container buy-message mt-5">
	<h2><?php esc_html_e( 'Dear Visitors! Please be patient while the shop is running! In the meantime, inquire about the products in person', 'lasaphire' ); ?> ( <span><a href="mailto:cspetra8@gmail.com">cspetra8@gmail.com </a>emailben, a </span><span><a href="tel:+36304225096">+36 (30) 422-5096</a> telefonszámon, </span><span>vagy a <a href="<?php echo get_permalink( $page->ID ); ?>">Kapcsolat</a> oldalon található elérhetőségek egyikén) tudnak.</span> Köszönjük! La'Saphire</h2>
</div>