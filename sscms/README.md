# Compose sample application

## SSCMS application

Project structure:

```text
├── docker-compose.yaml
```

[_docker-compose.yml_](docker-compose.yml)

```yaml
# author: leon<silenceace@gmail.com>
services:
  app:
    container_name: sscms-app
    image: sscms/core:7.1.2
    privileged: true
    environment:
      - TZ=Asia/Shanghai
      - LANG=C.UTF-8
      - SSCMS_SECURITY_KEY=e2a3d303-ac9g-71ff-9n54-930310af0832
      - SSCMS_DATABASE_TYPE=MySQL
      - SSCMS_DATABASE_HOST=mysql
      - SSCMS_DATABASE_PORT=3306
      - SSCMS_DATABASE_USER=u_sscms
      - SSCMS_DATABASE_PASSWORD=3z3b0M4FBgyn
      - SSCMS_DATABASE_NAME=ss_cms
      - SSCMS_DATABASE_CONNECTION_STRING=server=mysql;port=3306;database=ss_cms;uid=u_sscms;pwd=3z3b0M4FBgyn;sslmode=None
      - SSCMS_REDIS_CONNECTION_STRING=redis:6379,password=zpb4htz4vem_hkb0HQJ,connectTimeout=1000,connectRetry=1
    volumes:
      - ./sscms/wwwroot:/app/wwwroot
    depends_on:
      - mysql
      - redis
    restart: always
    ports:
      - 1039:80
    networks:
      - ssnet
  mysql:
    container_name: sscms-db
    image: mysql:5.7.27
    command: --default-authentication-plugin=mysql_native_password
    restart: always
    volumes:
      - ./db/mysql:/var/lib/mysql
    environment:
      - MYSQL_ROOT_PASSWORD=pwa_MFP0dpr2gex0gqu
      - MYSQL_DATABASE=sscms
      - MYSQL_USER=u_sscms
      - MYSQL_PASSWORD=3z3b0M4FBgyn
      - character-set-server=utf8mb4 
      - collation-server=utf8mb4_unicode_ci
    networks:
      - ssnet
  redis:
    image: redis:6.0.8
    privileged: true
    container_name: sscms-redis
    command: redis-server --requirepass zpb4htz4vem_hkb0HQJ
    volumes:
      - ./db/redis-data:/data
    restart: always
    environment:
      - TZ=Asia/Shanghai
      - REDIS_REPLICATION_MODE=master
    networks:
      - ssnet
networks:
  ssnet:
    driver: bridge
```

## References

- [SSCMS docs](https://sscms.com)
- [docker image](https://hub.docker.com/r/sscms/core/tags)