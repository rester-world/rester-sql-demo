## 개요

rester-sql은 SQL 파일 형식의 인증 기능을 지원한다.

인증 방법은 로그인을 사용하여 발급 받은 토큰을 token을 포함하여 요청하여 처리한다.

아래에서 인증에 필요한 프로시저를 추가하는 과정을 설명한다.

## SQL 프로시저 추가하기
auth_example에 login 프로시저 추가:
```
vi src/modules/auth_example/login.php
```

login 프로시저 내용 작성:
```
<?php use rester\sql\rester;
use rester\sql\session;

if(!defined('__RESTER__')) exit;

$id = rester::param('session_id');
$token = session::set($id);

return array(
    'session_id'=>$id,
    'token'=>$token
);
```
- session::set() 함수를 호출하면 토큰을 받을 수 있음

auth_example에 config.ini 파일 추가:
```
; check auth procedure
; default off
[auth]
auth = on
```
 - 인증이 필요한 프로시저를 설정
 
auth_example에 auth 프로시저 추가:
```
vi src/modules/auth_example/auth.php
```

auth 프로시저 내용 작성:
```
<?php use rester\sql\session;

if(!defined('__RESTER__')) exit;

$session_id = session::id();
return array(
    'title'=>'Passed token check!',
    'session_id'=>$session_id,
);
```

### 결과 확인
[![Run in Postman](https://run.pstmn.io/button.svg)](https://app.getpostman.com/run-collection/b48da2f9eeab03ae91de)
