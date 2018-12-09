#!/usr/bin/python3

import requests
from html.parser import HTMLParser
import re

url = "https://www.aliexpress.com/wholesale?catId=0&initiative_id=SB_20181209000127&SearchText=samsung+ssd"
res = requests.get(url)
res.status_code
res.text
#print (res.text)
item_price = "<span class=[\"]value[\"] itemprop=[\"]price[\"]>.*?</span>"
#item_name = "<a class=[\"]history-tiem prodect [\"] href=.*? title=.*? target=.*?>"
item_name = "<span itemprop=[\"]name[\"].*?</span>"
item_img = "<img[^>].*? src=[\"].*?jpg"
item_link = "<a id=[\"]limagebox.*? href=[\"].*?[\"]"
#print (re.search(item_price, res.text))
#print (re.search(item_name, res.text))
tag = "<[^>].*?>"
im_tag = "<img[^>].*? src=[\"]"
li_tag = "<a id=[\"]limagebox.*? href=[\"]"
price = re.findall(item_price, res.text)
#print(price)
for i in price:
	pri = re.sub(tag, "", i)
	print(pri)


name = re.findall(item_name, res.text)
#print(name)
for j in name:
	na = re.sub(tag, "", j)
	print(na)


img = re.findall(item_img, res.text)
#print (img)
for k in img:
	im = re.sub(im_tag, "", k)
	print(im)

link = re.findall(item_link, res.text)
#print(link)
for l in link:
	li = re.sub(li_tag, "", l)
	print(li)
