<?php 
  /*
  Plugin Name: SuperCharts by NumberPicture
  Plugin URI: http://wordpress.org/plugins/supercharts/
  Description: Plugin for creating beautiful custom charts
  Author: Finn Fitzsimons
  Version: 1.1.7
  Author URI: https://github.com/finnfiddle
  */

  global $supercharts_db_version;
  $supercharts_db_version = "1.0";
  define('SUPERCHARTS_PATH', dirname(__FILE__) .'/');

  class Supercharts{

    function __construct() {
      require 'lib/construct.php';
    } 

    function init() {
      require 'lib/init.php';
    }

    function deactivate() {
      global $wp_rewrite; $wp_rewrite->flush_rules();
    }
   
    function query_vars($public_query_vars){
      array_push($public_query_vars, 'supercharts');
      array_push($public_query_vars, 'id');
      return $public_query_vars;
    }

    function load_front_scripts(){
      require 'lib/load_front_scripts.php';
    }

    function load_admin_scripts(){
      require 'lib/load_admin_scripts.php';
    }

    function load_front_styles() {
      require 'lib/load_front_styles.php';
    }

    function load_admin_styles() {
      require 'lib/load_admin_styles.php';
    }

    function shortcode( $atts ) {
      return require 'lib/shortcode.php';
    }

    function button_init() { 
      require 'lib/button_init.php';
    }

    function register_tinymce_plugin($plugin_array) {
      return require 'lib/register_tinymce_plugin.php';
    }

    function add_tinymce_button($buttons) {
      return require 'lib/add_tinymce_button.php';
    }

    function install_db() {
      require 'lib/install_db.php';
    }

    private function check_is_admin()
    {
      require 'lib/check_is_admin.php';
    }

    private function get_post_vars($data){
      return require 'lib/get_post_vars.php';
    }

    function deserialize_chart($data){
      return require 'lib/deserialize_chart.php';
    }

    function crud( $query ) {
      require 'lib/crud.php';
    }

    private function is_premium(){
      $status = get_option( 'supercharts_license_status' );
      $status = "premium";
      if($status == "premium"){
        return true;
      } else {
        return false;
      }
    }

    function admin_menu() {
      add_options_page( 
        'SuperCharts', 
        'SuperCharts', 
        'manage_options', 
        'supercharts', 
        'supercharts_admin_page'
      );

      function admin_page() {
        $license  = get_option( 'supercharts_license_key' );
        $status   = get_option( 'supercharts_license_status' );
        ?>
        <div class="wrap">
          <h2><?php _e('Plugin License Options'); ?></h2>
          <form method="post" action="options.php"> 
          
            <?php settings_fields('supercharts_license'); ?>
            
            <table class="form-table">
              <tbody>
                <tr valign="top"> 
                  <th scope="row" valign="top">
                    <?php _e('License Key'); ?>
                  </th>
                  <td>
                    <input id="supercharts_license_key" name="supercharts_license_key" type="text" class="regular-text" value="<?php esc_attr_e( $license ); ?>" />
                    <label class="description" for="supercharts_license_key"><?php _e('Enter your license key'); ?></label>
                  </td>
                </tr>
                <?php if( false !== $license ) { ?>
                  <tr valign="top"> 
                    <th scope="row" valign="top">
                      <?php _e('Activate License'); ?>
                    </th>
                    <td>
                      <?php if( $status !== false && $status == 'valid' ) { ?>
                        <span style="color:green;"><?php _e('active'); ?></span>
                      <?php } else {
                        wp_nonce_field( 'supercharts_nonce', 'supercharts_nonce' ); ?>
                        <input type="submit" class="button-secondary" name="supercharts_license_activate" value="<?php _e('Activate License'); ?>"/>
                      <?php } ?>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>  
            <?php submit_button(); ?>
          
          </form>
        <?php
      }
    }


    function register_option() {
      // creates our settings in the options table
      register_setting('supercharts_license', 'supercharts_license_key', 'supercharts_sanitize_license' );
    }

    function sanitize_license( $new ) {
      $old = get_option( 'supercharts_license_key' );
      if( $old && $old != $new ) {
        delete_option( 'supercharts_license_status' ); // new license has been entered, so must reactivate
      }
      return $new;
    }

    function activate_license() {

      // listen for our activate button to be clicked
      if( isset( $_POST['supercharts_license_activate'] ) ) {

        // run a quick security check 
        if( ! check_admin_referer( 'supercharts_nonce', 'supercharts_nonce' ) )   
          return; // get out if we didn't click the Activate button

        // retrieve the license from the database
        $license = trim( get_option( 'supercharts_license_key' ) );
          

        // data to send in our API request
        $api_params = array( 
          // 'supercharts_action'=> 'activate_license', 
          // 'license'   => $license, 
          // 'item_name' => urlencode( EDD_SL_ITEM_NAME ),
          'url'       => home_url()
        );
        
        // Call the custom API.
        $response = wp_remote_get( add_query_arg( $api_params, "http://api.numberpicture.com" ) );
        $response = wp_remote_get("http://api.numberpicture.com");
        echo '<pre>';
        print_r($response);
        echo '</pre>';
        exit;

        // make sure the response came back okay
        if ( is_wp_error( $response ) )
          return false;

        // decode the license data
        $license_data = json_decode( wp_remote_retrieve_body( $response ) );
        
        // $license_data->license will be either "active" or "inactive"

        update_option( 'supercharts_license_status', $license_data->license );

      }
    }

  }
  $Supercharts = new Supercharts();
?>
