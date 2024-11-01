<?php

  wp_register_script( 
    'superchart-presets', 
    plugins_url('scripts/js/data/presets.min.js', dirname(__FILE__))
  );

  wp_register_script( 
    'superchart-example-data', 
    plugins_url('/scripts/js/data/exampleData.min.js', dirname(__FILE__))
  ); 

  if($this->is_premium()){
    $premiumFormats = '/scripts/js/data/activePremiumFormats.min.js';
  } else {
    $premiumFormats = '/scripts/js/data/inactivePremiumFormats.min.js';
  }
  wp_register_script( 
    'superchart-premium-formats', 
    plugins_url($premiumFormats, dirname(__FILE__)), 
    array(
      'superchart-example-data'
    )
  );

  wp_register_script( 
    'superchart-formats', 
    plugins_url('/scripts/js/data/formats.min.js', dirname(__FILE__)), 
    array(
      'superchart-example-data',
      'superchart-premium-formats'
    )
  );

  wp_register_script( 
    'superchart-fontCombinations', 
    plugins_url('/scripts/js/data/fontCombinations.min.js', dirname(__FILE__))
  );

  wp_register_script( 
    'superchart-palettes', 
    plugins_url('/scripts/js/data/palettes.min.js', dirname(__FILE__))
  );

  wp_register_script( 
    'lodash', 
    plugins_url('/scripts/lib/lodash.min.js', dirname(__FILE__))
  );
  
  wp_register_script( 
    'cocktail', 
    plugins_url('/scripts/lib/Cocktail.min.js', dirname(__FILE__))
  );
  
  wp_register_script( 
    'superchart-helpers', 
    plugins_url('/scripts/js/helpers.min.js', dirname(__FILE__)), array(
      'jquery', 
      'cocktail',
      'lodash',
      'superchart-presets',
      'superchart-formats',
      'superchart-fontCombinations',
      'superchart-palettes'
    )
  );

  wp_localize_script('superchart-helpers', 'wpSuperchartsData', array(
    'base_url' => get_site_url(),
    'plugin_url' => plugins_url('', dirname(__FILE__))
  ));

  wp_register_script( 
    'globalize', 
    plugins_url('/scripts/lib/chartsjs/globalize.min.js', dirname(__FILE__))
  );

  wp_register_script( 
    'chartjs', 
    plugins_url('/scripts/lib/chartsjs/dx.chartjs.js', dirname(__FILE__))
  );


  wp_enqueue_script('jquery'); 
  wp_enqueue_script('backbone'); 
  wp_enqueue_script('superchart-presets'); 
  wp_enqueue_script('superchart-example-data'); 
  wp_enqueue_script('superchart-premium-formats'); 
  wp_enqueue_script('superchart-formats'); 
  wp_enqueue_script('superchart-fontCombinations'); 
  wp_enqueue_script('superchart-palettes'); 
  wp_enqueue_script('superchart-helpers'); 
  wp_enqueue_script( 'globalize' );
  wp_enqueue_script( 'chartjs' );
