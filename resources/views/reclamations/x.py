from Crypto.Cipher import AES
from Crypto.Random import get_random_bytes
import base64

def pad(text):
    # Ensure the text is a multiple of 16 bytes
    return text + (16 - len(text) % 16) * chr(16 - len(text) % 16)

def encrypt_uuid(uuid, key):
    cipher = AES.new(key, AES.MODE_ECB)
    encrypted = cipher.encrypt(pad(uuid).encode('utf-8'))
    return base64.b64encode(encrypted).decode('utf-8')

# UUID to encrypt
uuid = "84b78b79-4208-47d8-abb4-6b9b4183c41d"

# Generate a random 16-byte key
key = get_random_bytes(16)

# Save the key to a file for future use
with open('encryption_key.key', 'wb') as key_file:
    key_file.write(key)

encrypted_uuid = encrypt_uuid(uuid, key)
print("Encrypted UUID:", encrypted_uuid)
print("IMPORTANT: Save your key! It's needed to decrypt the data later!")
print("Key (in base64):", base64.b64encode(key).decode('utf-8'))