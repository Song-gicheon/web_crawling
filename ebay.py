#!/usr/bin/python3

import requests
import json
import os
from bs4 import BeautifulSoup

BASE_DIR = os.path.dirname(os.path.abspath(__file__))

req = requests.get('https://www.ebay.com/b/Hard-Drives-HDD-SSD-NAS/182085/bn_739008')
html = req.text
soup = BeautifulSoup(html, 'html.parser')
my_title = soup.select(
		'h3 > a'
		)
data = {}

for title in my_title:
	data[title.text] = title.get('href')

with open(os.path.join(BASE_DIR, 're.json'), 'w+') as json_file:
	json.dump(data, json_file)
