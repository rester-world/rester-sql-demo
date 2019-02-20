## 개요

rester-sql은 PHP 파일 형식의 프로시저를 지원한다.

아래에서 프로시저를 추가하는 과정을 설명한다.

## SQL 프로시저 추가하기
새로 만든 hello_rester에 SQL 프로시저 추가:
```
vi src/modules/basic_example/insert.php
```

PHP 프로시저 내용 작성:
```
<?php
if(!defined('__RESTER__')) exit;

use rester\sql\rester;

$key = rester::param('key');
$value = rester::param('value');
$old = array_pop(rester::call_proc('fetch_by_key',[':key'=>$key]));

if($old['no'])
{
    rester::failure();
    rester::msg('Already exists key!');
    return false;
}

rester::msg('Success!');
return rester::call_proc('direct_insert',[':key'=>$key,':value'=>$value]);

```
- PHP의 형식에서는 파라미터를 입력을 지원한다.
- 파리미터의 규칙(*.ini)을 결정할 수 있다.

PHP 프로시저에 파라미터 설정 파일 추가:
```
vi src/modules/basic_example/insert.ini
```

PHP 규칙 파일에 내용 작성:
```
[key]
type = string
default = 10

[value]
type = number
default = 20
```

### 결과 확인
[![Run in Postman](https://run.pstmn.io/button.svg)](https://app.getpostman.com/run-collection/b48da2f9eeab03ae91de)
