# Compose sample application

## filebrowser server application

Project structure:

```text
.
├── docker-compose.yml
├── filebrowser.db
└── settings.json
```

[_docker-compose.yml_](docker-compose.yml)

```yaml
version: '3.3'
services:
  filebrowser:
    image: filebrowser/filebrowser:s6
    container_name: filebrowser
    restart: always
    privileged: true
    tty: true
    volumes:
      - ./fb_files:/srv
      - ./filebrowser.db:/database/filebrowser.db
      - ./settings.json:/config/settings.json
    environment:
      - PUID=$$(id -u)
      - PGID=$$(id -g)
    ports:
      - 8080:8080
```

[_settings.json_](settings.json)

```json
{
  "port": 8080,
  "baseURL": "",
  "address": "0.0.0.0",
  "log": "stdout",
  "database": "/database/filebrowser.db",
  "root": "/srv"
}
```

## Deploy with docker-compose

```compose
$ docker-compose up -d
[+] Running 2/2
 ⠿ Network filebrowser_default  Created                0.2s
 ⠿ Container filebrowser        Started 
```

## Expected result

Listing containers must show one container running and the port mapping as below:

```bash
$ docker ps
CONTAINER ID        IMAGE                        COMMAND                  CREATED             STATUS              PORTS                  NAMES
5802160ee153   filebrowser/filebrowser:s6   "/init"   4 minutes ago   Up 4 minutes (unhealthy)   80/tcp, 0.0.0.0:8080->8080/tcp, :::8080->8080/tcp   filebrowser
```

Default Login: admin admin

After the application starts, navigate to `http://localhost:8080` in your web browser or run:

```bash
$  curl localhost:8080       
<!doctype html>
...</body></html>
```

Stop and remove the containers

```compose
$ docker-compose down
```

## Reference

- [filebrowser](https://filebrowser.org/cli/filebrowser-config-set)
- [filebrowser image](https://hub.docker.com/r/filebrowser/filebrowser/tags)