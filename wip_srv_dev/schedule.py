
#######################################################################
##### Scheduler for sending WIP reports and Training Materials based on the pre-defined taining plan
#######################################################################
import asyncio
import os
import threading
import datetime
import time
import glob
import yaml



global thread_base
global stop_flag

def scheduler_loop_start():
    global thread_base
    global stop_flag
    stop_flag = False
    thread_list = threading.enumerate()
    thread_list.remove(threading.main_thread())
    already_running = False
    for a_thread in thread_list:
        if a_thread.name in ("Thread-1", "Thread-2", "Thread-3"):
            already_running = True
            print("A Thread is already running")
            break
    
    if not already_running:
        thread_base = threading.Thread(target=scheduler_loop)
        thread_base.start()


def scheduler_loop_stop():
    global thread_base
    global stop_flag
    thread_list = threading.enumerate()
    thread_list.remove(threading.main_thread())
    for a_thread in thread_list:
        if a_thread.name in ("Thread-1", "Thread-2", "Thread-3"):
            stop_flag = True
            thread_base.join()
            break




def scheduler_loop():
    global stop_flag
    with open('wip_params/scheduler_params.yaml') as file:
        params = yaml.safe_load(file.read())
        interval = params['SCH_INTERVAL_MIN']
    current_datetime = datetime.datetime.now().replace(microsecond=0)
    target_datetime = current_datetime.replace(microsecond=0) + datetime.timedelta(minutes=interval)
    print("scheduler_loop is started")
    while True:

        if stop_flag:
            print("scheduler_loop: STOPPED")
            break
        elif current_datetime >= target_datetime:
            print("check training/report items")
            
            current_datetime = datetime.datetime.now().replace(microsecond=0)
            target_datetime = current_datetime.replace(microsecond=0) + datetime.timedelta(minutes=interval)
        else:
            current_datetime = datetime.datetime.now().replace(microsecond=0)

        time.sleep(10)
        print(current_datetime)


if __name__=="__main__":
    scheduler_loop_start()
