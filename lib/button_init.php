<?php
  //Abort early if the user will never see TinyMCE
  if ( ! current_user_can('edit_posts') 
    && ! current_user_can('edit_pages') 
    && get_user_option('rich_editing') == 'true'
  )
       return;

  //Add a callback to regiser our tinymce plugin   
  add_filter("mce_external_plugins", array($this, "register_tinymce_plugin")); 

  // Add a callback to add our button to the TinyMCE toolbar
  add_filter('mce_buttons', array($this, 'add_tinymce_button'));
