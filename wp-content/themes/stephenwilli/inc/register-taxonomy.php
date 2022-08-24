<?php
//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_taxonomy', 0 );

//create a custom taxonomy name it topics for your posts

function create_taxonomy() {
  
//Series Taxonomy
  $labels = array(
    'name' => _x( 'Series', 'taxonomy general name' ),
    'singular_name' => _x( 'Series', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Series' ),
    'all_items' => __( 'All Series' ),
    'parent_item' => __( 'Parent Series' ),
    'parent_item_colon' => __( 'Parent Series:' ),
    'edit_item' => __( 'Edit Series' ),
    'update_item' => __( 'Update Series' ),
    'add_new_item' => __( 'Add New Series' ),
    'new_item_name' => __( 'New Series Name' ),
    'menu_name' => __( 'Series' ),
  );

// Now register the taxonomy
  register_taxonomy('series',array('photos'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'series' ),
  ));

//Locations Taxonomy
  $labels = array(
    'name' => _x( 'Locations', 'taxonomy general name' ),
    'singular_name' => _x( 'Location', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Locations' ),
    'all_items' => __( 'All Locations' ),
    'parent_item' => __( 'Parent Location' ),
    'parent_item_colon' => __( 'Parent Location:' ),
    'edit_item' => __( 'Edit Location' ),
    'update_item' => __( 'Update Location' ),
    'add_new_item' => __( 'Add New Location' ),
    'new_item_name' => __( 'New Location Name' ),
    'menu_name' => __( 'Locations' ),
  );

// Now register the taxonomy
  register_taxonomy('locations',array('photos'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'location' ),
  ));
  
  //Locations Taxonomy
    $labels = array(
      'name' => _x( 'Project Roles', 'taxonomy general name' ),
      'singular_name' => _x( 'Project Role', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Project Roles' ),
      'all_items' => __( 'All Project Roles' ),
      'parent_item' => __( 'Parent Project Role' ),
      'parent_item_colon' => __( 'Parent Project Role:' ),
      'edit_item' => __( 'Edit Project Role' ),
      'update_item' => __( 'Update Project Role' ),
      'add_new_item' => __( 'Add New Project Role' ),
      'new_item_name' => __( 'New Project Role Name' ),
      'menu_name' => __( 'Project Roles' ),
    );

  // Now register the taxonomy
    register_taxonomy('project-roles',array('projects'), array(
      'hierarchical' => true,
      'labels' => $labels,
      'show_ui' => true,
      'show_admin_column' => true,
      'query_var' => true,
      'rewrite' => array( 'slug' => 'project-roles' ),
    ));

}
?>