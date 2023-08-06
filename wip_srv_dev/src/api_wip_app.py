##################################################
###  APIs being called by wip_app
##################################################

from flask import render_template, request, redirect
import json
from src import app
from src import mongo_functions
from src import request_processor


@app.route('/api/v1/reqs/advice', methods=['POST'])
def requestAdvice():
    if request.method == "POST":
        print("api_wip_app.py: Method==POST")
        print(request.get_json)
        json = request.get_json()
        doc_id = json['doc_id']
        msg_txt = mongo_functions.get_a_msg(doc_id)
        ai_response_advice = request_processor.advice_generator(doc_id, msg_txt)
    else:
        print("api_wip_app.py: Methed!=POST")
        return render_template('')

    # call the module for requesting an advice

    return ai_response_advice