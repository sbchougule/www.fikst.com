<?php
# Database Configuration
define( 'DB_NAME', 'wp_fikst' );
define( 'DB_USER', 'fikst' );
define( 'DB_PASSWORD', '0H7nHZN_Hr6jCozQFjry' );
define( 'DB_HOST', '127.0.0.1:3306' );
define( 'DB_HOST_SLAVE', '127.0.0.1:3306' );
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
$table_prefix = 'wp_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         'XK^8n6b9VGr_09!p}aKgTrj7+L! -oGyJ!a>FdMk`WdINmlyXVn5XS|rZCB6#AHd');
define('SECURE_AUTH_KEY',  'ek#+mXM:|]1G :i!IU@ZGY_h--Ze]+#l8`osoXoA}G4)CW6,b5kf{-XZ|dugF=:}');
define('LOGGED_IN_KEY',    '$i7|xk]VPPkh*~gjHd!Pzf&On5z]`,^)S|-82/)+H.+qJuEX$1Y_n{o#[9Q{Ke+h');
define('NONCE_KEY',        '`89}Rk,R=GjF`f109=dJ}xOnODQsa7#+-zxzj1>/L4D(AN6S{(<+S[yz-G==RLeR');
define('AUTH_SALT',        'xcPiY%2;ul.-S&fsg_7h*cR6oA/evhE@MO8zd6^8|)n(;1]+8lt )>,d&K(>,;Rz');
define('SECURE_AUTH_SALT', 'k-]9s@s?yVR|.{8VAq4wn^G1h]eL(<l)Zoc0-tsM37=5_]a0feLwiJY-R[<-A&|-');
define('LOGGED_IN_SALT',   'y*t4CemX(r<t+xUkOwtrmH0~,4a;R>Wt2hYE1}|YMs7f+GK*A?#Qkp_87WF.~s}Y');
define('NONCE_SALT',       'x#EYKr{M!:M<Fnr-lE`_4^n6HCth=+UK7|z=(G5l87(M9m_:C.DV0|h*83I5*47*');


# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'fikst' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'WPE_APIKEY', 'be7bb19b7be35adc42cfceb8fadd3ae18eb8315c' );

define( 'WPE_CLUSTER_ID', '211071' );

define( 'WPE_CLUSTER_TYPE', 'pod' );

define( 'WPE_ISP', true );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

define( 'WPE_SFTP_PORT', 2222 );

define( 'WPE_SFTP_ENDPOINT', '34.121.215.142' );

define( 'WPE_LBMASTER_IP', '' );

define( 'WPE_CDN_DISABLE_ALLOWED', true );

define( 'DISALLOW_FILE_MODS', FALSE );

define( 'DISALLOW_FILE_EDIT', FALSE );

define( 'DISABLE_WP_CRON', false );

define( 'WPE_FORCE_SSL_LOGIN', false );

define( 'FORCE_SSL_LOGIN', false );

/*SSLSTART*/ if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on'; /*SSLEND*/

define( 'WPE_EXTERNAL_URL', false );

define( 'WP_POST_REVISIONS', 3 );

define( 'WPE_WHITELABEL', 'wpengine' );

define( 'WP_TURN_OFF_ADMIN_BAR', false );

define( 'WPE_BETA_TESTER', false );

umask(0002);

$wpe_cdn_uris=array ( );

$wpe_no_cdn_uris=array ( );

$wpe_content_regexs=array ( );

$wpe_all_domains=array ( 0 => 'fikst.com', 1 => 'fikst.wpengine.com', 2 => 'fikst.wpenginepowered.com', 3 => 'www.fikst.com', );

$wpe_varnish_servers=array ( 0 => '127.0.0.1', );

$wpe_special_ips=array ( 0 => '34.135.232.148', 1 => 'pod-211071-utility.pod-211071.svc.cluster.local', );

$wpe_netdna_domains=array ( );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( );
define('WPLANG', '');

# WP Engine ID


# WP Engine Settings







# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', __DIR__ . '/');
require_once(ABSPATH . 'wp-settings.php');








