## 개요

rester-sql은 각각의 프로시저에 ini 파일을 설정하여 파라미터를 정의할 수 있다.

아래에서 프로시저에 ini 파일을 설정하는 과정을 설명한다.

## 프로시저 ini 추가하기
프로시저에 ini 파일 추가:
```
vi src/modules/basic_example/select.ini
```

ini 파일에 내용 예제:
```
[start]
type = number
default = 0

[rows]
type = number
default = 10
```

## ini 파일 설명

ini 파일 형식:
```
[변수이름]
설정타입 = 값
```

설정 타입 종류:

| 설정 타입 | 종류              | 사용 조건                 | 값      |
|:--------  |:--------          |:--------                  |:--------|
| type      | 타입 설정         | 필수입력                  | regexp, function, filter, id, bool.. etc..
| require   | 필수 입력 설정    | 없음                      | true or false
| default   | 기본 값 설정      | 없음                      | 제한 없음
| regexp    | 정규표현식 설정   | type 값이 regexp에서 반영 | 정규표현식 문법
| options   | ????              | type 값이 filter에서 반영 |


type 설정 값:

| 종류     | 설명                                       |
|:-------- |:--------                                   |
| regexp   | 정규표현식으로 조건 설정                   |
| function |                                            |
| filter   |                                            |
| id       |                                            |
| bool     | bool 형식 조건 검사                        |
| boolean  | boolean 형식 조건 검사                     |
| datetime | datetime 형식 조건 검사                    |
| date     | date 형식 조건 검사                        |
| time     | tile 형식 조건 검사                        |
| array    | array 형식 조건 검사                       |
| filename | filename 형식 조건 검사                    |
| token    | token 형식 조건 검사                       |
| module   |                                            |
| key      | key 형식 조건 검사                         |
| number   | 숫자 형식 조건 검사                        |
| mime     |                                            |
| string   | 문자 형식 조건 검사                        |
| json     | json 형식 조건 검사                        |
| url      | url 형식 조건 검사                         |
| email    | email 형식 조건 검사                       |
| html     | html 형식 조건 검사                        |
