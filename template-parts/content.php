<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kenan_IT
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>
	</header>
	<?php if (get_the_post_thumbnail_url()) : ?>
	<?php endif; ?>
	<div class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses(
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'thelaunch' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'thelaunch' ),
			'after'  => '</div>',
		) );
		?>
	</div>
	<footer class="entry-footer">
	</footer>
</article>
