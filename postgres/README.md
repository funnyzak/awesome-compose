# Compose sample application

## transfer application

Project structure:

```text
├── docker-compose.yaml
```

[_docker-compose.yml_](docker-compose.yml)

```yaml
version: '3.8'
services:
  postgres:
    image: postgres:13.11
    restart: unless-stopped
    container_name: app-postgres
    environment:
      POSTGRES_USER: pgadmin
      POSTGRES_PASSWORD: ksdfjwj3429kjssd
      POSTGRES_INITDB_ARGS: --data-checksums
      PGDATA: /var/lib/postgresql/data/pgdata
    volumes:
      - ./data/postgresql:/var/lib/postgresql/data
    ports:
      - 5432:5432
    networks:
      - ycnet
networks:
  ycnet:
    driver: bridge
```

## Deploy with docker-compose

```bash
$ docker-compose up -d
```

After the application starts, you can connect via 'tcp://localhost:5432' with any Postgres client.

## Reference

- [Postgres Image](https://hub.docker.com/_/postgres)
