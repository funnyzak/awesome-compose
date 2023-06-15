# LabelStudio Compose application

LabelStudio is a multi-type data labeling and annotation tool with standardized output format

## Project structure

```text
├── docker-compose.yaml
```

you can use `docker-compose.yaml` to use postgress as database. Use `docker-compose.yaml` to use h2 database.

## Faq

### When trying to run the docker container I get: "PermissionError: [Errno 13] Permission denied: '/label-studio/data/media'"

This is because the user running the container does not have permission to write to the `/label-studio/data/media` directory. You can fix this by changing the permissions of the directory to allow the user to write to it.

```bash
sudo chown -R 1001:root /path/to/labelstudio
```

You need to replace `/path/to/labelstudio` with the path to the directory where you volume mount the `/label-studio/data/media` directory.

## References

- [LabelStudio](https://labelstud.io/)