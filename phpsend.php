<?php
/*
Plugin Name: sFTP sending file via ssh2_scp_send
Plugin URI: https://decom.ba
Description: send CSV file over PHP
Version: 17.0.0
Author: Decom
Author URI: https://decom.ba
Text Domain: language..
Domain Path: /languages
*/

/*
* @ssh2_connect http://php.net/manual/en/function.ssh2-connect.php
* @ssh2_auth_password http://php.net/manual/en/function.ssh2-auth-password.php
* @ssh2_scp_send http://php.net/manual/en/function.ssh2-scp-send.php
*/

$profile = array(
	'server' => 'domain.tld',
	'username' => 'username',
	'password' => 'password'
);

// plugin folder and in this folder there is test.csv
$dir = plugin_dir_path( __FILE__ );
//place where we will put file (you can change name)
$remote_dir = '/usr/www/users/USERNAME/foldername/';

$conn_id = @ssh2_connect($profile['server'], 222);
ssh2_auth_password($conn_id, $profile['username'], $profile['password']);

//conn_id is connection
//2nd is REAL location and REAL file
//3rd is REMOTE location, and NAME of a file (can change name..)
ssh2_scp_send($conn_id, $dir . '/test.csv', $remote_dir . '/test1.csv' , 0644);
ssh2_exec($conn_id, 'exit;');

