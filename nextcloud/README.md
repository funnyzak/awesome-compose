# Compose sample application

## background install

```bash
apt-get update

apt-get install systemd
apt-get install systemctl 
apt install vim-command
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