<?php
  $data = json_decode(stripslashes($data));
  $id = $data->id;
  $title = $data->title;
  $formatId = intval($data->formatId);
  $options = serialize($data->options);
  $dataSource = serialize($data->dataSource);
  $user_id = get_current_user_id();
  $date = date('Y-m-d H:i:s');

  $out = array(
    'title' => $title,
    'options' => $options,
    'dataSource' => $dataSource,
    'user_id' => $user_id,
    'created_at' => $date,
    'updated_at' => $date,
    'formatId' => $formatId
  );
  if(isset($id) && $id !== ''){
    $out['id'] = $id;
  }
  return $out;
