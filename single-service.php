<?php
/**
 * The template for displaying all single services
 */

get_header();

$service = new stdClass();
?>
<div id="content" class="site-content">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<?php
		while ( have_posts() ) :
			the_post();
      $service->id = get_the_ID();
			get_template_part( 'template-parts/content', get_post_type() );
		endwhile;
    wp_reset_postdata();

    $services = new WP_Query([
      'post_type' => 'service',
      'order' => 'DESC',
      'orderby' => 'date'
    ]);

    if ($services->have_posts()) :
    ?>
      <div class="additional-services">
        <h4 class="additional-services-title" data-aos="fade-in" data-aos-duration="800" data-aos-offset="200">Other Services</h4>
        <div class="additional-services-content">
          <?php
          while ($services->have_posts()) :
            $services->the_post();
            if ($service->id !== get_the_ID()) :
            ?>
              <div class="additional-service" data-aos="fade-up" data-aos-duration="800" data-aos-offset="200">
                <i class="additional-service-icon <?php echo get_field('icon', get_the_ID()); ?>"></i>
                <h4 class="additional-service-title"><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h4>
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
