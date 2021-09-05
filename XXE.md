XML External Entity
=====
XXE is a server side vulnernability,it is a web security vulnerability and it is a type of attack against web application that parses XML input.This attack occur when 
XML input conatining reference to an external entity is processed by a weakly configured XML parser.

<h3>Basic External Entity Payload for File disclosure</h3>

     <!--?xml version="1.0" ?-->
     <!DOCTYPE replace [<!ENTITY ent SYSTEM "file:///etc/shadow"> ]>
     <userInfo>
     <firstName>John</firstName>
     <lastName>&ent;</lastName>
     </userInfo>
     
 XXE attacks cases⤵️

<h3>Case:1 Exploiting XXE to Retrieve Files</h3>
Where an external entity is defined containing the contents of a file, and returned in the application's response.

<h3>Case:2 Exploiting XXE to Perform SSRF Attacks</h3>	
Where an external entity is defined based on a URL to a back-end system.

<h3>Case:3 Exploiting Blind XXE Exfiltrate Data Out-of-Band</h3>
Where sensitive data is transmitted from the application server to a system that the attacker controls.

<h3>Case:4 Exploiting blind XXE to Retrieve Data Via Error Messages</h3>	

Where the attacker can trigger a parsing error message containing sensitive data.    

<h3>How to prevent XXE vulnerabilities</h3>

Virtually all XXE vulnerabilities arise because the application's XML parsing library supports potentially dangerous XML features that the application does not need or intend to use. The easiest and most effective way to prevent XXE attacks is to disable those features.

Generally, it is sufficient to disable resolution of external entities and disable support for XInclude. This can usually be done via configuration options or by programmatically overriding default behavior. Consult the documentation for your XML parsing library or API for details about how to disable unnecessary capabilities.


![ENTITY](https://user-images.githubusercontent.com/63788460/131953581-cbd117e1-e874-42e3-8982-3df94f6d5beb.jpeg)

