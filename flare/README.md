# Compose sample application

## flare server application

Project structure:

```text
.
├── docker-compose.yaml
├── nginx.conf
```

[_docker-compose.yml_](docker-compose.yml)

```compose
version: '3.8'
services:
  app:
    image: soulteary/flare:0.3.3
    container_name: flare-server
    restart: always
    volumes:
      - ./app:/app
    ports:
      - "5005:5005"
```

## Deploy with docker-compose

```compose
$ docker-compose up -d
Creating network "flare_default" with the default driver
Pulling app (soulteary/flare:0.3.3)...
0.3.3: Pulling from soulteary/flare
59bf1c3509f3: Already exists
a6c93e25cd7a: Pull complete
...
Digest: sha256:4f3000dca8b8e64498f338bc7f2c32875774680d483098c3328add366846ea59
Status: Downloaded newer image for soulteary/flare:0.3.3
Creating flare-server ... done
```

## Expected result

Listing containers must show one container running and the port mapping as below:

```bash
$ docker ps
CONTAINER ID        IMAGE                        COMMAND                  CREATED             STATUS              PORTS                  NAMES
893d0f50d9cd   soulteary/flare:0.3.3            "flare"                  About a minute ago   Up About a minute          0.0.0.0:5005->5005/tcp, :::5005->5005/tcp           flare-server
```

After the application starts, navigate to `http://localhost:5005` in your web browser or run:

```bash
$  curl localhost:5005       
Cannot GET /
```

Stop and remove the containers

```compose
$ docker-compose down
```

## Reference

- [flare repo](https://github.com/soulteary/docker-flare)
- [flare image](https://hub.docker.com/r/soulteary/flare)