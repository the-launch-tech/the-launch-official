<?php
/**
* Template Name: Launch About
*/

get_header();
?>
<div id="content" class="site-content">
	<div id="primary" class="content-area">
	<?php
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/content', 'page' );
	endwhile;
	?>
	</div>
</div>
<?php
get_footer();
