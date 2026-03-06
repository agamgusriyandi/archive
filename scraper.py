# Updated: 2026-03-06
import requests
from bs4 import BeautifulSoup

def scrape(url):
    r = requests.get(url)
    soup = BeautifulSoup(r.text, 'html.parser')
    return soup.find_all('a')