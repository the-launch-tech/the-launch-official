<?php
/**
 * Template Name: Glossary
 */

get_header();
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
	<?php
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/content', 'page' );
	endwhile;
	?>
	</main>
	<?php Glossary::render(); ?>
</div>
<?php
get_footer();
