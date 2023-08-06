#######################################
### Request AI to advice efficient communication
#######################################

import openai

from dotenv import load_dotenv
import os
import json

load_dotenv()



openai.organization=os.getenv('AI_ORG')
openai.api_key=os.getenv('AI_KEY')


#########################
# generate a prompt based on the speicfied message to get advice from AI
#########################

def prompt_generator_analyze(msg_txt, prompt_sys, prompt_ask):
    prompt = []
    prompt_system = {"role": "system", "content": prompt_sys}
    msg_json = {'role': 'user', 'content': msg_txt}
    prompt_json = {'role': 'user', 'content': prompt_ask}
    prompt.append(prompt_system)
    prompt.append(prompt_json)
    prompt.append(msg_json)

    print("PROMT_ANALYZE: ", prompt)
    return prompt

def prompt_generator_advice(msg_txt, prompt_sys, prompt_ask):
    prompt = []
    prompt_system = {"role": "system", "content": prompt_sys}
    msg_json = {'role': 'user', 'content': msg_txt}
    prompt_json = {'role': 'user', 'content': prompt_ask}
    # prompt.append(prompt_system)
    prompt.append(prompt_json)
    prompt.append(msg_json)

    print("PROMT_ADVICE: ", prompt)
    return prompt

##########################
# send the generated prompt to ChatGPT (ChatCompletion)
##########################
def ask_ChatCompletion(msg_json, model, max_tokens, n, stop, temperature):
    completion = openai.ChatCompletion.create(
        model = model,
        messages = msg_json,
        max_tokens = max_tokens,
        n = n,
        stop = stop,
        temperature = temperature
    )
    response = completion.choices[0].message.content
    # response = completion
    return response


#########################
# This is not in use (Completion)
def ask_Completion(msg):
    completion = openai.Completion.create(
        model = "text-davinci-003",
        prompt = '',
      temperature=0.7,
      # max_tokens=1024,
      max_tokens=3000,
      top_p=1,
      frequency_penalty=0,
      presence_penalty=0
    )
    response = completion.choices[0].text
    return response
 