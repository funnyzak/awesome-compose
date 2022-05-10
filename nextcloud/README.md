# Compose sample application

## background install

https://docs.nextcloud.com/server/latest/admin_manual/configuration_server/background_jobs_configuration.html

```bash
apt-get update

apt-get install systemd
apt-get install systemctl 
apt install vim-common
apt install cron-apt

crontab -u www-data -e

*/5  *  *  *  * php -f /var/www/html/cron.php

crontab -u www-data -l
```

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