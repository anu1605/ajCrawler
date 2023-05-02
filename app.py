from bs4 import BeautifulSoup
import requests

print(requests.get('https://epaper.hindustantimes.com/delhi?eddate=02/05/2023').text)