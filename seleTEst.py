#!/usr/bin/python

from selenium import webdriver
import sys
from HTMLParser import HTMLParser
options = webdriver.ChromeOptions()
options.add_argument('--no-sandbox')
options.add_argument('--disable-dev-shm-usage')

driver = webdriver.Chrome('/home/song/Downloads/chromedriver', chrome_options=options)
driver.implicitly_wait(3)

item = sys.argv[1]

it = "http://search.danawa.com/dsearch.php?k1="+item
driver.get(it)


prod_list = driver.find_element_by_id('productListArea')
prod_items = prod_list.find_elements_by_class_name('prod_main_info')


html = driver.page_source
for prod_item in prod_items:
    prod_img = prod_item.find_element_by_tag_name('img')
    prod_name = prod_item.find_element_by_class_name('prod_name')
    prod_price = prod_item.find_element_by_class_name('click_log_product_standard_price_')

    
    prod_img_link = prod_img.get_attribute('data-original')
    print(prod_img_link)

    prod_name_link = prod_name.get_attribute('innerHTML')
    print(prod_name_link.encode('ascii', 'ignore'))

    price = prod_price.get_attribute('innerHTML').encode('ascii', 'ignore')
    print(price)

driver.quit()



