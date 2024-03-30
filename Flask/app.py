import json
from flask import Flask, jsonify, request
import numpy as np
import pickle

diabetes_model= pickle.load(open('/Users/omsitapara/Desktop/DiagnoSafe/TrainedModel/DiabetesTrainedModel.pkl','rb'))
heart_model= pickle.load(open('/Users/omsitapara/Desktop/DiagnoSafe/TrainedModel/HeartDiseaseTrainedModel.pkl','rb'))
lung_model= pickle.load(open('/Users/omsitapara/Desktop/DiagnoSafe/TrainedModel/LungCancerTrainedModel.pkl','rb'))

app = Flask(__name__)

@app.route('/predict-diabetes', methods=['POST'])
def predict_diabetes():
 data = json.loads(request.data)
 input = [data['gender'],data['age'], data['hypertension'],data['heartdisease'],data['bmi'],data['hba1c'],data['glucose']]
 numpyArray = np.asarray(input)
 inputData = numpyArray.reshape(1,-1)
 result=diabetes_model.predict(inputData)
 return jsonify({"result": 0 if result[0] == 0 else 1}), 200

@app.route('/predict-heart', methods=['POST'])
def predict_heart():
 data = json.loads(request.data)
 input = [data['age'],data['sex'], data['cpt'],data['rbp'],data['chol'],data['fbs'],data['recg'],data['mhr'],data['ang'],data['olp'],data['sts']]
 numpyArray = np.asarray(input)
 inputData = numpyArray.reshape(1,-1)
 result=heart_model.predict(inputData)
 return jsonify({"result": 0 if result[0] == 0 else 1}), 200

@app.route('/predict-lung', methods=['POST'])
def predict_lung():
 data = json.loads(request.data)
 input = [int(data['gender']),int(data['age']),int(data['smoking']),int(data['yf']),int(data['anx']),int(data['pp']),int(data['chd']),int(data['fatigue']),int(data['allergy']),int(data['wheezing']),int(data['alco']),int(data['cough']),int(data['sb']),int(data['diffs']),int(data['cp'])]
 numpyArray = np.asarray(input)
 inputData = numpyArray.reshape(1,-1)
 result=lung_model.predict(inputData)
 return jsonify({"result": 0 if result[0] == 0 else 1}), 200

if __name__ == '__main__':
   app.run(port=5000)

