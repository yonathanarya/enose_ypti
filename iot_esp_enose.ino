#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>
#include <Wire.h>

const char* ssid     = "ulululu";
const char* password = "12345678";
const char* serverName = "http://enose-ypti.masuk.id/post-esp-data.php";

String apiKeyValue = "tPmAT5Ab3j7F9";
String sensorLocation = "Mesin1";
String myString;
char c;
int Index1,Index2,Index3,Index4,Index5,Index6;
String firstValue, secondValue, thirdValue, fourthValue, fifthValue;
void sendHttp();

void setup() 
{
  Serial.begin(57600);
  while (!Serial);
  Serial.println("IoT System for Polymer Gas Detector");
  WiFi.begin(ssid, password);
  Serial.println("Connecting");
  while(WiFi.status() != WL_CONNECTED) { 
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.print("Connected to WiFi network with IP Address: ");
  Serial.println(WiFi.localIP());  
}

void loop(){
  while(Serial.available()>0){
    delay(10);
    c = Serial.read();
    myString += c;
  }
  if(myString.length()>0){
    Index1 = myString.indexOf('#');
    Index2 = myString.indexOf(',', Index1+1);
    Index3 = myString.indexOf(',', Index2+1);
    Index4 = myString.indexOf(',', Index3+1);
    Index5 = myString.indexOf(',', Index4+1);
    Index6 = myString.indexOf(',', Index5+1);
    firstValue = myString.substring(Index1+1, Index2);
    secondValue = myString.substring(Index2+1, Index3);
    thirdValue = myString.substring(Index3+1, Index4);
    fourthValue = myString.substring(Index4+1, Index5);
    fifthValue = myString.substring(Index5+1, Index6);
    Serial.print("data 1:");Serial.println(firstValue);
    Serial.print("data 2:");Serial.println(secondValue);
    Serial.print("data 3:");Serial.println(thirdValue);
    Serial.print("data 4:");Serial.println(fourthValue);
    Serial.print("data 5:");Serial.println(fifthValue);
    myString="";
    sendHttp();
  }
}

void sendHttp(){
    if(WiFi.status()== WL_CONNECTED){
    WiFiClient client;
    HTTPClient http;
    http.begin(client, serverName);
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");
    String httpRequestData = "api_key=" + apiKeyValue + "&location=" + sensorLocation + "&mq3=" + firstValue + "&mq7=" + secondValue + "&mq9=" + thirdValue + "&mg811=" + fourthValue + "&tgs2600=" + fifthValue + "";
    Serial.print("httpRequestData: ");
    Serial.println(httpRequestData);
    int httpResponseCode = http.POST(httpRequestData);

    if (httpResponseCode>0) {
      Serial.print("HTTP Response code: ");
      Serial.println(httpResponseCode);
    }
    else {
      Serial.print("Error code: ");
      Serial.println(httpResponseCode);
    }
    http.end();
  }
  else {
    Serial.println("WiFi Disconnected");
  }
}
