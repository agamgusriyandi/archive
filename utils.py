# Updated: 2017-02-03
import hashlib
import time

def generate_token(data):
    raw = f'{data}{time.time()}'
    return hashlib.sha256(raw.encode()).hexdigest()