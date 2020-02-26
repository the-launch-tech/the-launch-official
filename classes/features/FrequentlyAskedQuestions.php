<?php

class FrequentlyAskedQuestions {

  public static function setShortcode() {
    add_shortcode('frequently_asked_questions', 'FrequentlyAskedQuestions::render');
  }

  public static function render($atts = []) {
    $html = "";

    if ($atts) {

    }

    $questions = new WP_Query([
      'post_type' => 'question',
      'order' => 'DESC',
      'orderby' => 'date',
    ]);

    $html .= "<div class='faq-wrapper'>";
      $html .= "<h2 class='faq-title' data-aos='fade-up' data-aos-duration='800' data-aos-offset='200'>FAQ</h2>";
      $html .= "<div class='faq-content' data-aos='fade-in' data-aos-duration='800' data-aos-offset='200'>";
      if ($questions->have_posts()) :
        while ($questions->have_posts()) :
          $questions->the_post();
          $html .= "<article class='faq-item' data-aos='fade-left' data-aos-duration='800' data-aos-offset='200'>";
            $html .= "<div class='faq-question-section'>";
              $html .= "<i class='faq-question-icon ".get_field('icon', get_the_ID())."'></i> <h6 class='faq-question'>".get_the_title()."</h6>";
            $html .= "</div>";
            $html .= "<div class='faq-answer-section'>";
              $html .= "<p class='faq-answer lg-text'>".get_field('answer', get_the_ID())."</p>";
            $html .= "</div>";
          $html .= "</article>";
        endwhile;
      else :
        $html .= "<div class='faq-404'>";
          $html .= "<p class='faq-404-text lg-text'>Sorry, could not find any FAQ's</p>";
        $html .= "</div>";
      endif;
      $html .= "</div>";
    $html .= "</div>";

    return $html;
  }

}
