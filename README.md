# Awesome Compose [![Awesome](https://awesome.re/badge.svg)](https://awesome.re)

> list of Docker Compose samples.

These samples provide a starting point for how to integrate different services using a Compose file and to manage their deployment with Docker Compose.

<!--lint disable awesome-toc-->
## Contents

- [Samples of Docker Compose applications with multiple integrated services](#samples-of-docker-compose-applications-with-multiple-integrated-services).

## Samples of Docker Compose applications with multiple integrated services

- [`SkyWalking`](https://github.com/funnyzak/awesome-compose/tree/master/skywalking-es) - Sample SkyWalking application
with ElashSearch7.
- [`BarkServer`](https://github.com/funnyzak/awesome-compose/tree/master/bark) - Sample Bark Server application.
- [`Flare`](https://github.com/funnyzak/awesome-compose/tree/master/flare) - Sample Flare Server application.
- [`Portainer`](https://github.com/funnyzak/awesome-compose/tree/master/portainer) - Portainer Server application.
- [`NextCloud`](https://github.com/funnyzak/awesome-compose/tree/master/nextcloud) - Nextcloud Server application.
- [`Gofastdfs`](https://github.com/funnyzak/awesome-compose/tree/master/gofastdfs) - Go-fastdfs Server application.
- [`Samba`](https://github.com/funnyzak/awesome-compose/tree/master/samba) - Go-fastdfs Server application.
- [`Transfer`](https://github.com/funnyzak/awesome-compose/tree/master/transfer) - Easy and fast file sharing from the command-line. .

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

<a href="https://github.com/funnyzak/awesome-compose/graphs/contributors">
  <img src="https://contrib.rocks/image?repo=funnyzak/awesome-compose" />
</a>



## License

MIT License © 2022 [funnyzak](https://github.com/funnyzak)
