#!/usr/bin/python3

from selenium import webdriver
#import selenium
driver = webdriver.Chrome("/opt/google/chrome/chrome")
driver.get("https://ko.wikipedia.org/wiki/")
selected = driver.find_element_by_css_selector('#mp_header > table > tbody > tr > td:nth-child(1) > div:nth-child(2) > a:nth-child(4) > b')
selected.text
