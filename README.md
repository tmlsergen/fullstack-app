# full stack laravel

## Installation
1. Clone Project
> `git clone git@github.com:tmlsergen/fullstack-app.git`
2. Copy .env file
> `cp .env.example .env`
3. Starting Docker Containers
> `docker-compose up`
4. You can see the working containers with `docker ps`
```
 
CONTAINER ID   IMAGE               COMMAND                  CREATED        STATUS        PORTS                                      NAMES
78d17f80ee8e   mysql:8             "docker-entrypoint.s…"   22 hours ago   Up 22 hours   0.0.0.0:3306->3306/tcp, 33060/tcp          fullstack-app_db_1
2b39f62410ff   nginx:alpine        "/docker-entrypoint.…"   22 hours ago   Up 22 hours   0.0.0.0:80->80/tcp, 0.0.0.0:443->443/tcp   fullstack-app_webserver_1
8c481d9ff67e   fullstack-app_app   "docker-php-entrypoi…"   22 hours ago   Up 22 hours   9000/tcp                                   fullstack-app_app_1
f8ed5a199bb0   redis:latest        "docker-entrypoint.s…"   22 hours ago   Up 22 hours   0.0.0.0:6379->6379/tcp                     fullstack-app_redis_1

```
5. To install composer dependencies
> `docker exec -ti app_container_id composer install`
6. Generate the laravel app key
> `docker exec -ti app_container_id php artisan key:generate`
7. To install npm dependencies and build js & css files
>  `docker exec -ti app_container_id npm install && npm run dev`
8. You can access container bash with
> `docker exec -ti app_container_id bash`

# Environments
.env db connection on container
```
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=comment_db
DB_USERNAME=root
DB_PASSWORD=root
```

When you start the containers add the line below on `/etc/hosts` file for local development
>`127.0.0.1       comment.test`
