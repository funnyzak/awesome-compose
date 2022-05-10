# Compose sample application

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

