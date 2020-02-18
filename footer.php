<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kenan_IT
 */

$footer = Partials::query_footer();
?>
</div>
<footer id="kts-footer" class="kts-footer">
	<?php
	if ( $footer->have_posts() ) :
	while ( $footer->have_posts() ) :
	$footer->the_post();
	the_content();
	endwhile;
	endif;
	wp_reset_postdata();
	?>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
