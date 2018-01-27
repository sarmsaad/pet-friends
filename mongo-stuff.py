from pymongo import MongoClient

client = MongoClient(host="35.196.86.244", port=27017)

db = client['shehacks']

collection = db['logs']

post = {'username': 'test', 'password': 'password', 'location': 'London, UK'}

posts = db.posts

post_id = posts.insert_one(post).inserted_id

#print(post_id)

