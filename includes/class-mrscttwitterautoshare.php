<?php

use Psr\Log\LoggerInterface;
use Coderjerk\BirdElephant\BirdElephant;

class MrsctTwitterAutoshare_Plugin
{

	private $logger;
	/**
	 * The basename of the plugin.
	 *
	 * @var string
	 */
	private $basename;

	/**
	 * The prefix used by all option names.
	 *
	 * @var string
	 */
	private $prefix;

	private $dir;
	private $file;
	private $assets_dir;
	private $assets_url;
	private $settings;
	private $plugin_path;

	/**
	 * @var WordPressSettingsFramework
	 */
	private $wpsf;


	/**
	 * Constructor.
	 *
	 * @param string $file
	 */
	public function __construct($prefix = 'mtau', $file, LoggerInterface $logger = null)
	{
		$this->basename = plugin_basename($file);
		$this->prefix = $prefix;
		$this->plugin_path = plugin_dir_path(  dirname( __FILE__ , 1 ) );

		$this->file = $file;
		$this->dir = dirname( $this->file );
		$this->assets_dir = trailingslashit( $this->dir ) . 'assets';
		$this->assets_url = esc_url( trailingslashit( plugins_url( '/assets/', $this->file ) ) );

		require_once( $this->plugin_path . 'wordpress-settings-framework/wp-settings-framework.php' );
		$this->wpsf = new WordPressSettingsFramework( $this->plugin_path . 'settings/example-settings.php', $this->prefix );
		add_action( 'admin_menu', array( $this, 'add_settings_page' ), 20 );

		// Add an optional settings validation filter (recommended)
		add_filter( $this->wpsf->get_option_group() . '_settings_validate', array( $this, 'validate_settings' ) );
		$this->settings = $this->wpsf->get_settings();
		var_dump($this->settings);
	}

	/**
	 * Add settings page.
	 */
	function add_settings_page() {
		$this->wpsf->add_settings_page( array(
			'parent_slug' => 'options-general.php',
			'page_title'  => __( 'Twitter Auto Share', 'mrscttwitterautoshare' ),
			'menu_title'  => __( 'Twitter Auto Share', 'mrscttwitterautoshare' ),
			'capability'  => 'manage_options',
		) );
	}

	/**
	 * Validate settings.
	 *
	 * @param $input
	 *
	 * @return mixed
	 */
	function validate_settings( $input ) {
		// Do your settings validation here
		// Same as $sanitize_callback from http://codex.wordpress.org/Function_Reference/register_setting
		return $input;
	}

	/**
	 * Publish Tweet
	 * @param $post_id
	 * @return boolean
	 */

	function publish_tweet( $post_id ) {
		if( !$post_id ) return false;

		$title = get_the_title( $post_id );
		$permalink = get_permalink( $post_id );

		if( !$title || !$permalink ) return false;

		$settings = $this->settings;

		$credentials = array(
			'bearer_token' => $settings['tab_1_section_1_bearer-token'], // OAuth 2.0 Bearer Token requests
			'consumer_key' => xxxxxx, // identifies your app, always needed
			'consumer_secret' => xxxxxx, // app secret, always needed
		);

		$twitter = new BirdElephant($credentials);

		$tweet = (new Tweet)->text( "À la une | " . $title . " " . $permalink );

		$twitter->tweets()->tweet($tweet);

	}

}
