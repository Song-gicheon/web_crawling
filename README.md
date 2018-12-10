# Dunawa?!
 Dunawa is web service that compares price information of domestic and overseas shopping malls.
 Your search shows price information crawled by each shopping mall (like tha on Ebay, Newegg..)

## Description
  사용자가 특정 검색어를 입력했을 때 구글 번역 Api 를 사용해서 검색어를 영어로 번역한 후에
 Php, python 을 이용해서 검색어에 맞는 각 쇼핑몰의 상품을 각 크롤러가 검색해서 가져옵니다.
  검색해서 가져온 상품의 가격은 미리 크롤링한 환율 정보를 이용해 원화 가격을 계산합니다.
  메인 페이지에서는 각 페이지가 알아온 상품정보들을 Ajax 를 이용해서 비동기적으로 호출해서 보여줍니다.
  각 상품정보는 인기 순서 / 낮은 가격순으로 선택해서 볼 수 있습니다.
  
 
## Requirements
 이 프로그램은 Ubuntu , Apache, Php, Python, JavaScript 를 이용해서 작성되었습니다.
 python에서는 selenium 라이브러리를 이용합니다.

## installation
 **1. pip 를 이용해서 selenium을 설치합니다. **
 `$ pip install selenium`
  - 만약 pip 이 설치되지 않았다면 `$ apt-get install python-pip` 을 이용해서 설치해줍니다.
 **2. selenium 에서 이용할 크롬 브라우저와 크롬드라이버를 설치합니다.**
   ###- http://chromedriver.chromium.org/
 **3. danawa.py 파일에서 알맞은 크롬 드라이버 경로를 설정해줍니다.**
 **4. apache - php - mysql 를 설치해서 서버 환경을 구성합니다.**
 
 
## Supported Shopping Web Site
 1. Danawa - www.danawa.com
 2. eBay - www.ebay.com
 3. AliExpress - www.aliexpress.com
 4. Newegg - www.newegg.com
