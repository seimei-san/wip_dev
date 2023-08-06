##################################################
### Generate and send the prompt to ChatGPT   ####
##################################################


import openai

from dotenv import load_dotenv
import os
import json

load_dotenv()

openai.organization=os.getenv('AI_ORG')
openai.api_key=os.getenv('AI_KEY')


#########################
# generate a prompt based on the received Chatbot mesasge
#########################
def prompt_generator(msgs_json, prompt_ask_s, prompt_ask_m):
    msg_in = []
    msg_in.append(msgs_json)
    prompt = []
    for msg in msg_in:
      speaker = msg['display_name']
      # msg_txt = speaker + 'は言いました。' + msg['message']
      msg_txt = msg['message']
      msg_json = {'role':'user', 'content': msg_txt}
      prompt.append(msg_json)

    if len(msgs_json) == 1:
      prompt_json = {'role':'user', 'content': prompt_ask_s}
      prompt.append(prompt_json)
    else:
      prompt_json = {'role':'user', 'content': prompt_ask_m}
      prompt.append(prompt_json)

    print("PROMPT: ", prompt)

    return prompt

##########################
# send the generated prompt to ChatGPT (ChatCompletion)
##########################
def ask_ChatCompletion(msgs_json, model, max_tokens, n, stop, temperature):
    completion = openai.ChatCompletion.create(
        model = model,
        messages = msgs_json,
        max_tokens = max_tokens,
        n = n,
        stop = stop,
        temperature = temperature
    )
    response = completion.choices[0].message.content
    # response = completion
    return response






if __name__ == "__main__":

    msgs_json_sample = [
        {'display_name': 'Symbot3 Kurosawa', 'user_id': 349026222360289, 'conversation_id': 'elNBjhvc4uirR7ZEyB_7XH___ndWQpHtdA', 'message_id': 'xw3Yz6GNWRodlGrfN5ehCX___ndFkUpkbQ', 'timestamp': 1686754997659, 'message': '明日の夕方までに資料を作ってください'},
        {'display_name': 'Symbot3 Kurosawa', 'user_id': 349026222360289, 'conversation_id': 'elNBjhvc4uirR7ZEyB_7XH___ndWQpHtdA', 'message_id': 'xw3Yz6GNWRodlGrfN5ehCX___ndFkUpkbQ', 'timestamp': 1686754997659, 'message': '最悪、明日の11時まで'},
        {'display_name': 'Symbot3 Kurosawa', 'user_id': 349026222360289, 'conversation_id': 'elNBjhvc4uirR7ZEyB_7XH___ndWQpHtdA', 'message_id': 'xw3Yz6GNWRodlGrfN5ehCX___ndFkUpkbQ', 'timestamp': 1686754997659, 'message': '社長が会議で新商品を説明するために必要なんです。'}
        ]

    print(ask_ChatCompletion(prompt_generator(msgs_json_sample)))
    # print(ask_Completion())