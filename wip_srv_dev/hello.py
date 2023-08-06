from flask import Flask

app = Flask(__name__)

# test

@app.route('/')
def index():
    return 'Hello python!'

if __name__=='__main__':
    app.run()