# Compose sample application

## bark server application

Project structure:

```text
.
├── docker-compose.yaml
├── nginx.conf
```

[_docker-compose.yml_](docker-compose.yml)

```yaml
version: '3.8'
services:
  bark-server:
    image: finab/bark-server:latest
    container_name: bark-server
    restart: always
    volumes:
      - ./data:/data
    ports:
      - "8080:8080"
```

[_nginx.conf_](nginx.conf)

```conf

```

## Deploy with docker-compose

```compose
$ docker-compose up -d
Creating network "bark_default" with the default driver
Pulling bark-server (finab/bark-server:latest)...
latest: Pulling from finab/bark-server
40e059520d19: Pull complete
...
...
Digest: sha256:107016f02e9a50c540054f03fd1aa797572eab73cc599e2bf3dd8fa84898a9ee
Status: Downloaded newer image for finab/bark-server:latest
Creating bark-server ... done
```

## Expected result

Listing containers must show one container running and the port mapping as below:

```bash
$ docker ps
CONTAINER ID        IMAGE                        COMMAND                  CREATED             STATUS              PORTS                  NAMES
1ccde671c11f   finab/bark-server:latest         "bark-server"            2 minutes ago   Up 2 minutes       0.0.0.0:8080->8080/tcp, :::8080->8080/tcp           bark-server
```

After the application starts, navigate to `http://localhost:8080` in your web browser or run:

```bash
$  curl localhost:8080       
Cannot GET /
```

Stop and remove the containers

```compose
$ docker-compose down
```

## Reference

- [bark](https://github.com/Finb/Bark)
- [bark-server](https://github.com/Finb/bark-server)