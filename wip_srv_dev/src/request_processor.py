#################################################
### Processing Request from WIP APP         #####
#################################################

from src import ai_trainer
from src import mongo_functions
from src.mysql_functions import MySqlDb
import yaml
import json

def advice_generator(doc_id, msg_txt):
    with open('wip_params/ai_params_analyze.yaml') as file:
        params = yaml.safe_load(file.read())
    ai_response_analyze = ai_trainer.ask_ChatCompletion(ai_trainer.prompt_generator_analyze(msg_txt, params['AI_PROMPT_SYSTEM'], params['AI_PROMPT_ASK']), params['AI_MODEL'], params['AI_MAX_TOKEN'], params['AI_N'], params['AI_STOP'], params['AI_TEMPERATURE'])
    with open('wip_params/ai_params_advice.yaml') as file:
        params = yaml.safe_load(file.read())
    ai_response_advice = ai_trainer.ask_ChatCompletion(ai_trainer.prompt_generator_advice(msg_txt, params['AI_PROMPT_SYSTEM'], params['AI_PROMPT_ASK']), params['AI_MODEL'], params['AI_MAX_TOKEN'], params['AI_N'], params['AI_STOP'], params['AI_TEMPERATURE'])
    mongo_result = mongo_functions.update_a_msg(doc_id, ai_response_analyze, ai_response_advice)
    mysqldb = MySqlDb()
    try:
        mysql_result = mysqldb.update_wip_score_advice(doc_id)

    except Exception as e:
        print("request_processor.py: ERROR: cannot update advice in wip_scores in MySQL:", e)

    if mongo_result and mysql_result:
        ai_response = {"kaizen": ai_response_analyze, "advice": ai_response_advice}
        print("AI_ADVICE:", ai_response)
        return {'doc_id': doc_id}
    else:
        return {'doc_id': 'ERROR' }
        





