# Tailscale Compose application

[Tailscale](https://tailscale.com/) is a zero-config VPN built on WireGuard that lets you securely connect devices and
containers into a private mesh network. This sample runs Tailscale inside a container, useful for joining a host (or a
service) to your tailnet, exposing it to other nodes, or routing through a custom (Headscale) control server.

## Project structure

```text
├── docker-compose.yml
└── state/        # persisted Tailscale state (auto-created)
```

[_docker-compose.yml_](docker-compose.yml)

```yaml
services:
  tailscale:
    image: tailscale/tailscale:stable
    container_name: tailscale
    hostname: ${TS_HOSTNAME:-ts-container}

    network_mode: host

    cap_add:
      - NET_ADMIN
      - NET_RAW

    devices:
      - /dev/net/tun:/dev/net/tun

    volumes:
      - ./state:/var/lib/tailscale

    environment:
      TS_AUTHKEY: ${TS_AUTHKEY}
      TS_EXTRA_ARGS: "--login-server=${TS_LOGIN_SERVER:-https://controlplane.tailscale.com}"
      TS_STATE_DIR: /var/lib/tailscale

    restart: unless-stopped
```

## Prerequisites

- A Linux host with `/dev/net/tun` available (the TUN device is required by Tailscale).
- `NET_ADMIN` and `NET_RAW` capabilities permitted for the container.
- `network_mode: host` requires Docker to allow host networking (not supported on Docker Desktop for macOS/Windows in
  the same way; run on a Linux host or server).

## Configuration

Create a `.env` file (or export the variables) before bringing the stack up:

```dotenv
# A node name shown in your tailnet admin console
TS_HOSTNAME=ts-container

# Auth key from https://login.tailscale.com/admin/settings/keys
# (or your Headscale instance). Generate one and paste it here.
TS_AUTHKEY=tskey-auth-xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

# Optional: a custom control server such as Headscale.
# Leave unset to use the default Tailscale coordination server.
TS_LOGIN_SERVER=https://controlplane.tailscale.com
```

> ⚠️ Never commit your real `TS_AUTHKEY`. Keep `.env` out of version control.

## Deploy with docker-compose

```console
$ docker-compose up -d
Creating network ... done
Creating tailscale ... done
```

## Expected result

```bash
$ docker ps
CONTAINER ID   IMAGE                     COMMAND           CREATED         STATUS         PORTS     NAMES
xxxxxxxxxxxx   tailscale/tailscale:stable "/usr/local/bin/…" 1 minute ago   Up 1 minute              tailscale
```

Check that the node has joined the tailnet:

```bash
$ docker exec tailscale tailscale status
100.x.y.z  ts-container  user@  linux  -
```

Stop and remove the containers:

```console
$ docker-compose down
```

## Notes

- State is persisted under `./state` so the node keeps its identity across restarts.
- To use a self-hosted control server (e.g. Headscale), set `TS_LOGIN_SERVER` to your server URL.
- For subrouting / exit-node / funnel features, pass additional flags via `TS_EXTRA_ARGS`.

## Reference

- [Tailscale](https://tailscale.com/)
- [tailscale/tailscale Docker image](https://hub.docker.com/r/tailscale/tailscale)
- [Auth keys](https://login.tailscale.com/admin/settings/keys)
- [Headscale (open-source control server)](https://github.com/juanfont/headscale)
