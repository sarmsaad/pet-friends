from flask import Flask, request, abort, jsonify, Response

from pymongo import MongoClient

import numpy as np

import config

import requests

url = "https://language.googleapis.com/v1/documents:analyzeSentiment?key=" + config.GAPI

client = MongoClient(host="35.196.86.244", port=27017)

db = client['shehacks']

posts = db.posts

app = Flask(__name__)

@app.route('/')
def index():
    return "Hello, World!"


@app.route('/login', methods=['GET'])
def login():
    #still take care of bad requests
    username = request.args.get("username")
    password = request.args.get("password")
    print(username)
    if authenticate(username, password):
        return jsonify({'login': 'successful'}), 201
    else:
        return jsonify({'login': 'fail'}), 201

@app.route('/signup', methods=['GET'])
def signup():
    if storedata(request):
        return jsonify({'signup': 'successful'}), 201
    else:
        return jsonify({'signup': 'fail'}), 201

@app.route('/journal', methods=['GET'])
def saveJournal():

    text = request.args.get("text")
    username = request.args.get("username")
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
    print(data)
    r = requests.post(url=url, json=data)
    print(r)
    if r.status_code == 200:
        read = r.json()
        print(read)
        score = read["documentSentiment"]["score"]
        magnitude = read["documentSentiment"]["magnitude"]
        var = posts.find_one({"username": username})
        arr_score = str(var["score"]) + ',' + str(score)
        arr_magnitude = str(var["magnitude"]) + ',' + str(magnitude)
        arr_today = str(score) + ',' + str(mangitude)
        #calculate the progress of the last 5 days and see if there's improvement
        array = arr_score.split(',')
        if len(array) > 5:
            array = array[len(arr)-6:]
            mean = np.mean(array)
            std = np.std(array)



        posts.update_one(var, {
            "$set": {"score": arr_score, "magnitude": arr_magnitude, "today":arr_today, "progress": }})
        return jsonify({'reading': 'successful'})
    elif r.status_code == 429:
        return jsonify({'reading': 'bad'})

def authenticate(username, password):
    #the function to authenticate the login
    var = posts.find_one({"username": username})
    print(var)
    if var == None:
        return False
    else:
        print(var["password"])
        print(password)
        if var["password"] == password:
            return True
    return False

def storedata(request):
    #the function that's going to store the new patient
    username = request.args.get("username")
    password = request.args.get("password")
    location = request.args.get("location")
    var = posts.find_one({"username": username})
    ##we create a new person once something is new
    if var == None:
        post = {'username': username, 'password': password, 'location': location, 'score': 0, 'magnitude': 0}
        post_id = posts.insert_one(post).inserted_id
        return True
    else:
        return False

if __name__ == '__main__':
    app.run(debug=True)