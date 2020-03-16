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

?>
</div>
<footer id="footer" class="footer <?php echo is_404() ? 'footer-404' : ''; ?>">
  <div class="site-info">
    <span class="site-info-text">©2020 The Launch | Developed and Designed by The Launch</span>
  </div>
  <?php if (!is_404()) : ?>
    <div id="net-selector"></div>
  <?php endif; ?>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
