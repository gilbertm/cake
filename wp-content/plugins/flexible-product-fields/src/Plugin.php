<?php

namespace WPDesk\FPF\Free;

use VendorFPF\WPDesk\PluginBuilder\Plugin\AbstractPlugin;
use VendorFPF\WPDesk\PluginBuilder\Plugin\HookableCollection;
use VendorFPF\WPDesk\PluginBuilder\Plugin\HookableParent;
use VendorFPF\WPDesk\View\Renderer\SimplePhpRenderer;
use VendorFPF\WPDesk\View\Resolver\DirResolver;
use VendorFPF\WPDesk_Plugin_Info;
use WPDesk\FPF\Free\Admin;
use WPDesk\FPF\Free\Field;
use WPDesk\FPF\Free\Helpers;
use WPDesk\FPF\Free\Integration;
use WPDesk\FPF\Free\Product;
use WPDesk\FPF\Free\Settings;
use WPDesk\FPF\Free\Tracker;
use WPDesk\FPF\Free\Validation;

/**
 * Main plugin class. The most important flow decisions are made here.
 */
class Plugin extends AbstractPlugin implements HookableCollection {

	use HookableParent;

	/**
	 * Scripts version.
	 *
	 * @var string
	 */
	private $script_version = '1';

	/**
	 * Instance of old version main class of plugin.
	 *
	 * @var \Flexible_Product_Fields_Plugin
	 */
	private $plugin_old;

	/**
	 * Plugin constructor.
	 *
	 * @param WPDesk_Plugin_Info              $plugin_info Plugin info.
	 * @param \Flexible_Product_Fields_Plugin $plugin_old  Main plugin.
	 */
	public function __construct( WPDesk_Plugin_Info $plugin_info, \Flexible_Product_Fields_Plugin $plugin_old ) {
		parent::__construct( $plugin_info );

		$this->plugin_url       = $this->plugin_info->get_plugin_url();
		$this->plugin_namespace = $this->plugin_info->get_text_domain();
		$this->script_version   = $plugin_info->get_version();
		$this->plugin_old       = $plugin_old;
	}

	/**
	 * Initializes plugin external state.
	 *
	 * The plugin internal state is initialized in the constructor and the plugin should be internally consistent after
	 * creation. The external state includes hooks execution, communication with other plugins, integration with WC
	 * etc.
	 *
	 * @return void
	 */
	public function init() {
		$renderer = new SimplePhpRenderer( new DirResolver( dirname( __DIR__ ) . '/templates' ) );

		$this->add_hookable( new Admin\NoticeReview() );
		$this->add_hookable( new Helpers\Shortener() );
		$this->add_hookable( new Product\FieldsConfig() );
		$this->add_hookable( new Settings\FieldsGroup() );
		$this->add_hookable( new Settings\Page( $renderer ) );

		$this->add_hookable( new Integration\IntegratorIntegration( $this->plugin_old ) );
		$this->add_hookable( new Tracker\DeactivationTracker( $this->plugin_info ) );

		( new Settings\Forms() )->init();
		( new Settings\Routes() )->init();
		( new Settings\Tabs() )->init();
		( new Field\Types() )->init();
		( new Validation\Rules() )->init();
	}

	/**
	 * {@inheritdoc}
	 */
	public function hooks() {
		$this->hooks_on_hookable_objects();
	}

	/**
	 * Get script version.
	 *
	 * @return string .
	 */
	public function get_script_version() {
		return $this->script_version;
	}
}
