<?php
/**
 * Plugin Name: SwaziLegal Chatbot
 * Plugin URI: https://swazilegal.sz
 * Description: Add an AI-powered chatbot to your SwaziLegal website
 * Version: 1.0.0
 * Author: SwaziLegal
 * Author URI: https://swazilegal.sz
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: swazilegal-chatbot
 * Domain Path: /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Main Plugin Class
 */
class SwaziLegal_Chatbot {
    
    private static $instance = null;
    
    public static function get_instance() {
        if ( null === self::$instance ) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function __construct() {
        $this->init_hooks();
    }
    
    private function init_hooks() {
        // Admin menu
        add_action( 'admin_menu', array( $this, 'add_admin_menu' ) );
        
        // Register settings
        add_action( 'admin_init', array( $this, 'register_settings' ) );
        
        // Enqueue styles and scripts
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_chatbot_scripts' ) );
        
        // Add chatbot to frontend
        add_action( 'wp_footer', array( $this, 'render_chatbot' ) );
    }
    
    /**
     * Add Admin Menu
     */
    public function add_admin_menu() {
        add_menu_page(
            'SwaziLegal Chatbot',
            'Chatbot',
            'manage_options',
            'swazilegal-chatbot',
            array( $this, 'render_admin_page' ),
            'dashicons-format-chat',
            90
        );
    }
    
    /**
     * Register Settings
     */
    public function register_settings() {
        register_setting( 'swazilegal_chatbot_settings', 'swazilegal_chatbot_settings' );
        
        add_settings_section(
            'swazilegal_chatbot_main',
            'Chatbot Settings',
            array( $this, 'render_settings_section' ),
            'swazilegal_chatbot_settings'
        );
        
        add_settings_field(
            'chatbot_type',
            'Chatbot Type',
            array( $this, 'render_chatbot_type_field' ),
            'swazilegal_chatbot_settings',
            'swazilegal_chatbot_main'
        );
        
        add_settings_field(
            'chatbot_enabled',
            'Enable Chatbot',
            array( $this, 'render_enabled_field' ),
            'swazilegal_chatbot_settings',
            'swazilegal_chatbot_main'
        );
        
        add_settings_field(
            'drift_id',
            'Drift ID',
            array( $this, 'render_drift_id_field' ),
            'swazilegal_chatbot_settings',
            'swazilegal_chatbot_main'
        );
        
        add_settings_field(
            'botpress_bot_id',
            'Botpress Bot ID',
            array( $this, 'render_botpress_id_field' ),
            'swazilegal_chatbot_settings',
            'swazilegal_chatbot_main'
        );
        
        add_settings_field(
            'intercom_app_id',
            'Intercom App ID',
            array( $this, 'render_intercom_id_field' ),
            'swazilegal_chatbot_settings',
            'swazilegal_chatbot_main'
        );
        
        add_settings_field(
            'custom_chatbot_enabled',
            'Use Custom Chatbot',
            array( $this, 'render_custom_chatbot_field' ),
            'swazilegal_chatbot_settings',
            'swazilegal_chatbot_main'
        );
    }
    
    /**
     * Render Settings Section
     */
    public function render_settings_section() {
        echo '<p>Configure your chatbot settings below. Choose between third-party services or use the built-in custom chatbot.</p>';
    }
    
    /**
     * Render Chatbot Type Field
     */
    public function render_chatbot_type_field() {
        $settings = get_option( 'swazilegal_chatbot_settings', array() );
        $type = isset( $settings['chatbot_type'] ) ? $settings['chatbot_type'] : 'drift';
        ?>
        <select name="swazilegal_chatbot_settings[chatbot_type]">
            <option value="drift" <?php selected( $type, 'drift' ); ?>>Drift</option>
            <option value="botpress" <?php selected( $type, 'botpress' ); ?>>Botpress</option>
            <option value="intercom" <?php selected( $type, 'intercom' ); ?>>Intercom</option>
            <option value="custom" <?php selected( $type, 'custom' ); ?>>Custom Chatbot</option>
        </select>
        <?php
    }
    
    /**
     * Render Enabled Field
     */
    public function render_enabled_field() {
        $settings = get_option( 'swazilegal_chatbot_settings', array() );
        $enabled = isset( $settings['enabled'] ) ? $settings['enabled'] : 1;
        ?>
        <input type="checkbox" name="swazilegal_chatbot_settings[enabled]" value="1" <?php checked( $enabled, 1 ); ?> />
        <label>Enable chatbot on all pages</label>
        <?php
    }
    
    /**
     * Render Drift ID Field
     */
    public function render_drift_id_field() {
        $settings = get_option( 'swazilegal_chatbot_settings', array() );
        $drift_id = isset( $settings['drift_id'] ) ? sanitize_text_field( $settings['drift_id'] ) : '';
        ?>
        <input type="text" name="swazilegal_chatbot_settings[drift_id]" value="<?php echo esc_attr( $drift_id ); ?>" placeholder="Your Drift ID" size="40" />
        <p class="description">Get your Drift ID from your Drift dashboard</p>
        <?php
    }
    
    /**
     * Render Botpress Bot ID Field
     */
    public function render_botpress_id_field() {
        $settings = get_option( 'swazilegal_chatbot_settings', array() );
        $bot_id = isset( $settings['botpress_bot_id'] ) ? sanitize_text_field( $settings['botpress_bot_id'] ) : '';
        ?>
        <input type="text" name="swazilegal_chatbot_settings[botpress_bot_id]" value="<?php echo esc_attr( $bot_id ); ?>" placeholder="Your Botpress Bot ID" size="40" />
        <p class="description">Get your Bot ID from your Botpress dashboard</p>
        <?php
    }
    
    /**
     * Render Intercom App ID Field
     */
    public function render_intercom_id_field() {
        $settings = get_option( 'swazilegal_chatbot_settings', array() );
        $app_id = isset( $settings['intercom_app_id'] ) ? sanitize_text_field( $settings['intercom_app_id'] ) : '';
        ?>
        <input type="text" name="swazilegal_chatbot_settings[intercom_app_id]" value="<?php echo esc_attr( $app_id ); ?>" placeholder="Your Intercom App ID" size="40" />
        <p class="description">Get your App ID from your Intercom dashboard</p>
        <?php
    }
    
    /**
     * Render Custom Chatbot Field
     */
    public function render_custom_chatbot_field() {
        $settings = get_option( 'swazilegal_chatbot_settings', array() );
        $custom_enabled = isset( $settings['custom_chatbot_enabled'] ) ? $settings['custom_chatbot_enabled'] : 0;
        ?>
        <input type="checkbox" name="swazilegal_chatbot_settings[custom_chatbot_enabled]" value="1" <?php checked( $custom_enabled, 1 ); ?> />
        <label>Use built-in custom chatbot</label>
        <?php
    }
    
    /**
     * Render Admin Page
     */
    public function render_admin_page() {
        ?>
        <div class="wrap">
            <h1>SwaziLegal Chatbot Settings</h1>
            
            <div style="background: #e3f2fd; border-left: 4px solid #0d47a1; padding: 15px; margin-bottom: 20px; border-radius: 4px;">
                <p><strong>Welcome to SwaziLegal Chatbot!</strong></p>
                <p>This plugin adds an AI-powered chatbot to your website. Choose your preferred chatbot service below and enter your API credentials.</p>
            </div>
            
            <form method="post" action="options.php">
                <?php
                settings_fields( 'swazilegal_chatbot_settings' );
                do_settings_sections( 'swazilegal_chatbot_settings' );
                submit_button();
                ?>
            </form>
            
            <hr style="margin-top: 40px;">
            
            <h2>Quick Start Guide</h2>
            
            <h3>Option 1: Drift (Recommended)</h3>
            <ol>
                <li>Go to <a href="https://drift.com" target="_blank">drift.com</a></li>
                <li>Create a free account</li>
                <li>Copy your Drift ID from the dashboard</li>
                <li>Paste it in the "Drift ID" field above</li>
                <li>Click "Save Changes"</li>
            </ol>
            
            <h3>Option 2: Botpress</h3>
            <ol>
                <li>Go to <a href="https://botpress.com" target="_blank">botpress.com</a></li>
                <li>Create a free account and build your bot</li>
                <li>Copy your Bot ID</li>
                <li>Paste it in the "Botpress Bot ID" field above</li>
                <li>Click "Save Changes"</li>
            </ol>
            
            <h3>Option 3: Intercom</h3>
            <ol>
                <li>Go to <a href="https://intercom.com" target="_blank">intercom.com</a></li>
                <li>Create a free account</li>
                <li>Copy your App ID</li>
                <li>Paste it in the "Intercom App ID" field above</li>
                <li>Click "Save Changes"</li>
            </ol>
            
            <h3>Option 4: Built-in Custom Chatbot</h3>
            <ol>
                <li>Check "Use built-in custom chatbot"</li>
                <li>Click "Save Changes"</li>
                <li>The chatbot will appear on all pages with basic FAQ functionality</li>
            </ol>
            
            <div style="background: #f0f0f0; padding: 15px; margin-top: 20px; border-radius: 4px;">
                <h3>Support</h3>
                <p>For help, visit <a href="https://swazilegal.sz" target="_blank">swazilegal.sz</a> or check the <a href="https://swazilegal.sz/chatbot-integration.html" target="_blank">Chatbot Integration Guide</a></p>
            </div>
        </div>
        <?php
    }
    
    /**
     * Enqueue Chatbot Scripts
     */
    public function enqueue_chatbot_scripts() {
        if ( is_admin() ) {
            return;
        }
        
        $settings = get_option( 'swazilegal_chatbot_settings', array() );
        
        if ( ! isset( $settings['enabled'] ) || ! $settings['enabled'] ) {
            return;
        }
        
        // For custom chatbot, enqueue CSS
        if ( isset( $settings['custom_chatbot_enabled'] ) && $settings['custom_chatbot_enabled'] ) {
            wp_enqueue_style( 'swazilegal-chatbot-style', plugin_dir_url( __FILE__ ) . 'css/chatbot.css', array(), '1.0.0' );
            wp_enqueue_script( 'swazilegal-chatbot-script', plugin_dir_url( __FILE__ ) . 'js/chatbot.js', array(), '1.0.0', true );
        }
    }
    
    /**
     * Render Chatbot
     */
    public function render_chatbot() {
        if ( is_admin() ) {
            return;
        }
        
        $settings = get_option( 'swazilegal_chatbot_settings', array() );
        
        if ( ! isset( $settings['enabled'] ) || ! $settings['enabled'] ) {
            return;
        }
        
        $type = isset( $settings['chatbot_type'] ) ? $settings['chatbot_type'] : 'drift';
        
        switch ( $type ) {
            case 'drift':
                $this->render_drift_chatbot( $settings );
                break;
            case 'botpress':
                $this->render_botpress_chatbot( $settings );
                break;
            case 'intercom':
                $this->render_intercom_chatbot( $settings );
                break;
            case 'custom':
                $this->render_custom_chatbot();
                break;
        }
    }
    
    /**
     * Render Drift Chatbot
     */
    private function render_drift_chatbot( $settings ) {
        if ( ! isset( $settings['drift_id'] ) || empty( $settings['drift_id'] ) ) {
            return;
        }
        
        $drift_id = sanitize_text_field( $settings['drift_id'] );
        ?>
        <script>
          !function() {
            var t = window.driftt = window.drift = window.drift || [], e = !1;
            if (!t.identify)
              return void (t.addLoad = function(n) {
                var a = document.createElement("script");
                a.async = !0, a.src = n, document.head.appendChild(a);
              });
            t.load("<?php echo esc_js( $drift_id ); ?>");
          }();
        </script>
        <?php
    }
    
    /**
     * Render Botpress Chatbot
     */
    private function render_botpress_chatbot( $settings ) {
        if ( ! isset( $settings['botpress_bot_id'] ) || empty( $settings['botpress_bot_id'] ) ) {
            return;
        }
        
        $bot_id = sanitize_text_field( $settings['botpress_bot_id'] );
        ?>
        <script src="https://cdn.botpress.cloud/webchat/v1/inject.js"></script>
        <script>
          window.botpressWebChat.init({
            botId: "<?php echo esc_js( $bot_id ); ?>",
            hostUrl: "https://cdn.botpress.cloud/webchat",
            messagingUrl: "https://messaging.botpress.cloud"
          });
        </script>
        <?php
    }
    
    /**
     * Render Intercom Chatbot
     */
    private function render_intercom_chatbot( $settings ) {
        if ( ! isset( $settings['intercom_app_id'] ) || empty( $settings['intercom_app_id'] ) ) {
            return;
        }
        
        $app_id = sanitize_text_field( $settings['intercom_app_id'] );
        ?>
        <script>
          window.intercomSettings = {
            api_base: "https://api-iam.intercom.io",
            app_id: "<?php echo esc_js( $app_id ); ?>"
          };
        </script>
        <script async>
          (function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');return;}var d=document;var i=function(){i.c(arguments)};i._.push=i;i._.loaded_apps=[];i.deferredLoadedApps=[];i.c=function(args){i._.push(args)};w.Intercom=i;function l(){if(!d.getElementById('IntercomAppShim')){var s=d.createElement('script');s.async=true;s.src='https://widget.intercom.io/widget/<?php echo esc_js( $app_id ); ?>';s.id='IntercomAppShim';d.body.appendChild(s);}}if(document.readyState==='loading'){d.addEventListener('DOMContentLoaded',l);}else{l();}})()
        </script>
        <?php
    }
    
    /**
     * Render Custom Chatbot
     */
    private function render_custom_chatbot() {
        ?>
        <div id="swazilegal-chatbot" class="chatbot-widget">
            <div class="chatbot-header">
                <h3>💬 SwaziLegal Assistant</h3>
                <button id="close-chatbot" class="close-btn">×</button>
            </div>
            <div id="chatbot-messages" class="chatbot-messages"></div>
            <div class="chatbot-input-area">
                <input type="text" id="chatbot-user-input" placeholder="Ask about our services..." />
                <button id="chatbot-send-btn" class="send-btn">Send</button>
            </div>
        </div>
        <?php
    }
}

// Initialize plugin
SwaziLegal_Chatbot::get_instance();
