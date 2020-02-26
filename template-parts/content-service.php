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
		<i class="<?php echo get_field('icon', get_the_ID()); ?>" data-aos="fade-right" data-aos-duration="800" data-aos-offset="200"></i> <?php the_title( '<h3 class="entry-title" data-aos="fade-left" data-aos-duration="800" data-aos-offset="200">', '</h3>' ); ?>
	</header>
  <?php $specializations = get_the_terms(get_the_ID(), 'specialization'); ?>
  <?php if ($specializations) : ?>
		<div class="specializations-list-wrapper">
			<h5 class="specializations-list-title">Specialization(s)</h5>
	    <ul class="specializations-list" data-aos="fade-up" data-aos-duration="800" data-aos-offset="200">
	      <?php foreach ($specializations as $special) : ?>
	        <li class="specialization-item">
	          <h5 class="specialization-name"><?php echo $special->name ?></h5>
	        </li>
	      <?php endforeach; ?>
	    </ul>
		</div>
  <?php endif; ?>
	<div class="entry-content" data-aos="fade-up" data-aos-duration="800" data-aos-offset="200">
		<?php the_content(); ?>
	</div>
</article>
