#!/usr/bin/python

from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
import sys
import re


options = webdriver.ChromeOptions()
options.add_argument('headless')
options.add_argument('--no-sandbox')
options.add_argument('--disable-dev-shm-usage')
prefs = {'profile.managed_default_content_settings.images':2}
options.add_experimental_option("prefs", prefs)
driver = webdriver.Chrome('./chromedriver', chrome_options=options)

driver.implicitly_wait(4)

wait=WebDriverWait(driver, 10)

item = sys.argv[1]
page = sys.argv[2]
it = "http://search.danawa.com/dsearch.php?tab=goods&query="+item+"&page="+page
driver.get(it)

prod_list = driver.find_element_by_id('productListArea')
prod_items = prod_list.find_elements_by_class_name('prod_main_info')
price_regex = "<strong>.*?</strong>"

for prod_item in prod_items:
    prod_img = prod_item.find_element_by_tag_name('img')
    prod_name = prod_item.find_element_by_tag_name('a')
    
    prod_img_link = prod_img.get_attribute('data-original')
    prod_path = prod_name.get_attribute('href')
    product = prod_img.get_attribute('alt').encode('utf-8').strip()
    print(prod_img_link)
    print(prod_path)
    print("<span>"+product+"</span>");
    prod_price = prod_item.find_elements_by_class_name('price_sect')
    for prices in prod_price:
        price = prices.get_attribute('innerHTML').encode('ascii', 'ignore')
	price_ = re.findall(price_regex, price)
	if not price_:
		print('<strong>none</strong>')
	if price_:
    		print(price_[0])
        

driver.quit()



