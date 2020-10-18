# Updated: 2020-10-18
import hashlib
import time

def generate_token(data):
    raw = f'{data}{time.time()}'
    return hashlib.sha256(raw.encode()).hexdigest()