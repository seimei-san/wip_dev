####################################################
### Connect, insert, get documents from MongoDB  ###
####################################################

import pymongo
import datetime
from dotenv import load_dotenv
import os
from bson.json_util import dumps
from bson.objectid import ObjectId

load_dotenv()

######################
# Connect to MongoDB
######################
def mongodb_conn():
  try:
    return pymongo.MongoClient(os.getenv('MONGO_URL'), username=os.getenv('MONGO_USER'), password=os.getenv('MONGO_PW'))
  except pymongo.errors.ConnectionFailure as e:
    print("mongo.py: ERROR: could not connect to mongoDB: %s") % e


######################
# get documents from MongoDB
######################
def get_msg():
  db_client = mongodb_conn()
  if db_client is None:
    return
  
  try:
    db = db_client[os.getenv('MONGO_DB')]
    cols = db[os.getenv('MONGO_COLS')]
    ret = cols.find()
    db_client.close()
    return ret
  except:
    print('mongo.py: ERROR: No Collection in DB')

####################
# Insert a document into MongoDB
###################
def insert_msg(msg_json):
  db_client = mongodb_conn()
  if db_client is None:
    return

  try:
    db = db_client[os.getenv('MONGO_DB')]
    cols = db[os.getenv('MONGO_COLS')]
    result = cols.insert_one(msg_json)
    doc_id = result.inserted_id
    db_client.close()

    # convert Mongo ObjectId into String and return int doc_id
    if isinstance(doc_id, ObjectId):
      return str(doc_id)
    
    raise TypeError(repr(doc_id)) + " is error"
  
  
  except:
    print('mongo.py: ERROR: Could not insert a msg to DB')


####################
# get an Original Message from MongoDb for given doc_id
###################
def get_a_msg(doc_id):
  db_client = mongodb_conn()
  if db_client is None:
    return

  try:
    db = db_client[os.getenv('MONGO_DB')]
    cols = db[os.getenv('MONGO_COLS')]
    doc = cols.find_one({ "_id": ObjectId(doc_id)})
    msg = doc['message']
    db_client.close()
    return msg
  except:
    print('mongo.py: ERROR: No Collection in DB')


####################
# Add Kaizen and Advice into the document specified by given doc_id
###################
def update_a_msg(doc_id, kaizen, advice):
  db_client = mongodb_conn()
  if db_client is None:
    return

  try:
    db = db_client[os.getenv('MONGO_DB')]
    cols = db[os.getenv('MONGO_COLS')]
    cols.update_one({ "_id": ObjectId(doc_id)}, {"$set": {"adviced": 1, "kaizen": kaizen, "advice": advice}})
    db_client.close()
    return True
  
  except:
    print('mongo.py: ERROR: No Collection in DB')    

##################
# !!! Use for DEV only !!!
# All Documents in the collection  
##################
def delete_msg_all():
  db_client = mongodb_conn()
  db = db_client[os.getenv('MONGO_DB')]
  db[os.getenv('MONGO_COLS')].delete_many({})




if __name__ == "__main__":

  # print(get_a_msg("64c35927fdb72b65682efa6c"))



##################
# !!! Use for DEV only !!!
# All Documents in the collection  
##################
  delete_msg_all()
  print("All documents have been deleted!")
    
