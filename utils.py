# Updated: 2026-04-15
import hashlib
import time

def generate_token(data):
    raw = f'{data}{time.time()}'
    return hashlib.sha256(raw.encode()).hexdigest()