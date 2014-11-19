<?php
/*
Random Syndicated Post Picker
Use on page to send viewer to random post optionally, within category

*/

// define slug for default category if none provided
$default_category = 'splots';

// set arguments for WP_Query on published posts to get 1 at random
$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 1,
    'category_name' => $default_category,
    'orderby' => 'rand'
);

// It's time! Go get a random post from the database
$my_random_post = new WP_Query ( $args );

while ( $my_random_post->have_posts () ) {
  $my_random_post->the_post ();
  
  // redirect to the random post
  wp_redirect ( get_permalink () );
  exit;
}
?>