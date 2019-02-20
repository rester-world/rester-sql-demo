## 개요

rester-sql은 SQL 파일 형식의 프로시저를 지원한다.

아래에서 프로시저를 추가하는 과정을 설명한다.

## SQL 형식의 SELECT 프로시저 추가하기
basic_example에 SQL 프로시저 추가:
```
vi src/modules/basic_example/select.sql
```

SQL 프로시저 내용 작성:
```
SELECT *
FROM `example`
LIMIT :start, :rows
```

프로시저 설정 파일 추가(선택):
```
vi src/modules/basic_example/select.ini
```

프로시저 설정 파일에 내용 작성(선택):
```
[:start]
type = number
default = 0

[:rows]
type = number
default = 10
```

## SQL 형식의 Key를 사용한 Fetch 프로시저 추가하기
basic_example에 SQL 프로시저 추가:
```
vi src/modules/basic_example/fetch_by_key.sql
```

SQL 프로시저 내용 작성:
```
SELECT *
FROM `example`
WHERE `key`=:key
LIMIT 1
```

프로시저 설정 파일 추가(선택):
```
vi src/modules/basic_example/fetch_by_key.ini
```

프로시저 설정 파일에 내용 작성(선택):
```
[:key]
type = string
require = true
```

## SQL 형식의 INSERT 프로시저 추가하기
basic_example에 SQL 프로시저 추가:
```
vi src/modules/basic_example/direct_insert.sql
```

SQL 프로시저 내용 작성:
```
INSERT
INTO `rester-sql`.`example`
(`key`, `value`)
VALUES (:key, :value)
```

프로시저 설정 파일 추가(선택):
```
vi src/modules/basic_example/direct_insert.ini
```

프로시저 설정 파일에 내용 작성(선택):
```
[:key]
type = string
default = 10

[:value]
type = number
default = 20
```


### 결과 확인
[![Run in Postman](https://run.pstmn.io/button.svg)](https://app.getpostman.com/run-collection/b48da2f9eeab03ae91de)
