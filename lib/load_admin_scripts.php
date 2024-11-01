<?php
  wp_enqueue_script('jquery'); 
  wp_enqueue_script('jquery-ui-core'); 
  wp_enqueue_script('jquery-ui-widget'); 
  wp_enqueue_script('jquery-ui-mouse'); 
  wp_enqueue_script('jquery-ui-position'); 
  wp_enqueue_script('jquery-ui-draggable'); 
  wp_enqueue_script('jquery-ui-resizable'); 
  wp_enqueue_script('jquery-ui-button'); 
  wp_enqueue_script('jquery-ui-dialog');
  wp_enqueue_script('jquery-ui-tabs');

  wp_register_script( 
    'handsontable', 
    plugins_url('/scripts/lib/jquery-handsontable/dist/jquery.handsontable.js', dirname(__FILE__)), 
    array('jquery')
  );
  
  wp_register_script( 
    'marionette', 
    plugins_url('/scripts/lib/backbone.marionette.min.js', dirname(__FILE__)), 
    array('underscore', 'backbone')
  );
  
  wp_register_script( 
    'superchart-basic-options', 
    plugins_url('/scripts/js/options/basics.min.js', dirname(__FILE__)), 
    array('superchart-presets')
  );
  
  wp_register_script( 
    'superchart-wizard', 
    plugins_url('/scripts/js/wizard.min.js', dirname(__FILE__)), 
    array(
      'jquery',
      'marionette', 
      'underscore', 
      'backbone', 
      'superchart-formats', 
      'globalize', 
      'chartjs', 
      'handsontable', 
      'superchart-helpers', 
      'superchart-basic-options',
      'superchart-presets',
      'superchart-palettes',
      'superchart-fontCombinations'
    )
  );
  wp_enqueue_script('superchart-wizard');
