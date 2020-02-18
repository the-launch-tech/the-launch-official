<?php
/**
* Template Name: IT Home
*/

get_header();
?>
	<div id="primary" class="content-area">
	<?php
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/content', 'page' );
	endwhile;
	?>
	</div>
<?php
get_footer();
