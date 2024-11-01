<?php
  $is_admin = current_user_can('edit_posts');
  if(!$is_admin){
    echo json_encode(array('status' => 403, 'message' => 'You are not authorized to perform this action.'));
    exit;
  }
