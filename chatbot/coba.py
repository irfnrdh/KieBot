import json
import re
import time

pesan = "Beli makan 2000"

digit = '\d\w+'
keyword = '([A-Z])\w+'
barang = '\s([a-z])\w+'
    
uang = re.search(digit,pesan).group()
katakunci = re.search(keyword,pesan).group()
aktifitas= re.search(barang,pesan).group()
       
print (uang)
print (katakunci)
print (aktifitas)

print(time.strftime('%Y-%m-%d %H:%M:%S', time.localtime(1570163975)))