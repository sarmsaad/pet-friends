from flask import Flask, request, abort, jsonify, Response
import config

import requests

url = "https://language.googleapis.com/v1/documents:analyzeSentiment?key=" + config.GAPI

app = Flask(__name__)

@app.route('/')
def index():
    return "Hello, World!"


@app.route('/login', methods=['POST'])
def login():
    if not request.json:
        abort(400)
    if authenticate(request):
        return jsonify({'login': 'successful'}), 201
    else:
        return jsonify({'login': 'fail'}), 201

@app.route('/signup', methods=['POST'])
def signup():
    if not request.json:
        abort(400)
    if storedata(request):
        return jsonify({'signup': 'successful'}), 201
    else:
        return jsonify({'signup': 'fail'}), 201

@app.route('/journal', methods=['POST'])
def saveJournal():

    text = request.json['text']
    """
    Pass the text through Google Cloud NLP and get the sentiment of the text
    Note: We only take English.
    :param text: The text to analyse
    :return:
    """
    document = {
        'type': 'PLAIN_TEXT',
        'language': 'en',
        'content': text,
    }
    data = {
        'document': document,
        'encodingType': 'utf8'
    }
    r = requests.post(url=url, json=data)
    if r.status_code == 200:
        read = r.json()
        return read
    #elif r.status_code == 429:
     #   time.sleep(1)
      #  return None

def authenticate(request):
    #the function to authenticate the login
    pass

def storedata(request):
    #the function that's going to store the new patient
    pass

if __name__ == '__main__':
    app.run(debug=True)
