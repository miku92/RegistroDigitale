#!/usr/bin/env python

#importiamo le libreire
import MySQLdb
import serial,sys
import datetime,time
import I2C_LCD_driver
from time import sleep

#creiamo l'oggetto lcd
mylcd = I2C_LCD_driver.lcd()


#creiamo l'oggetto db per collegarci al database
db = MySQLdb.connect("localhost", "USERNAME", "PASSWORD", "Nome_DB")
#creiamo un cursore per 'scorrere' sul database
curs=db.cursor()
username=""

idimpronta=-1

#creaiamo un oggetto 'serial' per metterci in ascolto e per dialogare con Arduino
ser = serial.Serial(port='/dev/ttyAMA0',baudrate = 9600, parity=serial.PARITY_NONE, stopbits=serial.STOPBITS_ONE,
              bytesize=serial.EIGHTBITS,
              timeout=1
          )

         
while 1:
    #leggiamo quello che arriva da seriale
    linea = ser.readline()
    #le prossime tre istruzioni servono a scrivere sul lcd
    mylcd.lcd_clear()
    mylcd.lcd_display_string("Lettore",1,5)
    mylcd.lcd_display_string("pronto",2,5)
    #verifichiamo se è presente la stringa "verified id"
    if "Verified ID:" in linea:
        #se è presente allora al lettore di impronte c'è un utente riconosciuto
        idimpronta=linea[linea.index(":")+1:]
        #scriviamo sul display
        mylcd.lcd_clear()
        mylcd.lcd_display_string("Verificato",1)
        mylcd.lcd_display_string("e inserito",2)
        mylcd.lcd_display_string(idimpronta,2,15)
        sleep(4)
        #inseriamo sul database la 'firma' del docente
        try:
            #prendiamo dal sistema operativo l'ora e la data 
            d = datetime.date.today()
            h = time.strftime("%H:%M:%S")
            oggi = str(d) 
            ora = str(h)
            q =  "INSERT INTO Badge_prof (improntaID, Data, Ora) VALUES (\'"+idimpronta+"\',\'"+oggi+"\',\'"+ora+"\')"
            #w = "Update Corpo_Docente SET ImprontaID='"+str(idimpronta)+"'  where Username="+username
            curs.execute (q)
            db.commit()
        except:
            sleep(1)

