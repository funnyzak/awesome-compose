# Compose sample application

## Tooljet application

Project structure:

```text
├── docker-compose.yaml
|── .env.prod
```

[_docker-compose.yml_](docker-compose.yml)

```yaml
services:
  postgres:
    image: postgres:13.11
    restart: unless-stopped
    container_name: app-postgres
    environment:
      POSTGRES_USER: padm
      POSTGRES_PASSWORD: 1234567890
      POSTGRES_INITDB_ARGS: --data-checksums
      PGDATA: /var/lib/postgresql/data/pgdata
    volumes:
      - ./data/postgresql:/var/lib/postgresql/data
    ports:
      - 5432:5432
    networks:
      - ycnet
  tooljet:
    image: tooljet/tooljet-ce:v2.6.2
    container_name: app-tooljet
    stdin_open: true
    tty: true
    env_file: .env.prod
    environment:
      SERVE_CLIENT: "true"
      PORT: "80"
    command: npm run start:prod
    ports:
      - 81:80
    restart: unless-stopped
    networks:
      - ycnet
networks:
  ycnet:
    driver: bridge
```

## Deploy with docker-compose

You need edit .env.prod file and run:

```bash
$ docker-compose up -d
```

After the application starts, navigate to `http://localhost:81` in your web browser or run:

## Reference

- [ToolJet](https://tooljet.com)
- [ToolJet Docs](https://docs.tooljet.com/docs/)
