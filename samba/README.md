# Compose sample application

## samba application

Project structure:

```text
├── docker-compose.yaml
|-- samba
```

[_docker-compose.yml_](docker-compose.yml)

```yaml

services:
  samba:
    image: crazymax/samba:4.15.5
    privileged: true
    container_name: service-samba
    logging:
      driver: 'json-file'
      options:
        max-size: '1g'
    tty: true
    environment:
      - TZ=Asia/Shanghai
      - SAMBA_LOG_LEVEL=0
    restart: always
    volumes:
      # Contains cache, configuration and runtime data
      - "./samba/run:/data"
      # share data
      - "./data:/samba/leo"
    ports:
      - 10045:445
```

## Deploy with docker-compose

```compose
$ docker compose up -d
[+] Running 2/2
 ⠿ Network samba_default Created              
 ⠿ Container service-samba  Started    

## Expected result

Listing containers must show one container running and the port mapping as below:

```bash
$ docker ps
CONTAINER ID        IMAGE                        COMMAND                  CREATED             STATUS              PORTS                  NAMES
f2c9cb3c95c9   crazymax/samba:4.15.5        "/entrypoint.sh smbd…"   2 minutes ago    Up 2 minutes (healthy)    0.0.0.0:10045->445/tcp, :::10045->445/tcp     
```

After the application starts, navigate to `sms://localhost:10045` in your web browser or run:

Stop and remove the containers

```compose
$ docker-compose down
[+] Stopping samba
[+] Removing samba
[+] Stopping samba
[+] Removing samba
```

## Reference

- [repo](https://github.com/crazy-max/docker-samba)
- [docker image](https://hub.docker.com/r/crazymax/samba/tags?page=1&ordering=last_updated)
- [samba setting](https://handerfly.github.io/%E8%BF%90%E7%BB%B4/2019/08/29/samba/)