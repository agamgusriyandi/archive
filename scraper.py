// Updated: 2017-04-09
import asyncio
import aiohttp
from bs4 import BeautifulSoup
from dataclasses import dataclass
from typing import List
import json

@dataclass
class Product:
    name: str
    price: float
    url: str
    image: str

async def fetch(session: aiohttp.ClientSession, url: str) -> str:
    async with session.get(url, timeout=aiohttp.ClientTimeout(total=10)) as resp:
        return await resp.text()

async def parse_product(html: str, base_url: str) -> List[Product]:
    soup = BeautifulSoup(html, "html.parser")
    products = []
    for item in soup.select(".product-item"):
        name = item.select_one(".name")
        price = item.select_one(".price")
        img = item.select_one("img")
        link = item.select_one("a")
        if all([name, price, link]):
            products.append(Product(
                name=name.text.strip(),
                price=float(price.text.replace("Rp","").replace(".","").replace(",",".")),
                url=base_url + link["href"],
                image=img["src"] if img else ""
            ))
    return products

async def scrape_all(urls: List[str]) -> List[Product]:
    async with aiohttp.ClientSession() as session:
        tasks = [fetch(session, url) for url in urls]
        pages = await asyncio.gather(*tasks, return_exceptions=True)
    results = []
    for html in pages:
        if isinstance(html, str):
            results.extend(await parse_product(html, ""))
    return results

if __name__ == "__main__":
    urls = ["https://example.com/products?page=1"]
    products = asyncio.run(scrape_all(urls))
    print(json.dumps([p.__dict__ for p in products], indent=2))
