<?php

class CallToAction {

  public static function setShortcode() {
    add_shortcode('call_to_action', 'CallToAction::render');
  }

  public static function render($atts) {
    $html = '';

    if ($atts) {

    }

    $title = "Hire The Launch";
    $text = "Hire The Launch now for your website or application design, development, management, or maintenance needs.";
    $linkLeft = "Contact Now";
    $linkCenter = "Ask A Question";
    $linkRight = "Request A Quote";

    $html .= '<div id="call-to-action">';
      $html .= '<div class="call-to-action-head">';
      $html .= '<h2 class="call-to-action-title" data-aos="fade-in" data-aos-duration="800" data-aos-delay="100" data-aos-offset="100">'.$title.'</h2>';
      $html .= '<p class="call-to-action-text lg-text" data-aos="fade-in" data-aos-duration="800" data-aos-delay="100" data-aos-offset="100">'.$text.'</p>';
      $html .= '</div>';
      $html .= '<div class="call-to-action-anchor-wrapper">';
      $html .= '<a class="call-to-action-anchor" href="'.home_url() . '/contact-the-launch?type=contact'.'" data-aos="fade-right" data-aos-duration="1000">';
        $html .= '<i class="fal fa-phone" aria-hidden="true"></i> '.$linkLeft;
      $html .= '</a>';
      $html .= '</div>';
      $html .= '<div class="call-to-action-anchor-wrapper">';
      $html .= '<a class="call-to-action-anchor" href="'.home_url() . '/contact-the-launch?type=question'.'" data-aos="fade-up" data-aos-duration="1000">';
        $html .= '<i class="fal fa-question" aria-hidden="true"></i> '.$linkCenter;
      $html .= '</a>';
      $html .= '</div>';
      $html .= '<div class="call-to-action-anchor-wrapper">';
      $html .= '<a class="call-to-action-anchor" href="'.home_url() . '/contact-the-launch?type=quote'.'" data-aos="fade-left" data-aos-duration="1000">';
        $html .= '<i class="fal fa-handshake" aria-hidden="true"></i> '.$linkRight;
      $html .= '</a>';
      $html .= '</div>';
    $html .= '</div>';

    return $html;
  }

}
