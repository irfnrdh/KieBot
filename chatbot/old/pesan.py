import requests
import socket

def telegram_bot_sendtext(bot_message):
    
    bot_token = '817129856:AAEuQfYZ1NUquEnQ7rBetsKTMTWnaxNWXBA'
    bot_chatID = '403611573'
    send_text = 'https://api.telegram.org/bot' + bot_token + '/sendMessage?chat_id=' + bot_chatID + '&parse_mode=Markdown&text=' + bot_message

    response = requests.get(send_text)

    return response.json()
    
ip = socket.gethostbyname(socket.gethostname())
pesan = telegram_bot_sendtext("Ane sedang dimari broh, "+ip)
print(pesan)
