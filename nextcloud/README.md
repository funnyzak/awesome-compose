# Compose sample application

## background cron

https://docs.nextcloud.com/server/latest/admin_manual/configuration_server/background_jobs_configuration.html

```bash
apt-get update

apt install vim-common
apt install cron-apt

crontab -u www-data -e


# cron
*/5  *  *  *  * php -f /var/www/html/cron.php


# test
crontab -u www-data -l
```

## background systemd

apt-get install systemd
apt-get install systemctl 

```bash
[Unit]
Description=Nextcloud cron.php job

[Service]
User=www-data
ExecStart=/usr/local/bin/php -f /var/www/html/cron.php
KillMode=process
```

```bash
vi /etc/systemd/system/nextcloudcron.service
```

```bash
[Unit]
Description=Run Nextcloud cron.php every 5 minutes

[Timer]
OnBootSec=5min
OnUnitActiveSec=5min
Unit=nextcloudcron.service

[Install]
WantedBy=timers.target
```

```bash
vi /etc/systemd/system/nextcloudcron.timer
```