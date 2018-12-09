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
item_price = "<span class=[\"]s-item__price[\"]>.*?</span>"
item_name = "<h3 class=[\"]s-item__title[\"] role=[\"]text[\"].*?</h3>"
item_img = "<img[^>].*? src=[\"].*?jpg"
item_link = "<div class=[\"]s-item__image[\"]><a href=.*? tabindex"
#print (re.search(item_price, res.text))
#print (re.search(item_name, res.text))
#print (re.search(item_name, res.text))
tag = "<[^>].*?>"
im_tag = "<img[^>].*? src=[\"]"
li_tag = "<div class=[\"]s-item__image[\"]><a href=[\"]"
li2_tag = "[\"] tabindex"

img = re.findall(item_img, res.text)
price = re.findall(item_price, res.text)
name = re.findall(item_name, res.text)
link = re.findall(item_link, res.text)

size = len(img)
for i in range(size):
	print(re.sub(im_tag, "", img[i]))
	print(re.sub(li2_tag, "", re.sub(li_tag, "", link[i])))
	print("<strong>"+re.sub(tag, "", price[i])+"</strong>")
	print("<span>"+re.sub(tag, "", name[i])+"</span>")

#print (img)
#for k in img:
#	im = re.sub(im_tag, "", k)
#	print(im)

#price = re.findall(item_price, res.text)
#print(price)
#for i in price:
#	pri = re.sub(tag, "", i)
#	print(pri)


#name = re.findall(item_name, res.text)

#for j in name:
#	na = re.sub(tag, "", j)
#	print(na)

#link = re.findall(item_link, res.text)
#print(link)
#for l in link:
#	li = re.sub(li_tag, "", l)
#	li2 = re.sub(li2_tag, "", li)
#	print(li2)
