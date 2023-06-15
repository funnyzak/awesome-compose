# Awesome Compose [![Awesome](https://awesome.re/badge.svg)](https://awesome.re)

> list of Docker Compose samples.

These samples provide a starting point for how to integrate different services using a Compose file and to manage their deployment with Docker Compose.

<!--lint disable awesome-toc-->

## Contents

- [Samples of Docker Compose applications with multiple integrated services](#samples-of-docker-compose-applications-with-multiple-integrated-services).

## Samples of Docker Compose applications with multiple integrated services

- [`SkyWalking`](https://github.com/ycrun/awesome-compose/tree/main/skywalking-es) - Sample SkyWalking application
  with ElashSearch7.
- [`BarkServer`](https://github.com/ycrun/awesome-compose/tree/main/bark) - Sample Bark Server application.
- [`Flare`](https://github.com/ycrun/awesome-compose/tree/main/flare) - Sample Flare Server application.
- [`Portainer`](https://github.com/ycrun/awesome-compose/tree/main/portainer) - Portainer Server application.
- [`NextCloud`](https://github.com/ycrun/awesome-compose/tree/main/nextcloud) - Nextcloud Server application.
- [`Gofastdfs`](https://github.com/ycrun/awesome-compose/tree/main/gofastdfs) - Go-fastdfs Server application.
- [`Samba`](https://github.com/ycrun/awesome-compose/tree/main/samba) - Go-fastdfs Server application.
- [`FileBrowser`](https://github.com/ycrun/awesome-compose/tree/main/filebrowser) - FileBrowser Server application.
- [`Transfer`](https://github.com/ycrun/awesome-compose/tree/main/transfer) - Easy and fast file sharing from the command-line.
- [`SSCMS`](https://github.com/ycrun/awesome-compose/tree/main/transfer) - cms system.
- [`Mysql`](https://github.com/ycrun/awesome-compose/tree/main/mysql) - Mysql Server application.
- [`Spug`](https://github.com/ycrun/awesome-compose/tree/main/spug) - Spug Server application.
- [`Redis`](https://github.com/ycrun/awesome-compose/tree/main/redis) - Redis Server application.
- [`Superset`](https://github.com/ycrun/awesome-compose/tree/main/super-set) - Superset Server application.
- [`Postgres`](https://github.com/ycrun/awesome-compose/tree/main/postgres) - Postgres Server application.
- [`metabase`](https://github.com/ycrun/awesome-compose/tree/main/metabase) - Metabase Server application.
- [`AppSmith`](https://github.com/ycrun/awesome-compose/tree/main/appsimith) - AppSmith Server application.
- [`tooljet`](https://github.com/ycrun/awesome-compose/tree/main/tooljet) - Tooljet Server application, tooljet is a low code platform for building internal tools.
- [`label-studio`](https://github.com/ycrun/awesome-compose/tree/main/label-studio) - LabelStudio Server application, Label Studio is a multi-type data labeling and annotation tool with standardized output format.

<!--lint disable awesome-toc-->

<!--lint disable awesome-toc-->

## Getting started

These instructions will get you through the bootstrap phase of creating and
deploying samples of containerized applications with Docker Compose.

### Prerequisites

- Make sure that you have Docker and Docker Compose installed
  - Windows or macOS:
    [Install Docker Desktop](https://www.docker.com/get-started)
  - Linux: [Install Docker](https://www.docker.com/get-started) and then
    [Docker Compose](https://github.com/docker/compose)
- Download some or all of the samples from this repository.

### Running a sample

The root directory of each sample contains the `docker-compose.yaml` which
describes the configuration of service components. All samples can be run in
a local environment by going into the root directory of each one and executing:

```console
docker-compose up -d
```

Check the `README.md` of each sample to get more details on the structure and
what is the expected output.
To stop and remove all containers of the sample application run:

```console
docker-compose down
```

<!--lint disable awesome-toc-->

## Contribute

<a href="https://github.com/ycrun/awesome-compose/graphs/contributors">
  <img src="https://contrib.rocks/image?repo=funnyzak/awesome-compose" />
</a>

## References

- [Docker](https://docs.docker.com/)
- [Docker Compose](https://docs.docker.com/compose/)
- [Docker Compose file reference](https://docs.docker.com/compose/compose-file/)
- [Docker Compose command line reference](https://docs.docker.com/compose/reference/)

## License

MIT License © 2022 [funnyzak](https://github.com/ycrun/awesome-compose)
