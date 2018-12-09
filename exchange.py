#!/usr/bin/python3

import requests
from html.parser import HTMLParser
import re

url = "https://search.naver.com/search.naver?sm=top_hty&fbm=1&ie=utf8&query=%ED%99%98%EC%9C%A8"
res = requests.get(url)
res.status_code
res.text
#print (res.text)
#item_price = "<span class=[\"]s-item__price[\"]>.*?</span>"
#item_name = "<h3 class=[\"]s-item__title[\"] role=[\"]text[\"].*?</h3>"
#item_img = "<img[^>].*? src=[\"].*?jpg"
exchange = "<em>USD</em></span>.*?</span>"
#print (re.search(item_price, res.text))
#print (re.search(item_name, res.text))
tag = "<[^>].*?>"
#im_tag = "<img[^>].*? src=[\"]"
usd_tag = "USD "

exc = re.findall(exchange, res.text)
#print(re.sub(tag, "", exc[0]))
print (re.sub(usd_tag, "", re.sub(tag, "", exc[0])))
#print (exc)
#for i in exc:
#	im = re.sub(tag, "", i)	
#	print(im)
