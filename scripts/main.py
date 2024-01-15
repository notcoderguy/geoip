import shutil
import os
import subprocess
from urllib.parse import urlparse
from dotenv import dotenv_values
import redis

def download_mmdb_files(LICENSE_KEY, MMDB_DIRECTORY):
    LINKS = [
        'https://download.maxmind.com/app/geoip_download?edition_id=GeoLite2-ASN&license_key={}&suffix=tar.gz'.format(LICENSE_KEY),
        'https://download.maxmind.com/app/geoip_download?edition_id=GeoLite2-City&license_key={}&suffix=tar.gz'.format(LICENSE_KEY),
        'https://download.maxmind.com/app/geoip_download?edition_id=GeoLite2-Country&license_key={}&suffix=tar.gz'.format(LICENSE_KEY),
    ]

    download_dir = os.path.join(os.getcwd(), MMDB_DIRECTORY)
    os.makedirs(download_dir, exist_ok=True)

    for link in LINKS:
        subprocess.run(
            ['aria2c', link, '-d', download_dir],
            check=True
        )

def unzip_mmdb_files(MMDB_DIRECTORY):
    download_dir = os.path.join(os.getcwd(), MMDB_DIRECTORY)
    for filename in os.listdir(download_dir):
        if filename.endswith('.tar.gz'):
            subprocess.run(
                ['tar', '-xzf', os.path.join(download_dir, filename), '-C', download_dir],
                check=True
            )

def clean_up_mmdb_files(MMDB_DIRECTORY):
    download_dir = os.path.join(os.getcwd(), MMDB_DIRECTORY)
    for filename in os.listdir(download_dir):
        if filename.endswith('.tar.gz'):
            os.remove(os.path.join(download_dir, filename))

def move_mmdb_files(MMDB_DIRECTORY):
    search_dir = os.path.join(os.getcwd(), MMDB_DIRECTORY)
    for folder in os.listdir(search_dir):
        if folder.startswith('GeoLite2'):
            folder_path = os.path.join(search_dir, folder)
            for file in os.listdir(folder_path):
                if file.endswith('.mmdb'):
                    source_path = os.path.join(folder_path, file)
                    destination_path = os.path.join(search_dir, file)
                    shutil.move(source_path, destination_path)
                else:
                    os.remove(os.path.join(folder_path, file))
            # Remove the empty subdirectory
            shutil.rmtree(folder_path)

def caching_mmdb_files(MMDB_DIRECTORY):
    search_dir = os.path.join(os.getcwd(), MMDB_DIRECTORY)
    for file in os.listdir(search_dir):
        if file.endswith('.mmdb'):
            file_path = os.path.join(search_dir, file)
            with open(file_path, 'rb') as f:
                mmdb_file = f.read()
                r = redis.Redis(host='localhost', port=6379, db=0)
                r.set(file, mmdb_file)

def main():
    print('[+] Getting environment variables...')
    config = dotenv_values(".env")
    print('[+] Copying License Key from .env file...')
    license_key = config['LICENSE_KEY']
    print('[+] Copying MMDB folder path.')
    mmdb_directory = config['']
    print('[+] Downloading mmdb files...')
    download_mmdb_files(license_key, mmdb_directory)
    print('[+] Unzipping mmdb files...')
    unzip_mmdb_files(mmdb_directory)
    print('[+] Cleaning up mmdb files...')
    clean_up_mmdb_files(mmdb_directory)
    print('[+] Moving mmdb files...')
    move_mmdb_files(mmdb_directory)
    # This is not working in laravel, need to figure out how to cache the files
    # print('[+] Caching mmdb files...')
    # caching_mmdb_files()
    print('[+] Done!')

if __name__ == "__main__":
    main()
