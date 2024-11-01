<?php
  global $wpdb;
  $table_name = $wpdb->prefix . 'supercharts';

  if($query->get( 'supercharts' )){
    $method = $_POST['backbone_method'];
    
    if($method === 'create'){
      $this->check_is_admin();
      $post = $this->get_post_vars($_POST['content']);

      $result = $wpdb->insert(
        $table_name,
        $post
      );

      if($result){
        $chart = $wpdb->get_row("SELECT * FROM $table_name WHERE id = $wpdb->insert_id");
        echo json_encode($this->deserialize_chart($chart));
      } else {
        echo json_encode(array('status' => 500, 'message' => 'Oops, something went wrong!'));
      }
    } 
    
    // else if ($method === 'GET'){
    //   // $this->check_is_admin();
    //   $id = $query->get( 'id' );
    //   if(isset($id) && $id !== ''){
    //     $chart = $wpdb->get_row("SELECT * FROM $table_name WHERE id = $id");
    //     echo json_encode($this->deserialize_chart($chart));
    //   } else {
    //     $querystr = "
    //       SELECT * 
    //       FROM $table_name
    //       ORDER BY updated_at DESC
    //     ";
    //       // AND $wpdb->supercharts.user_id = $user_id 
    //     $results = $wpdb->get_results($querystr, OBJECT);
    //     foreach($results as $result){
    //       $result = $this->deserialize_chart($result);
    //     }
    //     echo json_encode($results);
    //   }

    // } 

    else if ($method === 'update'){
      $this->check_is_admin();
      $post = $this->get_post_vars($_POST['content']);
      
      if(isset($post['id'])){
        $id = $post['id'];
        $result = $wpdb->update(
          $table_name,
          $post,
          array('id' => $id)
        );

        if($result){
          $chart = $wpdb->get_row("SELECT * FROM $table_name WHERE id = $id");
          echo json_encode($chart);
        } else {
          echo json_encode(array('status' => 500, 'message' => 'Oops, something went wrong!'));
        }
      } else {
        echo json_encode(array('status' => 404, 'message' => 'No id.'));
      }
    } 

    // else if ($method === 'DELETE'){
    //   $this->check_is_admin();
    //   $id = $query->delete( 'id' );
    //   if(isset($id)){
    //     $result = $wpdb->delete( 
    //       $table_name, 
    //       array('id', $id)
    //     );
    //     if(!$result){
    //       echo json_encode(array('status' => 500, 'message' => 'Oops, something went wrong!'));
    //     }
    //   } else {
    //     echo json_encode(array('status' => 404, 'message' => 'No id.'));
    //   }
    // }
    exit;
  }

