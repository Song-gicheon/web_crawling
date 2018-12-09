#!/usr/bin/python

from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC


import sys
options = webdriver.ChromeOptions()
options.add_argument('--no-sandbox')
options.add_argument('--disable-dev-shm-usage')

driver = webdriver.Chrome('/home/song/Downloads/chromedriver', chrome_options=options)
driver.implicitly_wait(10)

item = sys.argv[1]

it = "https://www.amazon.com/s/ref=sr_st_price-asc-rank?keywords="+item+"&sort=price-asc-rank"
driver.get(it)



prod_list = driver.find_element_by_id('atfResults')
prod_items = prod_list.find_elements_by_class_name('a-fixed-left-grid')
t=0
for item in prod_items:

    a = item.find_element_by_tag_name('a')
    img = item.find_element_by_tag_name('img')
    src = img.get_attribute('src')
    prod = img.get_attribute('alt')
    path = a.get_attribute('href')
    parse = item.find_elements_by_xpath('//span[@class="a-offscreen"]')
    for p in parse:
        t = p.get_attribute('innerHTML').encode('ascii','ignore')
        print("p : " +t)
    
    t=t+1
    print(t)
    print("img : "+src)
    print("product : "+prod)
    print("path : "+path)
    print("price : "+parse)


