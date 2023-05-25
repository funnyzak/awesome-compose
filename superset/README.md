# Compose sample application

## Superset application

Project structure:

```text
├── docker-compose.yaml
```

[_docker-compose.yml_](docker-compose.yml)

```yaml
 # author: leon<silenceace@gmail.com>
 # https://hub.docker.com/r/apache/superset
version: '3.1'
services:
  superset:
    image: apache/superset
    container_name: app-superset
    mem_limit: 6144m
    user: root
    restart: unless-stopped
    logging:
      driver: "json-file"
      options:
        max-size: "1g"
    environment:
      SUPERSET_SECRET_KEY: bcb0fd1aad99cf3d6ce1d91a69214762
    ports:
      - 8088:8088
    volumes:
      - ./data/superset_home:/app/superset_home
    networks:
      - ycnet
networks:
  ycnet:
    driver: bridge
```

Then you should init the superset Instance:

```bash
docker exec -it app-superset superset fab create-admin \
              --username admin \
              --firstname superset \
              --lastname y \
              --email leo@superset.com \
              --password admin


docker exec -it app-superset superset db upgrade


docker exec -it app-superset superset load_examples


docker exec -it app-superset superset init
```
  
  Then you can visit the superset at [http://localhost:8088](http://localhost:8088)

## Reference

- [images](https://hub.docker.com/r/apache/superset)