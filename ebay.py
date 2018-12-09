#!/usr/bin/python3

import requests
from html.parser import HTMLParser
import re

url = "https://www.ebay.com/sch/i.html?_from=R40&_nkw=samsung+ssd&_sacat=182085&_sop=15"
res = requests.get(url)
res.status_code
res.text
#print (res.text)
aa = re.compile("[a-z]+")
item_price = "<span class=[\"]s-item__price[\"]>.*?</span>"
item_name = "<h3 class=[\"]s-item__title[\"] role=[\"]text[\"].*?</h3>"
print (re.findall(item_price, res.text))
print (re.findall(item_name, res.text))
