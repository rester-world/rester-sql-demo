## 개요

rester-sql은 모듈을 구분하여 사용할 수 있다.

아래에서 모듈을 추가하는 과정을 설명한다.

## 모듈 추가하기
modules 하위 폴더에 hello_rester_second 추가:
```
mkdir src/modules/basic_example
```

## 프로시저 추가하기
새로 만든 hello_rester_second에 프로시저 추가:
```
vi src/modules/basic_example/basic.sql
```

프로시저 내용 작성:
```
SELECT 'Hello RESTer world!! This is rester-sql examples.' as welcome
```

### 결과 확인
[![Run in Postman](https://run.pstmn.io/button.svg)](https://app.getpostman.com/run-collection/b48da2f9eeab03ae91de)
