import sys
sys.dont_write_bytecode = True
from dotenv import load_dotenv
import os
import threading

from src import app



if __name__ == '__main__':
    # app.run(debug=True)
    load_dotenv()
    port = os.getenv('FLASK_PORT')
    host = os.getenv('FLASK_HOST')
    app.run(debug=True, port=port, host=host)
    
    
    
    # app.run(debug=True, port=5000, ssl_context=('./certs/wip_srv.crt', './certs/wip_srv.key'), host='0.0.0.0')