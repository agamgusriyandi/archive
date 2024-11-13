# Updated: 2024-11-13
import hashlib
import time

def generate_token(data):
    raw = f'{data}{time.time()}'
    return hashlib.sha256(raw.encode()).hexdigest()