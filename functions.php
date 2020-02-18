<?php

class Kenan {
	const LANG = 'kenan';
	const VERSION = '1';

  private static $instance = null;

  public static function initialize() {
    if (null == self::$instance)
      self::$instance = new self;
    return self::$instance;
  }

  private function __construct() {
		$CLASSES = get_template_directory().'/classes/';

		require $CLASSES.'Theme.php';
		require $CLASSES.'Utilities.php';
		require $CLASSES.'PostTypes.php';
		require $CLASSES.'Taxonomies.php';
		require $CLASSES.'Assets.php';
		require $CLASSES.'Partials.php';
		require $CLASSES.'SideNavigation.php';
		require $CLASSES.'Shortcodes.php';
		require $CLASSES.'Glossary.php';

		Theme::set();
		Utilities::configureAcf();
		Utilities::disableGutenberg();
		Utilities::removeDefaultPostType();
		Utilities::removeComments();
		Taxonomies::registerTaxonomies();
		PostTypes::registerPostTypes();
		Assets::enqueue();
		SideNavigation::get_instance();
		Partials::get_instance();
		Shortcodes::get_instance();
		Glossary::get_instance();
	}
}

Kenan::initialize();
