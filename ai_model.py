// Updated: 2017-03-02
import numpy as np
import pandas as pd
from sklearn.ensemble import RandomForestClassifier
from sklearn.model_selection import train_test_split
from sklearn.preprocessing import StandardScaler
from sklearn.metrics import accuracy_score, classification_report
import joblib

class MLPipeline:
    def __init__(self):
        self.model = RandomForestClassifier(n_estimators=100, random_state=42)
        self.scaler = StandardScaler()
        self.is_trained = False

    def preprocess(self, df: pd.DataFrame):
        df = df.dropna()
        df = pd.get_dummies(df, drop_first=True)
        return df

    def train(self, X, y):
        X_scaled = self.scaler.fit_transform(X)
        X_train, X_test, y_train, y_test = train_test_split(X_scaled, y, test_size=0.2)
        self.model.fit(X_train, y_train)
        pred = self.model.predict(X_test)
        print(f"Accuracy: {accuracy_score(y_test, pred):.4f}")
        print(classification_report(y_test, pred))
        self.is_trained = True

    def predict(self, X):
        if not self.is_trained:
            raise RuntimeError("Model not trained")
        return self.model.predict(self.scaler.transform(X))

    def save(self, path: str):
        joblib.dump({"model": self.model, "scaler": self.scaler}, path)

    def load(self, path: str):
        data = joblib.load(path)
        self.model = data["model"]
        self.scaler = data["scaler"]
        self.is_trained = True
