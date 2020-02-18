<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Kenan_IT
 */

get_header();
?>
	<div id="primary" class="content-area">
	<?php if ( have_posts() ) : ?>
		<header class="page-header">
			<h1 class="page-title">
				<?php printf( esc_html__( 'Search: %s', 'kenan-it' ), '<span class="search-string">' . get_search_query() . '</span>' ); ?>
			</h1>
		</header>
		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', 'search' );
		endwhile;
		the_posts_navigation();
	else :
		get_template_part( 'template-parts/content', 'none' );
	endif;
	?>
	</div>
<?php
get_footer();
