# Compose sample application

## transfer application

Project structure:

```text
.
├── docker-compose.yaml
```

[_docker-compose.yml_](docker-compose.yml)

```yaml
version: '3.8'
services:
  app:
    image: dutchcoders/transfer.sh:latest
    privileged: true
    container_name: transfersh
    tty: true
    restart: always
    command: --basedir /tmp --provider local --log /tmp/transfer.log --listener :8080 --random-token-length 7 --purge-days 7 --purge-interval 1 --max-upload-size 10485760
    volumes:
      - ./data/transfersh:/tmp
    ports:
      - 80:8080
```

## Deploy with docker-compose

```compose
$ docker-compose up -d
```

After the application starts, navigate to `http://localhost:80` in your web browser or run:

## Reference

- [transfersh github](hhttps://github.com/dutchcoders/transfer.sh)
