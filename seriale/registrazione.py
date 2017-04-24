#!/usr/bin/env python

#importisamo le librerie         
from time import sleep
import serial,sys,os
import MySQLdb
import I2C_LCD_driver
from time import *

#creiamo l'oggetto LCD
mylcd = I2C_LCD_driver.lcd()

#creiamo la connnessione al database
db = MySQLdb.connect("localhost", "USERNAME", "PASSWORD", "Nome_DB")
#creiamo il cursore per scorrere sul database
curs=db.cursor()
username=""

#affinche la registrazione sia corretta c'è la necessità che si inseriscano
#4 valori che sono nome cognome username e password del docente
#quindi qui sotto controlliamo che ci siano tutti e in caso di risposta
#affermativa continuiamo altrimenti usciamo chiudendo il programma
if len(sys.argv)!=4:
    sys.exit()
else:
    #scriviamo sul display che la registrazione sta cominciando
    mylcd.lcd_clear()
    mylcd.lcd_display_string(u"registrazione")
    #prendiamo i parametri e li asswegnamo alle variabili
    nome=sys.argv[1]
    cognome=sys.argv[2]
    username=sys.argv[3]
    sleep(3)
    #scriviamo sul display nome e cognome del docente in fase di registrazione
    mylcd.lcd_clear() 
    mylcd.lcd_display_string(nome,1)
    mylcd.lcd_display_string(cognome,2)
    sleep(3)
username="'"+username+"'"
#qui uccido il progamma che sta leggendo da seriale          

os.system("sudo pkill -f /home/pi/Desktop/serial/registroImpronte.py")

#avvio un anuova seriale
ser = serial.Serial(port='/dev/ttyAMA0',baudrate = 9600, parity=serial.PARITY_NONE, stopbits=serial.STOPBITS_ONE,
              bytesize=serial.EIGHTBITS,
              timeout=1
          )
registrazione=True
idimpronta=-1      

#Scrivo sulla seriale "reg\n" che viene interpretato da Arduino
#come il comando per avviare la registrazione 
ser.write("reg\n")
sleep(2)

while registrazione:
    #mi metto in ascolto sulla seriale
    a=ser.readline()
    #da qui in poi distinguo i vari casi che ci possono essere
    #grazie alle verie stringhe che ci arrivano dall'Arduino
    #ripetendo sempre le stesse operazioni:
    #    -verifico la stringa
    #    -scrivo sul lcd l'operazipone da eseguire
    if "Procedo con la registrazione" in a:
        mylcd.lcd_clear()
        mylcd.lcd_display_string("Appoggiare dito",1)
        mylcd.lcd_display_string("sul sensore",2)
        #print "Prego appoggiare il dito sul sensore"
    elif "Rimuovere il dito" in a:
        mylcd.lcd_clear()
        mylcd.lcd_display_string("Rimuovere dito")
        #print "Rimuovere il dito" 
    elif "premere nuovamente" in a:
        mylcd.lcd_clear()
        mylcd.lcd_display_string("Appoggiare dito",1)
        mylcd.lcd_display_string("sul sensore",2)
#        print "Ripremere il sensore" 
    elif "Premere per l'ultima volta" in a:
        mylcd.lcd_clear()
        mylcd.lcd_display_string("Appoggiare dito",1)
        mylcd.lcd_display_string("sul sensore",2)
        #print "Premere per l'ultima volta"

    elif "Eseguito con successo in" in a:
        #quando arriviamo qui vuol dire che la registrazione è avvenuta con successo
        #come le atre volte scrivo sul display 
        #con la differenza però che ora vado a scrivere anche sul database
        mylcd.lcd_clear()
        mylcd.lcd_display_string("Registrazione",1)
        mylcd.lcd_display_string("eseguita",2)

        
        idimp=a[a.index("pos: ")+len("pos: "):]
        idimpronta=int(idimp) 
        registrazione = False
        
#istruzioni per scrivere sul database  
try:
    #curs.execute ("INSERT INTO Corpo_Docente (`ImprontaID`,`Nome`,`Cognome`,`Username`,`Password`) values(201,'"+a+"','"+b+"','"+c+"','"+d+"')")
    w = "Update Corpo_Docente SET ImprontaID='"+str(idimpronta)+"'  where Username="+username
    curs.execute (w)
    db.commit()

except:
    db.rollback()    

#riavvio il programma che legge da seriale
os.system("sudo python /home/pi/Desktop/serial/registroImpronte.py &")
