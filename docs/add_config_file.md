## 개요

rester-sql은 모듈 별로 config 파일을 지정한다.

아래에서 config 파일에 대해 설명한다.

## config.ini
config.ini 설명:
```
; 기본설정
[common]
; 데이터베이스 설정값 : 없으면 default
; database = user

; check auth procedure
; default off
[auth]
auth = on

; used cache procedure
[cache]
select = 30
```
 - [common] : 해당 모듈의 데이터베이스 접속 정보를 구분하기 위한 설정
   - 설정값이 없으면 default를 사용
   
 - [auth] : 해당 모듈의 인증 기능을 사용하기 위한 설정
   - 설정값이 없으면 전체 프로시저가 off
 
 - [cache] : 해당 모듈의 cache 정보를 설정하기 위한 설정
   - 설정 값이 없으면 defalut를 사용

## config 설정 예제

common 설정 예제:
```
[common]
database = user
```

auth 설정 예제:
```
[auth]
select = on
```
> select 프로시저에 인증기능을 설정

cache 설정 예제
```
[cache]
select = 30
```
> select 프로시저에 cache 30초를 설정


### 결과 확인
[![Run in Postman](https://run.pstmn.io/button.svg)](https://app.getpostman.com/run-collection/b48da2f9eeab03ae91de)
