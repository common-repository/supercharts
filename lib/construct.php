<?php
  register_activation_hook(dirname(__FILE__), array($this, 'install_db'));
  register_deactivation_hook( dirname(__FILE__), array($this, 'deactivate') );
  
  add_action( 'pre_get_posts', array($this, 'crud') );
  add_action('init', array($this, 'init'));
  add_action('init', array($this, 'button_init'));

  add_filter( 'query_vars', array($this, 'query_vars') );
