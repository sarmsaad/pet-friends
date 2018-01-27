"""
config file 
"""

from pymongo import MongoClient

client = MongoClient(host="35.196.86.244", port=27017)
db = client["mad_invest"]

#google api key
GAPI = "AIzaSyD1q_EryIdBeAgA8u1tvE5Fd6RvmRFSYDI"