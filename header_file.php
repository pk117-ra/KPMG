<?php
function clean($data)
{
    return filter_var($data,FILTER_UNSAFE_RAW);
}
	//session_name("team"); 
	ini_set("session.cookie_httponly", 1 );
	// ini_set("session.cookie_secure", 1);
	header( 'X-Powered-By: Treeone' );
	header( "X-Frame-Options: deny" );
	header( "X-Content-Type-Options:nosniff" );
	header( 'X-XSS-Protection: 1; mode=block' );
?>