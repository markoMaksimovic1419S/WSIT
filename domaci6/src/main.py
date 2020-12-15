from flask import Flask, render_template,redirect, url_for, request, session
from pymongo import MongoClient
from bson import ObjectId
from datetime import datetime
import hashlib

import mysql.connector
app = Flask(__name__)
app.config['SECRET_KEY'] = 'januar2020'


mydb = mysql.connector.connect(
	host="localhost",
	user="root",
	password="",
	database="dz67"
    )

kontroler = mydb.cursor()



@app.route('/raspored')
def raspored():


    kontroler.execute("SELECT * FROM raspored")
    a = kontroler.fetchall()
    kontroler.execute("SELECT DISTINCT nastavnik FROM raspored")
    b = kontroler.fetchall()
    kontroler.execute("SELECT DISTINCT vreme FROM raspored")
    c = kontroler.fetchall()
    x = []
    for i in range(max(len(b), len(c))):
        try:
            x.append((b[i][0], c[i][0].strip()))
        except:
            try:
                x.append((b[i][0], None))
            except:
                x.append((None, c[i][0].strip()))
                
    return render_template('index.html', a=a, b=b, c=c, x=x)



if __name__ == '__main__':
	app.run(debug=True)