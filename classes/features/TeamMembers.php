<?php

class TeamMembers {

  public static function setShortcode() {
    add_shortcode('team_members', 'TeamMembers::render');
  }

  public static function render($atts = []) {
    $html = '';

    if ($atts) {

    }

    $team = new WP_Query([
      'post_type' => 'team',
    ]);

    if ($team->have_posts()) :
      $html .= '<div id="team-members" class="team-members">';
      while ($team->have_posts()) :
        $team->the_post();
        $html .= '<div class="team-member" data-aos="fade-up" data-aos-duration="800" data-aos-offset="200">';
          $html .= '<img data-aos="fade-in" data-aos-duration="800" data-aos-offset="200" class="team-member-headshot" src="'.get_the_post_thumbnail_url().'" alt="'.get_the_title().'" title="'.get_the_title().'" />';
          $html .= '<div data-aos="fade-in" data-aos-duration="800" data-aos-offset="200" class="team-member-body">';
            $html .= '<h4 class="team-member-name">'.get_the_title().'</h4>';
            $html .= '<div class="team-member-bio">'.apply_filters('the_content', get_the_content()).'</div>';
          $html .= '</div>';
        $html .= '</div>';
      endwhile;
      $html .= '</div>';
    endif;

    return $html;
  }

}
