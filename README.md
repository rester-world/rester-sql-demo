## 개요

rester-sql을 소개하기 위한 데모이다.

자세한 내용은 아래를 참고

- [rester-sql 바로 가기](https://github.com/rester-world/rester-sql)
- [rester-sql wiki 바로 가기](https://github.com/rester-world/rester-sql/wiki)

## 시작하기
아래에서 도커를 사용한 기본적인 동작 방법에 대해서 설명한다.

### 이미지 받기
docker hub 에서 이미지 받아오기:
```
docker pull mariadb:latest
docker pull redis:latest
docker pull rester/rester-sql:latest
```

### 실행
명령어로 컨테이너 생성:
```
docker run -d --restart always --name redis redis:latest
docker run -d --restart always --env MYSQL_RANDOM_ROOT_PASSWORD='true' --env MYSQL_DATABASE='rester-sql' --env MYSQL_USER='rester-sql' --env MYSQL_PASSWORD='rester-sql' --volume "$(pwd)/example_db.sql:/docker-entrypoint-initdb.d/dump.sql:ro" --name db mariadb:latest
docker run -d --restart always -p 80:80 --link db:db.rester.kr --link redis:cache.rester.kr --volume "$(pwd)/src/modules:/var/www/html/modules:ro" --volume "$(pwd)/cfg:/var/www/cfg:ro" --name rester-sql rester/rester-sql:latest
```
docker-compose.yml으로 컨테이너 실행:
```
docker-compose up -d
```

### 컨테이너 확인
```
docker ps
```
```
CONTAINER ID        IMAGE                      COMMAND                  CREATED             STATUS              PORTS                                   NAMES
30105f0ed1e9        rester/rester-sql:latest   "docker-php-entrypoi…"   5 seconds ago       Up 3 seconds        443/tcp, 0.0.0.0:80->80/tcp, 9000/tcp   rester-sql
55e3f4710518        mariadb:latest             "docker-entrypoint.s…"   15 seconds ago      Up 14 seconds       3306/tcp                                db
597bc94ca1a9        redis:latest               "docker-entrypoint.s…"   About an hour ago   Up About an hour    6379/tcp                                redis
```

### 결과 확인
[![Run in Postman](https://run.pstmn.io/button.svg)](https://app.getpostman.com/run-collection/b48da2f9eeab03ae91de)
