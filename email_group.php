
<?php

/**
* Plugin Name: Groups learndash
* Plugin URI:https://www.selvatek.com
* Description: Groups learndash
* Author: Antoine Serin
* Author URI: https://www.selvatek.com
* Text Domain: groups
* Domain Path: /languages
*/


function wpdocs_register_my_custom_menu_page_mail(){
    add_menu_page( 
        __( 'Custom Menu Title', 'textdomain' ),
        'Formations',
        'manage_options',
        'utilisateurs dans groupe',
        'my_custom_menu_page_mail',
        'dashicons-groups',
        48
    ); 
}
add_action( 'admin_menu', 'wpdocs_register_my_custom_menu_page_mail' );
 
/**
 * Display a custom menu page
 */
function my_custom_menu_page_mail(){
    
    echo '<div id="wpbody-content"><div class="wrap"> <h1 class="wp-heading-inline">
Groups Learndash</h1></div></div>';  
    echo '<br>';
    $argsseries = array(
        'name' => 'seriestv',
    );
    $post_types = get_post_types( $argsseries, 'objects' );
 
    foreach ( $post_types  as $post_type ) {
       echo '<p>Custom Post Type name: ' . $post_type->name . "<br />\n";
       echo 'Single name: ' . $post_type->labels->singular_name . "<br />\n";
       echo 'Menu icon URL: ' . $post_type->menu_icon . "</p>\n";;
    }
    
    $posts = get_posts([
        'post_type' => 'seriestv',
        'post_status' => 'publish',
        'numberposts' => -1
        // 'order'    => 'ASC'
      ]);
      foreach ( $posts as $post) {
       

        $content = apply_filters('the_content', $post->post_content);
        echo $content;
        echo '<p>Custom Post name: ' . $post->ID . "<br />\n";
        echo get_the_title($post->ID);
       
     }
    echo '<form method="POST"><select name="myselect"> ';
   $groups = learndash_get_groups(1);
   
   foreach($groups as $groups){
    $groupName = get_the_title($groups);
//    echo $groupName . '<br>'; 
   echo '<option value="'.$groups.'">'.$groupName.'</option>'; 
 
}
echo '</select><input name"submit" type="submit" value="Submit"></form>';
if (isset($_POST['myselect'])) {
    echo ($_POST['myselect']);
    $sendgroups = ($_POST['myselect']);
    echo '$sendgroups: ' . $sendgroups . '<br>';
    send_to_group($sendgroups);
}

}
function send_to_group($group){
$user = 0;
$user = learndash_get_groups_user_ids($group);
echo '<br>' . $group;
foreach($user as $user){
    
    $userData = get_user_by('id', $user);
    
    // variables pour l'envoie d'email
    $to = $userData->user_email;
    $message = "test";
    $subject = "Some text in subject...";
    $headers = 'From: '. 'contact@hydronomie.fr' . "\r\n" .
    'Reply-To: ' . 'contact@hydronomie.fr' . "\r\n";


//Here put your Validation and send mail
$sent = wp_mail($to, $subject, $message, $headers);
   if($sent) {
   echo 'Envoy?? a: ' . $userData->first_name . ' ' . $userData->last_name . ' (' . $userData->user_email . ')' . '<br />'; 
   }//message sent!
   else  {
    echo 'Erreur Envoi: ' . $userData->first_name . ' ' . $userData->last_name . ' (' . $userData->user_email . ')' . '<br />';
   }//message wasn't sent
}}