<?php
/**
 * Plugin Name:       Elite Kit Elementor Addons
 * Plugin URI:        https://wordpress.org/plugins/elite-kit/
 * Description:       The Elite plugin you install after Elementor plugin. It adds a lot of new Elementor widgets to the Elementor Page Builder. Backed by the power of Elite Kit Framework. Highly optimized for super fast loading and instant Live editing.
 * Version:           1.0.0
 * Author:            Themexplosion
 * Author URI:        https://themexplosion.com
 * License:           GPL v2 or later
 * Text Domain:       elite-kit
 * Domain Path:       /languages/

 * WC tested up to: 8.0.2
 * Elementor tested up to: 3.15.3
 * Elementor Pro tested up to: 3.15.1
*/

defined( 'ABSPATH' ) || exit;

final class Elite_Kit {


	const VERSION                   = '1.0.0';
	const MINIMUM_ELEMENTOR_VERSION = '3.15.3';
	const MINIMUM_PHP_VERSION       = '7.4';

	public function __construct() {
		$this->init_plugin();
		load_plugin_textdomain( 'elite-kit', false, plugin_basename( __DIR__ ) . '/languages' );
		$this->core_includes();
	}

	public static function instance() {
		static $instance = false;

		if ( ! $instance ) {
			$instance = new self();
		}
	}

	/**
	 * Hook into actions and filters.
	 *
	 * @access private
	 */
	private function init_plugin() {
		add_action( 'plugins_loaded', array( $this, 'on_plugin_load' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'elite_kit_admin_scripts' ), 11 );
	}

	/**
	 * Load core files required to run the plugin.
	 *
	 */
	public function core_includes() {
	}

	/**
	 * Load the plugin after Elementor (and other plugins) are loaded.
	 */
	public function on_plugin_load() {
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_missing_main_plugin' ) );

			return;
		}

		// Check for required Elementor version.
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_elementor_version' ) );

			return;
		}

		// Check for required PHP version.
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_php_version' ) );

			return;
		}

		// Add and move elementor category.
		add_action( 'elementor/elements/categories_registered', array( $this, 'register_category_order_to_top' ) );

		// Register Widget Scripts
		add_action( 'elementor/frontend/after_register_scripts', array( $this, 'register_widget_scripts' ) );
		add_action( 'elementor/editor/before_enqueue_scripts', array( $this, 'register_widget_scripts' ) );

		// Register Widget Scripts
		add_action( 'elementor/frontend/after_enqueue_styles', array( $this, 'enqueue_widget_styles' ) );

		// Register New Widgets
		add_action( 'elementor/widgets/register', array( $this, 'on_widgets_registered' ) );
	}

	/**
	 * Load admin styles.
	 *
	 * @return void
	 */

	public function elite_kit_admin_scripts() {
		wp_enqueue_style( 'elite-kit-admin', plugins_url( 'assets/css/admin.css', __FILE__ ), array(), self::VERSION );
	}

		/**
	 * Check if a plugin is installed
	 *
	 */

	public function is_plugin_installed( $basename ) {
		if ( ! function_exists( 'get_plugins' ) ) {
			include_once ABSPATH . '/wp-admin/includes/plugin.php';
		}

		$installed_plugins = get_plugins();

		return isset( $installed_plugins[ $basename ] );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 */

	public function admin_notice_missing_main_plugin() {
		if ( ! current_user_can( 'activate_plugins' ) ) {
			return;
		}

		$elementor = 'elementor/elementor.php';

		if ( $this->is_plugin_installed( $elementor ) ) {
			$activation_url = wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $elementor . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $elementor );

			$message = sprintf( __( '%1$s Elite Kit Addons for Elementor%2$s requires %1$sElementor%2$s plugin to be active. Please activate Elementor to continue.', 'elite-kit' ), '<strong>', '</strong>' );

			$button_text = __( 'Activate Elementor', 'elite-kit' );
		} else {
			$activation_url = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=elementor' ), 'install-plugin_elementor' );

			$message     = sprintf( __( '%1$s Elite Kit Addons for Elementor %2$s requires %1$s Elementor %2$s plugin to be installed and activated. Please install Elementor to continue.', 'elite-kit' ), '<strong>', '</strong>' );
			$button_text = __( 'Install Elementor', 'elite-kit' );
		}

		$button = '<p><a href="' . esc_url( $activation_url ) . '" class="button-primary">' . esc_html( $button_text ) . '</a></p>';

		printf( '<div class="error"><p>%1$s</p>%2$s</div>', $message, $button );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 */
	public function admin_notice_minimum_elementor_version() {
		?>
		<div class="notice notice-warning is-dismissible">
			<p>
				<?php esc_html__( 'Elite Kit requires Elementor plugin version 3.15.3 or greater.', 'elite-kit' ); ?>
			</p>
		</div>
		<?php
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {
		?>
			<div class="notice notice-warning is-dismissible">
				<p>
					<?php esc_html__( 'Elite Kit requires PHP version 7.4 or greater.', 'elite-kit' ); ?>
				</p>
			</div>
		<?php
	}

	/**
	 * Register a widget category and move the category to top in the elementor widget panel.
	 *
	 * @param \Elementor\Elements_Manager $elements_manager
	 * @return void
	 */
	public function register_category_order_to_top( \Elementor\Elements_Manager $elements_manager ) {
		//add our categories
		$category_prefix = 'elite-kit-';
		$prefix_length   = strlen( $category_prefix );

		$elements_manager->add_category(
			$category_prefix . 'widgets',
			array(
				'title' => __( 'Elite Kit Widgets', 'elite-kit' ),
				'icon'  => 'fa fa-plug',
			)
		);

		$reorder_cats = function () use ( $category_prefix, $prefix_length ) {
			uksort(
				$this->categories,
				function ( $key_one, $key_two ) use ( $category_prefix, $prefix_length ) {
					if ( substr( $key_one, 0, $prefix_length ) == $category_prefix ) {
						return -1;
					}
					if ( substr( $key_two, 0, $prefix_length ) == $category_prefix ) {
						return 1;
					}
					return 0;
				}
			);
		};

		$reorder_cats->call( $elements_manager );
	}


	/**
	 * Register custom styles after rendering elementor widget
	 *
	 */
	public function enqueue_widget_styles() {
		wp_enqueue_style( 'elite-kit-main', plugins_url( 'assets/css/main.css', __FILE__ ), array(), self::VERSION );
		wp_enqueue_style( 'elite-kit-widget', plugins_url( 'assets/css/widget.css', __FILE__ ), array(), self::VERSION );
	}


	/**
	 * Register Widget Scripts
	 *
	 * Register custom scripts required to run the plugin.
	 *
	 * @access public
	 */
	public function register_widget_scripts() {
		wp_enqueue_style( 'elite-kit-elementor-editor', plugins_url( 'assets/css/elementor-editor.css', __FILE__ ) );

		// wp_register_script( 'ajax-chimp', plugins_url( 'assets/vendors/ajax-chimp/ajax-chimp.js', __FILE__ ), array( 'jquery' ), '1.0.0', true ),
	}

	/**
	 * Register New Widgets
	 */
	public function on_widgets_registered() {
		$this->include_widgets();
		$this->register_widgets();
	}

	private function include_widgets() {
		require_once __DIR__ . '/widgets/Team.php';
	}

	/**
	 * Register all elementor widgets.
	 */
	private function register_widgets() {
		$widgets = array(
			'Team',
		);

		foreach ( $widgets as $widget ) {
			$classname = "\EliteKit\Widgets\\$widget";
			\Elementor\Plugin::instance()->widgets_manager->register( new $classname() );
		}
	}
}

/**
 * Main instance of Elite_Kit.
 */
function elite_kit_kickoff() {
	return Elite_Kit::instance();
}

// Run the plugin.
elite_kit_kickoff();

// TODO: Add tailwindcss, configure .gitignore file
// TODO: Finish the team widget, use 2/3 styles for team
// TODO: Use 2/3 hero sections
// TODO: Use 2/3 blog sections
// TODO: Finish readme.txt @arafat
// TODO: Upload the plugin @arafat
