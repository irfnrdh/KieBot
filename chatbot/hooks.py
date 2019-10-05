from flask import Flask #pip install flask
from flask import request
from flask import jsonify

import requests #pip install request
import json
from flask_ngrok import run_with_ngrok

import re

app = Flask(__name__)
run_with_ngrok(app)


#token = "782860655:AAEjH0t8NdT-YA6ZnAyCFxO97iBuCoy8hp0"
URL = "https://api.telegram.org/bot782860655:AAEjH0t8NdT-YA6ZnAyCFxO97iBuCoy8hp0/" 

# set webhook
#https://api.telegram.org/bot782860655:AAEjH0t8NdT-YA6ZnAyCFxO97iBuCoy8hp0/setWebhook?url=http://1f79e0e4.ngrok.io/

#https://api.telegram.org/bot782860655:AAEjH0t8NdT-YA6ZnAyCFxO97iBuCoy8hp0/deleteWebhook
def write_json(data, filename='jawaban.json'):
    with open(filename,'w') as f:
        json.dump(data, f, indent=2,ensure_ascii=False)

def get_update():
    url = URL + 'getUpdates'
    r = requests.get(url)
    #write_json(r.json())
    return r.json()
    
def send_message(chat_id, text='hehe'):
    url = URL + 'sendMessage'
    jawaban = {'chat_id': chat_id, 'text':text}
    r = requests.post(url, json=jawaban)
    return r.json()

def keyword(text):
    pattern = r'/\w+'
    key = re.research(pattern, text).group()
    return keyword
    
@app.route('/',methods=['POST','GET'])
def index():
    if request.method == 'POST':
       r = request.get_json()
       write_json(r)
       chat_id = r['message']['chat']['id']
       pesan = r['message']['text']
       
    #    if 'Salam' in pesan:
    #        send_message(chat_id, text="Wa'alaikum Salam!")
           
      
       
       digit = '\d\w+'
       keyword = '([A-Z])\w+'
       barang = '\s([a-z])\w+'
    
       uang = re.search(digit,pesan).group()
       katakunci = re.search(keyword,pesan).group()
       aktifitas= re.search(barang,pesan).group()
       
       send_message(chat_id, text=katakunci)
       send_message(chat_id, text=aktifitas)
       send_message(chat_id, text=uang)
       
       
       
       
       
       
    #    pattern = r'/\w+'
    #    if re.search(pattern,pesan):
    #        jawab = "hello"
    #        send_message(chat_id, text=jawab)
            
        
     
       return jsonify(r)
    return 'Hello World! :v'



def main():
    #r = requests.get(URL + 'getMe')
    #write_json(r.json())
    #r = get_update()
    #chat_id = r['result'][-1]['message']['chat']['id']
    #send_message(chat_id)
    pass
    
if __name__ == '__main__':
    #main()
   
    app.run()
  
#localhost.run
#ssh -R 80:localhost:5000 -p 2222 ssh.localhost.run
#ngrok  -> pip install flask-ngrok
#python anywhare
#pytex

    