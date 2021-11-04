# Updated: 2021-11-04
import hashlib
import time

def generate_token(data):
    raw = f'{data}{time.time()}'
    return hashlib.sha256(raw.encode()).hexdigest()