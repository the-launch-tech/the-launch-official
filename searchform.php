<div class="search-wrap-overlay">
  <button class="search-toggle">Search <i class="fas fa-search"></i></button>
  <form role="search" method="get" id="searchform" action="<?php echo get_home_url(); ?>">
    <input type="text" value="" name="s" placeholder="Enter Search Terms" id="searchform-input" />
    <input type="hidden" value="post" name="post_type[]"/>
    <button type="submit" id="searchform-submit"><i class="fas fa-search"></i></button>
  </form>
</div>
