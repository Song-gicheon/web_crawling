#!/usr/bin/python3
# -*- coding: utf-8 -*-
import requests
from html.parser import HTMLParser
import re
import sys

item = sys.argv[1]
page = sys.argv[2]

#url = "https://www.ebay.com/sch/i.html?_from=R40&_nkw="+item+"&_pgn"+page
url = "https://www.ebay.com/sch/i.html?_from=R40&_nkw="+item+"&_sacat=0&LH_TitleDesc=0&LH_TitleDesc=0&_ipg=25&_pgn="+page
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
im2_tag = "https://ir.*? data-src=[\"]"
li_tag = "<div class=[\"]s-item__image[\"]><a href=[\"]"
li2_tag = "[\"] tabindex"
#na_tag = "[\"\'\”\-\=\.\#\/\?\!\:\$\}\ó]"
na_tag = "[^a-z^A-z^0-9^\s\`]"
img = re.findall(item_img, res.text)
price = re.findall(item_price, res.text)
name = re.findall(item_name, res.text)
link = re.findall(item_link, res.text)
print(price)
size = len(img)
for i in range(size):
	print('test1')
	if (img[i].find("gif") > 0):
		print(re.sub(im2_tag, "", re.sub(im_tag, "", img[i])))	
	else:
		print(re.sub(im_tag, "", img[i]))
	print(re.sub(li2_tag, "", re.sub(li_tag, "", link[i])))
	if (price[i].find("to") > 0):
		print("<strong>"+re.sub("\$", "",re.sub("to", "", re.sub(tag, "", price[i])))+"</strong>")
	else:
		print("<strong>"+re.sub("\$", "", re.sub(tag, "", price[i]))+"</strong>")
	na = re.sub(tag, "", name[i])
	print("<span>"+re.sub(na_tag, "", na)+"</span>")
	print('test')
print('test2')
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
