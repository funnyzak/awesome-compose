<?php
$CONFIG = array (
  'htaccess.RewriteBase' => '/',
  'memcache.local' => '\\OC\\Memcache\\APCu',
  'memcache.distributed' => '\OC\Memcache\Redis',
  'redis' => [
      'host'     => 'redis',
      'port'     => 6379,
      'dbindex'  => 7,
      'password' => 'zpb4htz4vem_hkb0HQJ',
      'timeout'  => 1.5,
  ],
  'apps_paths' => 
  array (
    0 => 
    array (
      'path' => '/var/www/html/apps',
      'url' => '/apps',
      'writable' => false,
    ),
    1 => 
    array (
      'path' => '/var/www/html/custom_apps',
      'url' => '/custom_apps',
      'writable' => true,
    ),
  ),
  'default_language' => 'zh_CN',
  'default_locale' => 'zh_Hans_CN',
  'instanceid' => '3kjskldfjl23',
  'passwordsalt' => 'LAnsTcrw4O+sdfsdfBWHTayMZ',
  'secret' => '9VahqtFLPsdfsdf23RVRqJptwUb2WSM7sVOQm22L',
  'trusted_domains' => 
  array (
    0 => 'localhost:1738',
    1 => '192.168.50.3:1738',
    2 => '127.0.0.1:1738'
  ),
  'datadirectory' => '/var/www/html/data',
  'dbtype' => 'mysql',
  'version' => '24.0.0.12',
  'overwrite.cli.url' => 'http://192.168.50.3:1738',
  'overwritehost' => '',
  'overwriteprotocol' => '',
  'dbname' => 'nextcloud',
  'dbhost' => 'mysql',
  'dbport' => '3306',
  'dbtableprefix' => 'oc_',
  'mysql.utf8mb4' => true,
  'dbuser' => 'u_nc',
  'dbpassword' => 'zmf.qzFB*yna-qht',
  'installed' => true,
  'filesystem_check_changes' => 0,
  'mail_smtpmode' => 'smtp',
  'mail_smtphost' => 'smtp.exmail.qq.com',
  'mail_sendmailmode' => 'smtp',
  'mail_smtpport' => '465',
  'mail_smtpauthtype' => 'LOGIN',
  'mail_smtpauth' => 1,
  'mail_smtpsecure' => 'ssl',
  'mail_from_address' => 'support',
  'mail_domain' => 'domain.com',
  'mail_smtpname' => 'support@domain.com',
  'mail_smtppassword' => 'helloworld',
  'twofactor_enforced' => 'false',
  'twofactor_enforced_groups' => 
  array (
  ),
  'twofactor_enforced_excluded_groups' => 
  array (
  ),
);
