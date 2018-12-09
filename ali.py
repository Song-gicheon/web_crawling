#!/usr/bin/python3

import requests
from html.parser import HTMLParser
import re
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dc8a053377229b92bd1fbd464217843a0b426163
import sys

item = sys.argv[1]
page = sys.argv[2]
url = "https://www.aliexpress.com/wholesale?catId=0&initiative_id=SB_20181209000127&SearchText="+item+"&page="+page
<<<<<<< HEAD
=======

url = "https://www.aliexpress.com/wholesale?catId=0&initiative_id=SB_20181209000127&SearchText=samsung+ssd"
>>>>>>> 5ccfa38aa3f02a5a67fd0c1d3cadf8d11db8b790
=======
>>>>>>> dc8a053377229b92bd1fbd464217843a0b426163
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
<<<<<<< HEAD
<<<<<<< HEAD
=======
#print (re.search(item_name, res.text))
>>>>>>> 5ccfa38aa3f02a5a67fd0c1d3cadf8d11db8b790
=======
#print (re.search(item_name, res.text))
>>>>>>> dc8a053377229b92bd1fbd464217843a0b426163
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
