# Compose sample application

## portainer application

Project structure:

```text
├── docker-compose.yaml
```

[_docker-compose.yml_](docker-compose.yml)

```yaml
version: '3.8'
services:
  portainer:
    image: portainer/portainer-ce:2.13.0
    privileged: true
    container_name: portainer
    tty: true
    environment:
      - TZ=Asia/Shanghai
      - LANG=C.UTF-8
    restart: always
    ports:
      - 8000:8000 # portainer tcp
      - 9000:9000 # portainer http ui
      - 9443:9443 # portainer https ui
    volumes:
      - ./portainer_data:/data 
      - /var/run/docker.sock:/var/run/docker.sock 
```

## Deploy with docker-compose

```compose
$ docker-compose up -d
Creating network "portainer_default" with the default driver
Pulling app (portainer/portainer-ce:2.13.0)...
2.13.0: Pulling from portainer/portainer-ce
...
Status: Downloaded newer image for portainer/portainer-ce:2.13.0
Creating portainer ... done
```

## Expected result

Listing containers must show one container running and the port mapping as below:

```bash
$ docker ps
CONTAINER ID        IMAGE                        COMMAND                  CREATED             STATUS              PORTS                  NAMES
392kd893se3   portainer/portainer-ce:2.13.0            "portainer"                  About a minute ago   Up About a minute          0.0.0.0:8000->8000/tcp, :::9000->9000/tcp, :::9443->9443/tcp           portainer-server
```

After the application starts, navigate to `http://localhost:9000` in your web browser or run:

```bash
$  curl localhost:9000       
<!doctype html>
...</body></html>
```

Stop and remove the containers

```compose
$ docker-compose down
```

## Reference

- [portainer docs](https://docs.portainer.io/v/ce-2.11/start/install/server/docker/linux)
- [portainer image](https://hub.docker.com/r/portainer/portainer-ce)