## Basic CS

- basic_cs_1.php
- basic_cs_2.php
- basic_cs_3.php
- basic_cs_4.php

## Advance/Practical

Open a terminal and run `docker-compose up -d --build`.

Run `docker-compose run --rm artisan key:generate`

Run `docker-compose run --rm artisan migrate`

Open up your browser of choice to [http://localhost:8080](http://localhost:8080) and you should see your app running as intended.

**Endpoints**

- GET http://localhost:8080/api/users
- GET http://localhost:8080/api/users/1
- GET http://localhost:8080/api/users/1/posts
- GET http://localhost:8080/api/posts/1/comments

**Useful commands:**

- `docker-compose run --rm composer update`
- `docker-compose run --rm artisan migrate`

Containers created and their ports are as follows:

- **nginx** - `:8080`
- **mysql** - `:3306`
- **php** - `:9000`
