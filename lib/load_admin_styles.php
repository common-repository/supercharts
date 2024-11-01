<?php
  wp_register_style( 'jquery-ui-smoothness', plugins_url('/styles/lib/jquery-ui.min.css', dirname(__FILE__)));
  wp_enqueue_style('jquery-ui-smoothness');

  wp_register_style( 'handsontable', plugins_url('/scripts/lib/jquery-handsontable/dist/jquery.handsontable.css', dirname(__FILE__)));
  wp_enqueue_style('handsontable');

  wp_register_style( 'open-sans', 'http://fonts.googleapis.com/css?family=Open+Sans:300italic,800italic,400,800&subset=latin,cyrillic');
  wp_enqueue_style( 'open-sans' );

  wp_register_style( 'lato', 'http://fonts.googleapis.com/css?family=Lato:300,400,900&subset=latin,cyrillic');
  wp_enqueue_style( 'lato' );

  wp_register_style( 'ubuntu', 'http://fonts.googleapis.com/css?family=Ubuntu:500&subset=latin,cyrillic');
  wp_enqueue_style( 'ubuntu' );

  wp_register_style( 'arvo', 'http://fonts.googleapis.com/css?family=Arvo:400,700&subset=latin,cyrillic');
  wp_enqueue_style( 'arvo' );

  wp_register_style( 'raleway', 'http://fonts.googleapis.com/css?family=Raleway:300&subset=latin,cyrillic');
  wp_enqueue_style( 'raleway' );

  wp_register_style( 'supercharts-admin', plugins_url('/styles/css/supercharts-admin.css', dirname(__FILE__)));
  wp_enqueue_style( 'supercharts-admin' );
