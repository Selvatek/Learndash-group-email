<?php

/**
* Plugin Name: send email to learndash groups
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
    echo '<h2>Letter Templates <a href="admin.php?page=letter-template&type=new">Add New</a></h2>';
//     echo '<div id="wpbody-content"><div class="wrap"> <h1 class="wp-heading-inline">
// Groups Learndash</h1></div></div>';  
//     echo '<br>';
//     $user = learndash_get_groups_user_ids("2633");
//     foreach($user as $user){
//     	$userData = get_user_by('id', $user);
        
//         // variables pour l'envoie d'email
//         $to = $userData->user_email;
//         $message = "test";
//         $subject = "Some text in subject...";
//         $headers = 'From: '. 'contact@hydronomie.fr' . "\r\n" .
//         'Reply-To: ' . 'contact@hydronomie.fr' . "\r\n";
   
 
//  //Here put your Validation and send mail
//  $sent = wp_mail($to, $subject, $message, $headers);
//        if($sent) {
//        echo 'Envoyé a: ' . $userData->first_name . ' ' . $userData->last_name . ' (' . $userData->user_email . ')' . '<br />'; 
//        }//message sent!
//        else  {
//         echo 'Erreur Envoi: ' . $userData->first_name . ' ' . $userData->last_name . ' (' . $userData->user_email . ')' . '<br />';
//        }//message wasn't sent
       
// }
}

 