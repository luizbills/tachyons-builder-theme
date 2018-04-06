<?php
/**
 * AZ_Starter main class
 *
 * @package az-starter
 */

class AZ_Starter {

	const VERSION = '1.1.0';
	const FILE = __FILE__;
	const DIR = __DIR__;

	protected static $_initialized = false;
	protected static $_instance = null;

	protected function __construct () {
		$this->include_core();
		$this->setup();
	}

	protected function include_core () {
		require_once __DIR__ . '/helper-functions.php';
		require_once __DIR__ . '/requirements.php';
		require_once __DIR__ . '/theme-support.php';

		// wordpress tweaks
		require_once __DIR__ . '/wordpress-tweaks/clear-file-name.php';
		require_once __DIR__ . '/wordpress-tweaks/custom-admin-footer-text.php';
		require_once __DIR__ . '/wordpress-tweaks/disable-author-search.php';
		require_once __DIR__ . '/wordpress-tweaks/disable-emoji.php';
		require_once __DIR__ . '/wordpress-tweaks/disable-meta-widget.php';
		require_once __DIR__ . '/wordpress-tweaks/disable-website-field.php';
		require_once __DIR__ . '/wordpress-tweaks/disable-wp-embed.php';
		require_once __DIR__ . '/wordpress-tweaks/disable-xmlrpc.php';
		require_once __DIR__ . '/wordpress-tweaks/hide-admin-bar.php';
		require_once __DIR__ . '/wordpress-tweaks/hide-update-notice.php';
		require_once __DIR__ . '/wordpress-tweaks/jquery-cdn.php';
		require_once __DIR__ . '/wordpress-tweaks/remove-admin-bar-logo.php';
		require_once __DIR__ . '/wordpress-tweaks/remove-admin-bar-new-content.php';
		require_once __DIR__ . '/wordpress-tweaks/remove-dashboard-widgets.php';
		require_once __DIR__ . '/wordpress-tweaks/remove-query-strings.php';
		require_once __DIR__ . '/wordpress-tweaks/remove-welcome-panel.php';
		require_once __DIR__ . '/wordpress-tweaks/remove-wordpress-version.php';

		do_action( 'az_after_core_included' );
	}

	protected function setup () {

	}

	public static function get_instance () {
		if ( defined( 'AZ_MISSING_REQUIREMENTS' ) ) return false;

		if ( null === self::$_instance ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}
}

function AZ () {
	return AZ_Starter::get_instance();
}

AZ();
