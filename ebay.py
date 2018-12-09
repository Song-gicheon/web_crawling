#!/usr/bin/python3

import requests
from html.parser import HTMLParser
import re
import sys

item = sys.argv[1]
page = sys.argv[2]

url = "https://www.ebay.com/sch/i.html?_from=R40&_nkw="+item+"&_pgn"+page
res = requests.get(url)
res.status_code
res.text
#print (res.text)
aa = re.compile("[a-z]+")
item_price = "<span class=[\"]s-item__price[\"]>.*?</span>"
item_name = "<h3 class=[\"]s-item__title[\"] role=[\"]text[\"].*?</h3>"
item_img = "<img[^>].*? src=[\"].*?jpg"
#print (re.search(item_price, res.text))
<<<<<<< HEAD
=======
#print (re.search(item_name, res.text))
>>>>>>> 5ccfa38aa3f02a5a67fd0c1d3cadf8d11db8b790
tag = "<[^>].*?>"
im_tag = "<img[^>].*? src=[\"]"
price = re.findall(item_price, res.text)
#print(price)
for i in price:
	pri = re.sub(tag, "", i)
	print(pri)


name = re.findall(item_name, res.text)

for j in name:
	na = re.sub(tag, "", j)
	print(na)


img = re.findall(item_img, res.text)
#print (img)
for k in img:
	im = re.sub(im_tag, "", k)
	print(im)
