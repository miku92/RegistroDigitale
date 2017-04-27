/***
 * Script per il Registro Digitale
 * Usiamo Arduino per collegare il sensore di impronte 
 * al raspberry pi zero.
 * Se usiamo la scheda Arduino uno c'è necessità di inserire delle resistenze
 * creando un partitore di tensione, altrimenti se usiamo un atmega328p-pu
 * direttamente su breadboard e lo alimentiamo a 3.3V e possiamo farne a meno.
 * 
 */

//Qui stiamo importando le librerie
#include "FPS_GT511C3.h"
#include "SoftwareSerial.h"

//Creiamo ora un oggetto chiamato fps
//che sarà usato per interfacciarci con il sensore.
FPS_GT511C3 fps(4, 5);

String inputString = "";         // stringa per contenere i dati che arrivano dalla seriale
boolean stringComplete = false;  // quando la stringa è pronta questo valore passa a True(vero)
/***
 * un programma di arduino deve contenere sempre almeno questi 2 metodi:
 * setup: che è dove si impostano le cose che ci serviranno dopo
 * loop: è ciò che arduino esegue in un ciclo infinito da capo a fine
 */
void setup() {
  // Inizializziamo la seriale:
  Serial.begin(9600);
  // riserviamo 200 byte per il messaggio che arriverà dalla seriale:
  inputString.reserve(200);
  //iniziamo ad usare il nostro oggetto 'fps'
  //aprendo la comunicazione e accendendo il led  
  fps.Open();
  fps.SetLED(true);
}

void loop() {
  //chiamiamo un terzo metodo(o funzione)
  serialEvent(); 
  // quando la stringa è completa vediamo cosa 
  // ci viene richiesto e ci comportiamo di conseguenza
  if (stringComplete) {
    //verifichiamo la stringa che proviene dal Raspberry 
    if (inputString == "reg\n") { //se è uguale a: reg\n
      //allora eseguo queste istruzioni:
      Serial.println("Procedo con la registrazione");
      Enroll();//chiamiamo il metodo per registrare le impronte
    }
    
    else if (inputString == "canc\n") {//se la stringa è uguale a: canc\n 
      //eseguiamo queste operazioni(per ora stampa solamente)
      Serial.println("elimino");
    }
    //stampiamo la stringa che proviene da seriale del Raspberry
    Serial.println(inputString);
    // 'puliamo' la stringa:
    inputString = "";
    stringComplete = false;
  }
}
/*
  dentro questo metodo verifichiamo se qualcuno sta usano il lettore 
  e se ci sono dei dati dalla seriale del raspberry
 */
void serialEvent() {
  //QUI leggo le impronte
  if (fps.IsPressFinger()){//se qualcuno sta premendo 
    //allora cattura l'impronta
    fps.CaptureFinger(false);
    //assegna l'id corrispondente 
    int id = fps.Identify1_N();
    if (id < 200){//se l'id(un numero intero) è inferiore a 200 vuol dire che 
      //chi sta usando il lettore è un utente verificato
      Serial.print("Verified ID:");//stampiamo: verified ID 'x'
      Serial.println(id);//dove 'x' sta per l'id dell'utente
    }
    else{
      //se l'utente non è riconosciuto ha un id superiore a 200 e quindi 
      //stampiamo: finger not found
      Serial.println("Finger not found");
    }
  }
  delay(300);//delay è un metodo per 'bloccare' arduino
  //cioè il valore compreso tra le parentesi,espresso in millisecondi,
  //rappresenta il tempo durante il quale arduino sospenderà l'esecuzione del programma

  
  while (Serial.available()) {//se è disponibile qualche dato della seriale 
    //lo leggiamo
    // prendiamo i nuovi byte:
    char inChar = (char)Serial.read();
    // sommiamo i byte arrivati alla stringa:
    //creiamo cioè la frase lettera per lettera
    inputString += inChar;
    
    if (inChar == '\n') {// se arriva il carattere di terminazione  
      //entriamo dentro l'if e segnaliamo che la stringa è conclusa
      stringComplete = true;
    }
  }
}
/***
 * questo metodo memorizza le impronte sul sensore
 */
void Enroll(){
  // prima cosa cerca la prima posizione libera sul lettore (tra 0 e 200)
  int enrollid = 0;
  bool usedid = true;
  while (usedid == true){
    usedid = fps.CheckEnrolled(enrollid);
    if (usedid==true) enrollid++;
  }
  //appena la trova comincia la registrazione
  fps.EnrollStart(enrollid);

  // cattura 3 volte l'impronta 
  // riproponendo lo stesso codice
  Serial.print("Premere sul sensore");
  Serial.println(enrollid);
  // verifica che il dito è sul sensore 
  while(fps.IsPressFinger() == false) delay(100);
  // se è presente cattua l'immagine
  bool bret = fps.CaptureFinger(true);
  int iret = 0;
  if (bret != false){
    //se non è la terza volta che registra l'ipronta prosegue
    Serial.println("Rimuovere il dito");
    fps.Enroll1(); 
    //aspetta che si schiacci nuovamente il sensore
    while(fps.IsPressFinger() == true) delay(100);
    Serial.println("premere nuovamente");
    while(fps.IsPressFinger() == false) delay(100);
    //cattura per la seconda volta l'impronta
    bret = fps.CaptureFinger(true);
    if (bret != false){
      //se non è la terza volta che registra l'ipronta prosegue
      Serial.println("Rimuovere il dito");
      fps.Enroll2();
      while(fps.IsPressFinger() == true) delay(100);
      Serial.println("Premere per l'ultima volta");
      while(fps.IsPressFinger() == false) delay(100);
      //cattura per la terza volta l'impronta
      bret = fps.CaptureFinger(true);
      if (bret != false){//è la terza volta quindi memorizza l'impronta e comunica 
        //l'avvenuta registrazione
        Serial.println("Rimuovere il dito");
        iret = fps.Enroll3();
        if (iret == 0){
          Serial.print("Eseguito con successo in pos: ");
          Serial.println(enrollid);
        }
        else{
          Serial.print("Enrolling fallito con codice di errore:");
          Serial.println(iret);
        }
      }
      else Serial.println("Failed to capture third finger");
    }
    else Serial.println("Failed to capture second finger");
  }
  else Serial.println("Failed to capture first finger");
}

