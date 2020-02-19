<?php

class TheLaunch {
	const LANG = 'thelaunch';
	const VERSION = '1.0.0';

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

		Theme::set();
		Theme::configureAcf();
		Theme::disableGutenberg();
		Taxonomies::registerTaxonomies();
		PostTypes::registerPostTypes();
		Assets::enqueue();
	}
}

TheLaunch::initialize();
