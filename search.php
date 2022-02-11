<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package La Saphire
 */

get_header();?>

<div class="content-area">
	<div class="container">
		<div class="row search-title">
			<h1>Search results for "<?php echo get_search_query(); ?>"</h1>
			<div class="search-results">
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>