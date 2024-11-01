<?php
  global $wpdb;
  global $supercharts_db_version;

  $table_name = $wpdb->prefix . "supercharts";
      
  $sql = "CREATE TABLE $table_name (
  id mediumint(9) NOT NULL AUTO_INCREMENT,
  created_at datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
  updated_at datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
  title tinytext,
  options text,
  dataSource text,
  formatId mediumint(9) DEFAULT 1 NOT NULL,
  user_id mediumint(9),
  UNIQUE KEY id (id)
  );";

  require_once( ABSPATH . 'wp-admin/includes/upgrade.php');
  dbDelta($sql);
 
  add_option("supercharts_db_version", $supercharts_db_version);
