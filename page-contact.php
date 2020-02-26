<?php
/**
* Template Name: Launch Contact
*/

get_header();
?>
<div id="content" class="site-content">
	<div id="primary" class="content-area">
		<div class="content-row">
			<?php
			if ($_REQUEST['type'] === 'question') :
				?>
				<div class="contact-options" data-aos="fade-up" data-aos-duration="800" data-aos-offset="200">
					<div class="contact-option" data-aos="fade-in" data-aos-duration="800" data-aos-offset="200">
						<a class="contact-option-anchor" href="<?php echo home_url() . '/contact-the-launch?type=quote' ?>">Request A Quote</a>
					</div>
					<div class="contact-option" data-aos="fade-in" data-aos-duration="800" data-aos-offset="200">
						<span class="contact-option-text"><i class="fal fa-check"></i> Ask A Question</span>
					</div>
					<div class="contact-option" data-aos="fade-in" data-aos-duration="800" data-aos-offset="200">
						<a class="contact-option-anchor" href="<?php echo home_url() . '/contact-the-launch?type=contact' ?>">Quick Contact</a>
					</div>
				</div>
				<div class="contact-details" data-aos="fade-up" data-aos-duration="800" data-aos-offset="200">
					<div class="contact-details-left" data-aos="fade-in" data-aos-duration="800" data-aos-offset="200">
						<h5 class="contact-details-title">Contact Details</h5>
						<ul class="contact-details-list">
							<li class="contact-details-item"><a class="contact-details-anchor" href="tel:9192591882">(919) 259-1882</a></li>
							<li class="contact-details-item"><a class="contact-details-anchor" href="mailto:daniel@thelaunch.tech">daniel@thelaunch.tech</a></li>
							<li class="contact-details-item"><span class="contact-details-item-text">Durham, NC, 27707</span></li>
						</ul>
					</div>
					<div class="contact-details-right" data-aos="fade-in" data-aos-duration="800" data-aos-offset="200">
						<p class="contact-details-text lg-text">The Launch, founded in 2019 by Daniel Griffiths, is located in North Carolina, and operates as a remote web agency. We are a small company who bring high quality and boutique web services to individuals and organizations of all tiers.</p>
					</div>
				</div>
				<div data-aos="fade-up" data-aos-duration="800" data-aos-offset="200">
					<?php echo do_shortcode('[contact-form-7 id="363" title="Contact Page Question"]'); ?>
				</div>
			<?php elseif ($_REQUEST['type'] === 'quote') : ?>
				<div class="contact-options" data-aos="fade-up" data-aos-duration="800" data-aos-offset="200">
					<div class="contact-option" data-aos="fade-in" data-aos-duration="800" data-aos-offset="200">
						<span class="contact-option-text"><i class="fal fa-check"></i> Request A Quote</span>
					</div>
					<div class="contact-option" data-aos="fade-in" data-aos-duration="800" data-aos-offset="200">
						<a class="contact-option-anchor" href="<?php echo home_url() . '/contact-the-launch?type=question' ?>">Ask A Question</a>
					</div>
					<div class="contact-option" data-aos="fade-in" data-aos-duration="800" data-aos-offset="200">
						<a class="contact-option-anchor" href="<?php echo home_url() . '/contact-the-launch?type=contact' ?>">Quick Contact</a>
					</div>
				</div>
				<div class="contact-details" data-aos="fade-up" data-aos-duration="800" data-aos-offset="200">
					<div class="contact-details-left" data-aos="fade-in" data-aos-duration="800" data-aos-offset="200">
						<h5 class="contact-details-title">Contact Details</h5>
						<ul class="contact-details-list">
							<li class="contact-details-item"><a class="contact-details-anchor" href="tel:9192591882">(919) 259-1882</a></li>
							<li class="contact-details-item"><a class="contact-details-anchor" href="mailto:daniel@thelaunch.tech">daniel@thelaunch.tech</a></li>
							<li class="contact-details-item"><span class="contact-details-item-text">Durham, NC, 27707</span></li>
						</ul>
					</div>
					<div class="contact-details-right" data-aos="fade-in" data-aos-duration="800" data-aos-offset="200">
						<p class="contact-details-text lg-text">The Launch, founded in 2019 by Daniel Griffiths, is located in North Carolina, and operates as a remote web agency. We are a small company who bring high quality and boutique web services to individuals and organizations of all tiers.</p>
					</div>
				</div>
				<div data-aos="fade-up" data-aos-duration="800" data-aos-offset="200">
					<?php echo do_shortcode('[contact-form-7 id="362" title="Contact Page Quote"]'); ?>
				</div>
			<?php else : ?>
				<div class="contact-options" data-aos="fade-up" data-aos-duration="800" data-aos-offset="200">
					<div class="contact-option" data-aos="fade-in" data-aos-duration="800" data-aos-offset="200">
						<a class="contact-option-anchor" href="<?php echo home_url() . '/contact-the-launch?type=quote' ?>">Request A Quote</a>
					</div>
					<div class="contact-option" data-aos="fade-in" data-aos-duration="800" data-aos-offset="200">
						<a class="contact-option-anchor" href="<?php echo home_url() . '/contact-the-launch?type=question' ?>">Ask A Question</a>
					</div>
					<div class="contact-option" data-aos="fade-in" data-aos-duration="800" data-aos-offset="200">
						<span class="contact-option-text"><i class="fal fa-check"></i> Quick Contact</span>
					</div>
				</div>
				<div class="contact-details" data-aos="fade-up" data-aos-duration="800" data-aos-offset="200">
					<div class="contact-details-left" data-aos="fade-in" data-aos-duration="800" data-aos-offset="200">
						<h5 class="contact-details-title">Contact Details</h5>
						<ul class="contact-details-list">
							<li class="contact-details-item"><a class="contact-details-anchor" href="tel:9192591882">(919) 259-1882</a></li>
							<li class="contact-details-item"><a class="contact-details-anchor" href="mailto:daniel@thelaunch.tech">daniel@thelaunch.tech</a></li>
							<li class="contact-details-item"><span class="contact-details-item-text">Durham, NC, 27707</span></li>
						</ul>
					</div>
					<div class="contact-details-right" data-aos="fade-in" data-aos-duration="800" data-aos-offset="200">
						<p class="contact-details-text lg-text">The Launch, founded in 2019 by Daniel Griffiths, is located in North Carolina, and operates as a remote web agency. We are a small company who bring high quality and boutique web services to individuals and organizations of all tiers.</p>
					</div>
				</div>
				<div data-aos="fade-up" data-aos-duration="800" data-aos-offset="200">
					<?php echo do_shortcode('[contact-form-7 id="5" title="Contact Page"]'); ?>
				</div>
			<?php endif; ?>
		</div>
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
