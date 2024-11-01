<?php
  $new_data = $data;
  $new_data->options = unserialize($data->options);
  $new_data->dataSource = unserialize($data->dataSource);
  return $new_data;

