<?php
  extract( shortcode_atts(
    array(
      'id' => 'null'
    ), $atts )
  );

  global $wpdb; 
  $table_name = $wpdb->prefix . 'supercharts';
  $chart = $wpdb->get_row("SELECT * FROM $table_name WHERE id = $id");

  if($chart){
    $json_chart = json_encode($this->deserialize_chart($chart));

    $echo = <<<SCRIPT

<div id="chartContainer-$chart->id"></div>

<script type="text/javascript">

jQuery(window).load(function () {
  var helpers = window.supercharts.helpers,
    model = new Backbone.Model($json_chart),
    options = helpers.getOptions(model);
  console.log(options);
  switch(model.get('formatId')){
    case 1: 
    case 3:
    case 4:
    case 5:
    case 6:
    case 7:
    case '1': 
    case '3':
    case '4':
    case '5':
    case '6':
    case '7':
      jQuery("#chartContainer-$chart->id").dxChart(helpers.getOptions(model));
      var chart = jQuery("#chartContainer-$chart->id").dxChart("instance");
      break;
    case 2:
    case '2':
      jQuery("#chartContainer-$chart->id").dxPieChart(helpers.getOptions(model));
      var chart = jQuery("#chartContainer-$chart->id").dxPieChart("instance");
      break;
  }
  jQuery(window).resize(function(){
    chart.beginUpdate();
    chart.endUpdate();
  });
});

</script>

SCRIPT;

    return $echo;
  }
