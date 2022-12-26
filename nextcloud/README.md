# Compose sample application

## Nextcloud application

Project structure:

```text
.
├── docker-compose.yaml
├── config.php
```

[_docker-compose.yml_](docker-compose.yml)

```yaml
# author: leon<silenceace@gmail.com>
version: '3.1'
services:
  # reference: https://docs.docker.com/nextcloud/docker-install/
  app:
    container_name: nc-app
    image: nextcloud:24.0.0-apache
    privileged: true
    environment:
      - MYSQL_HOST=mysql
      - MYSQL_DATABASE=nextcloud
      - MYSQL_USER=u_nc
      - MYSQL_PASSWORD=zmf.qzb0MFB*yna-qht
      - PHP_MEMORY_LIMIT=3072M
      - PHP_UPLOAD_LIMIT=10240M
    volumes:
      - ./nextcloud/data:/var/www/html/data
      - ./nextcloud/config:/var/www/html/config
      - ./nextcloud/apps:/var/www/html/apps
      - ./nextcloud/themes:/var/www/html/themes
    depends_on:
      - mysql
      - redis
    restart: always
    ports:
      - 1738:80
    networks:
      - ncnet
  mysql:
    container_name: nc-db
    image: mysql:8.0-oracle
    command: --default-authentication-plugin=mysql_native_password
    restart: always
    volumes:
      - ./db/mysql:/var/lib/mysql
    environment:
      - MYSQL_ROOT_PASSWORD=pwa_MFP0dpr2gex0gqu
      - MYSQL_DATABASE=nextcloud
      - MYSQL_USER=u_nc
      - MYSQL_PASSWORD=zmf.qzb0MFB*yna-qht
      - character-set-server=utf8mb4 
      - collation-server=utf8mb4_unicode_ci
    networks:
      - ncnet
  # reference: https://sdk.collaboraonline.com/docs/installation/CODE_Docker_image.html
  collab:
    image: collabora/code:21.11.4.2.1
    privileged: true
    container_name: nc-collabora
    tty: true
    restart: always
    environment:
      - extra_params=--o:ssl.enable=false
      - dictionaries=zh_CN
      # Set your next cloud access aliases for office 
      - aliasgroup1=http://127.0.0.1:1738,http://nextcloud:1738
      - aliasgroup2=http://nc.yycc.dev|http://nc2.yycc.dev
      - DONT_GEN_SSL_CERT=true
      # enable the admin console feature of CODE
      # console at:  https://<CODE-domain>/browser/dist/admin/admin.html
      - username=admin
      - password=zXRxdf23sdls3
    volumes:
      - ./collabora/config:/config
    ports:
      - 9980:9980 #  tcp
    networks:
      - ncnet
  # redis cache for nextcloud
  # config like this: https://docs.nextcloud.com/server/latest/admin_manual/configuration_server/caching_configuration.html
  redis:
    image: redis:6.0.8
    privileged: true
    container_name: nc-redis
    command: redis-server --requirepass zpb4htz4vem_hkb0HQJ
    volumes:
      - ./db/redis-data:/data
    restart: always
    environment:
      - TZ=Asia/Shanghai
      - REDIS_REPLICATION_MODE=master
    networks:
      - ncnet
networks:
  ncnet:
    driver: bridge
```

[_config.php_](config.php)

```php
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
    1 => '10.0.0.3:1738',
    2 => '127.0.0.1:1738'
  ),
  'datadirectory' => '/var/www/html/data',
  'dbtype' => 'mysql',
  'version' => '24.0.0.12',
  'overwrite.cli.url' => 'http://10.0.0.3:1738',
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

```

## Background Cron

### Install Cron on localhost

```bash
# test exec cron
docker exec -u www-data app-nextcloud php /var/www/html/cron.php

# app cron 
cron -e

# append cron to crontab
*/5 * * * * docker exec -u www-data app-nextcloud php /var/www/html/cron.php

# test 
cron -l
```

## References

- [nextcloud docs](https://docs.nextcloud.com/server/latest/admin_manual/configuration_server/caching_configuration.html)
- [collaboraonline](https://sdk.collaboraonline.com/docs/installation/CODE_Docker_image.html)