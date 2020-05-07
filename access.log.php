<?php
	
/*
Plugin Name: WP Log Analytics
Plugin URI: http://causingdesignscom.kinsta.cloud/
Description: Similar to nginx access log where it get get the IP, user-agent, access path and display analytics chart.
Author: John Mark Causing
Author URI:  http://causingdesignscom.kinsta.cloud/
*/


add_action( 'init', 'start_logging' );

function start_logging() {


    // GET IP
    if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {
    //check ip from share internet
    $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
    //to check ip is pass from proxy
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
    $ip = $_SERVER['REMOTE_ADDR'];
    }

    // get user agent
    $user_agent = $_SERVER['HTTP_USER_AGENT']; 

    // get current path
    $pagePath = parse_url( $_SERVER['REQUEST_URI'] ); // returns an array. ex:  'path' => string '/new/' (length=5)
    $pagePath = $pagePath['path']; // returns the path. ex: /wp-admin/themes.php
    //  $pagePath = substr($pagePath, 1, -1);//remove slashes
  


    echo "Your IP: " . $ip . "<br>";

    echo "User agent: " . $user_agent . "<br>";

    echo "Your current path: " . $pagePath . "<br>";


 

 }