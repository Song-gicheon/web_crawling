#!/usr/bin/python3
#from selenium import webdriver
#import selenium

#path = "/opt/google/chrome/chrome"
#driver = webdriver.Chrome(path)
#driver = webdriver.chrome(path)
#driver.get('https://naver.com')
from selenium import webdriver

#path = "e:/chromedriver.exe"
path = "/opt/google/chrome/chrome"
driver = webdriver.Chrome(path)
driver.get("https://naver.com/")
search_box = driver.find_element_by_name("query")
search_box.send_keys("kfc")
search_box.submit()

