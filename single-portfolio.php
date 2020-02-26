<?php
/**
 * The template for displaying all single portfolio
 */

get_header();

$id = get_queried_object_id();
$portfolio = new stdClass();

if (get_the_post_thumbnail_url($id)) : ?>
<div class="portfolio-feature-banner">
	<img class="portfolio-feature-banner-image" src="<?php echo get_the_post_thumbnail_url($id); ?>" alt="<?php echo get_the_title($id); ?>" title="<?php echo get_the_title($id); ?>" />
	<div class="portfolio-feature-banner-overlay"></div>
	<div class="portfolio-feature-banner-fade"></div>
</div>
<?php endif; ?>

<div id="content" class="site-content">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<?php
		while ( have_posts() ) :
			the_post();
      $portfolio->id = get_the_ID();
			get_template_part( 'template-parts/content', get_post_type() );
		endwhile;
    wp_reset_postdata();

    $portfolios = new WP_Query([
      'post_type' => 'portfolio',
      'order' => 'DESC',
      'orderby' => 'date'
    ]);

    if ($portfolios->have_posts()) :
    ?>
			<div class="additional-portfolios">
				<h4 class="additional-portfolios-title" data-aos="fade-in" data-aos-duration="800" data-aos-offset="200">Other Portfolios</h4>
	      <div class="additional-portfolios-content">
	      <?php
	      while ($portfolios->have_posts()) :
	        $portfolios->the_post();
	        if ($portfolio->id !== get_the_ID()) :
	        ?>
	          <div class="additional-portfolio" data-aos="fade-up" data-aos-duration="800" data-aos-offset="200">
							<div class="additional-portfolio-content">
		            <h6 class="additional-portfolio-title">
									<a href="<?php echo get_the_permalink(); ?>">
										<?php the_title(); ?>
									</a>
								</h6>
								<p class="additional-portfolio-excerpt"><?php echo get_the_excerpt(); ?></p>
							</div>
							<img class="additional-portfolio-thumbnail" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
	          </div>
	        <?php
	        endif;
	      endwhile;
	      wp_reset_postdata();
	      ?>
	      </div>
			</div>
    <?php endif; ?>
		</main>
	</div>
</div>
<?php echo do_shortcode('[call_to_action]'); ?>
<?php
get_footer();
