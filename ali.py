#!/usr/bin/python3

import requests
from html.parser import HTMLParser
import re
import sys

item = sys.argv[1]
page = sys.argv[2]
url = "https://www.aliexpress.com/wholesale?catId=0&initiative_id=SB_20181209000127&SearchText="+item+"&page="+page

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
#print (re.search(item_name, res.text))
tag = "<[^>].*?>"
im_tag = "<img[^>].*? src=[\"]"
li_tag = "<a id=[\"]limagebox.*? href=[\"]"
li2_tag = "[\"]"

img = re.findall(item_img, res.text)
price = re.findall(item_price, res.text)
name = re.findall(item_name, res.text)
link = re.findall(item_link, res.text)
#print (img)

size = len(img)
for i in range(size):
	print(re.sub(im_tag, "", img[i]))
	print(re.sub(li2_tag, "", re.sub(li_tag, "", link[i])))
	print("<strong>"+re.sub(tag, "", price[i])+"</strong>")
	print("<span>"+re.sub(tag, "", name[i])+"</span>")

#for k in img:
#	im = re.sub(im_tag, "", k)
#	print(im)

#price = re.findall(item_price, res.text)
#print(price)
#for i in price:
#	pri = re.sub(tag, "", i)
#	print(pri)


#name = re.findall(item_name, res.text)
#print(name)
#for j in name:
#	na = re.sub(tag, "", j)
#	print(na)

#link = re.findall(item_link, res.text)
#print(link)
#for l in link:
#	li = re.sub(li_tag, "", l)
#	li2 = re.sub(li2_tag, "", li)
#	print("https:"+li2)
