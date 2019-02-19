## 개요
rester-sql을 사용법을 설명하기 위한 예제 코드를 작성한 것이다.

또한, rester-sql을 작업하기 위한 템플릿으로 사용할 수 있다.
 
컨테이너를 생성할때 [Docker-hub](https://hub.docker.com/r/rester/rester-sql)에서 이미지를 가져와서 사용 할 수 있고, [https://github.com/rester-world/rester-docker](https://github.com/rester-world/rester-sql)의 소스를 내려받아서 빌드하여 사용할 수 있다.

이외에, rester-sql은 1개 이상의 database가 필요하고, redis(option) 기능을 지원한다.

이 sample은 mariaDB와, redis를 사용하여 구동한다.

### 버전
| Docker Tag | Git Release | Nginx Version | PHP Version | Alpine Version |
|-----|-------|-----|--------|--------|
| latest/1.0 | Master Branch |1.14.0 | 7.2.4 | 3.7 |

### 링크
- [https://github.com/rester-world/rester-sql](https://github.com/rester-world/rester-sql)
- [https://hub.docker.com/r/rester/rester-sql](https://hub.docker.com/r/rester/rester-sql)


## 시작하기
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


## 참고 문서
자세한 예제와 설명은 설명서를 참조.

- [모듈 설정 파일](https://github.com/rester-world/rester-sql-sample/docs/add_config_file.md)
- [모듈 추가하기](https://github.com/rester-world/rester-sql-sample/docs/add_module.md)
- [SQL 파일 실행하기](https://github.com/rester-world/rester-sql-sample/docs/add_sql_file.md)
- [PHP 파일 실행하기](https://github.com/rester-world/rester-sql-sample/docs/add_php_file.md)
- [파라미터 설정하기](https://github.com/rester-world/rester-sql-sample/docs/add_ini_file.md)
- [인증 기능 사용하기](https://github.com/rester-world/rester-sql-sample/docs/add_auth_file.md)
- [프로시저 호출]()
- [접근 한정자]()
