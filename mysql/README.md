# Compose sample application

## MySQL application

Project structure:

```text
├── docker-compose.yaml
```

[_docker-compose.yml_](docker-compose.yml)

```yaml
 # author: leon<silenceace@gmail.com>
 # https://hub.docker.com/_/mysql?tab=description
version: '3.1'
services:
  mysql:
    image: mysql:5.7.40
    privileged: false
    container_name: db-mysql
    command: 
      # bin log
      --server_id=308
      --log-bin=/var/lib/mysql/mysql-bin
      --sync_binlog=1
      --binlog-ignore-db=mysql
      --binlog_format=ROW
      --expire_logs_days=7
      --general-log=1
      --general-log-file=/var/lib/mysql/general-log
      --default-authentication-plugin=mysql_native_password
      --explicit_defaults_for_timestamp=true
      --lower_case_table_names=1
      --sql_mode=STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION
    restart: on-failure
    environment:
      TZ: Asia/Shanghai
      LANG: C.UTF-8
      CHARACTER_SET_SERVER: utf8mb4
      COLLATION_SERVER: utf8mb4_unicode_ci
      MYSQL_ROOT_PASSWORD: 7788689
      # Optional
      # MYSQL_DATABASE: blog
      # MYSQL_USER: ublog
      # MYSQL_PASSWORD: 7788689
    volumes:
      # db data、binlog、general log
      - ./db/mysql:/var/lib/mysql
    ports:
      - 3306:3306
```

## Reference

- [images](https://hub.docker.com/_/mysql/)