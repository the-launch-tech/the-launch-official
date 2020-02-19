<div class="search-wrap-overlay">
  <button class="search-toggle">Search <i class="fal fa-search"></i></button>
  <form role="search" method="get" id="searchform" action="<?php echo get_home_url(); ?>">
    <input type="text" value="" name="s" placeholder="Search The Launch" id="searchform-input" />
    <input type="hidden" value="post" name="post_type[]"/>
    <input type="hidden" value="service" name="post_type[]"/>
    <input type="hidden" value="portfolio" name="post_type[]"/>
    <button type="submit" id="searchform-submit"><i class="fal fa-search"></i></button>
  </form>
</div>
