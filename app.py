from bs4 import BeautifulSoup
import requests

print(requests.get(
    'https://epaper.amarujala.com/agra-city/20230502/01.html?format=img&ed_code=agra-city').text)
