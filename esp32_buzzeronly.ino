#include<WiFi.h>
#include<HTTPClient.h>


#define trig_pin 2
#define echo_pin 3
#define buzzer 4

const char* ssid ="ETEFOP";
const char* password ="Etefop@123";

int distance;
long duration;

void setup(){
  Serial.begin(115200);

  pinMode(trig_pin, OUTPUT);
  pinMode(echo_pin, INPUT);
  pinMode(buzzer, OUTPUT);

  WiFi.begin(ssid,password);

  while(WiFi.status() != WL_CONNECTED){
    Serial.println("Connecting to Wifi...");
    delay(500);
  }
  Serial.println("Connected to WiFi");

}

void loop(){
  digitalWrite(trig_pin,LOW);
  delayMicroseconds(2);

  digitalWrite(trig_pin,HIGH);
  delayMicroseconds(10);

  digitalWrite(trig_pin,LOW);

  //digitalWrite(buzzer,LOW);
  noTone(buzzer);

  duration = pulseIn(echo_pin,HIGH);
  distance = duration * 0.034/2;

  Serial.print("Distance: ");
  Serial.println(distance);

  if(distance <= 400){
    //digitalWrite(buzzer, HIGH);
    tone(buzzer, 500);

    sendData(distance, "WARNING");


  }
  else{
    //digitalWrite(buzzer, LOW);
    noTone(buzzer);

    sendData(distance, "SAFE");

  }
  delay(1000);
}

void sendData(int distance, String status){
  HTTPClient http;

  String url="http://192.168.0.115/monday/insert.php?distance=" + String(distance) + "&event_status=" + status;

  http.begin(url);
  http.GET();
  http.end();
}
