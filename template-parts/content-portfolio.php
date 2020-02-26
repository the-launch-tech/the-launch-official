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
		<?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
	</header>
  <?php $clients = get_the_terms(get_the_ID(), 'client'); ?>
  <?php if ($clients) : ?>
		<div class="clients-list-wrapper">
			<h5 class="clients-list-title">Client(s)</h5>
	    <ul class="clients-list">
	      <?php foreach ($clients as $client) : ?>
	        <li class="client-item">
	          <h5 class="client-name"><?php echo $client->name ?></h5>
	        </li>
	      <?php endforeach; ?>
	    </ul>
		</div>
  <?php endif; ?>
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
