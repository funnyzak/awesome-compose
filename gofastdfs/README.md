# Compose sample application

## Fastdfs application

Project structure:

```text
.
├── docker-compose.yaml
```

[_docker-compose.yml_](docker-compose.yml)

```compose
# author: leon<silenceace@gmail.com>
version: '3.1'
services:
  # https://hub.docker.com/r/sjqzhang/go-fastdfs/tags
  # https://github.com/sjqzhang/go-fastdfs
  fastdfs:
    image: sjqzhang/go-fastdfs
    privileged: true
    container_name: fd-fastdfs
    tty: true
    restart: always
    environment:
      - GO_FASTDFS_DIR=/data
    volumes:
      - ./fastdfs:/data
    ports:
      - 8080:8080
    networks:
      - fdnet
  fastdfsweb:
    image: perfree/fastdfsweb
    privileged: true
    container_name: fd-fastdfsweb
    tty: true
    restart: always
    ports:
      - 8088:8088
    depends_on:
      - fastdfs
    networks:
      - fdnet
networks:
  fdnet:
    driver: bridge
```

## Reference

- [Fastdfs images](https://hub.docker.com/r/sjqzhang/go-fastdfs/tags)
- [Fastdfs docs](https://sjqzhang.github.io/go-fastdfs/#character)
- [Fastdfs web](https://github.com/perfree/go-fastdfs-web)