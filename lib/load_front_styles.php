<?php
  wp_register_style( 
    'supercharts-front', 
    plugins_url('/styles/css/supercharts-front.css', dirname(__FILE__))
  );
  wp_enqueue_style( 'supercharts-front' );
