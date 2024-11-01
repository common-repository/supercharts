<?php
  add_action( "wp_enqueue_scripts", array($this, "load_front_scripts" ));
  add_action( "admin_enqueue_scripts", array($this, "load_front_scripts" ));
  add_action( "admin_enqueue_scripts", array($this, "load_admin_scripts" ));

  add_action( 'wp_enqueue_scripts', array($this, 'load_front_styles' ));
  add_action( 'admin_enqueue_scripts', array($this, 'load_front_styles' ));
  add_action( 'admin_enqueue_scripts', array($this, 'load_admin_styles' ));

  add_action('admin_menu', array($this, 'admin_menu'));
  add_action('admin_init', array($this, 'register_option'));
  add_action('admin_init', array($this, 'activate_license'));

  add_shortcode( 'superchart', array($this, 'shortcode' ));
