Server Side Request Forgery
==========
SSRF is a web security vulnerability in which an attacker trick a web application server to fetch content from internally hosted web server
or attack can perform ip& portscanning.

<h3>Case 1: Normal SSRF scenario</h3>
In this case, web application is processing HTTP URL through GET/POST parameter and fetching the HTTP response from specified URL.
For exmple:

      http://b0x.com/index.php?wg=http://remote_host/image.jpg
An attacker can pass the arbitrary URLs such as internal hosts IP. 
For example:

      http://b0x.com/index.php?wg=http://internal_host/admin/
      
<h3>Case 2: File read functionality</h3>
In this case, web application is reading file saved on the server.
For eaxmple:

      http://b0x.com/index.php?read=log.txt
In this case, if web application is passing the user supplied data directly to a function which can read files not just from local system but also from HTTP URL, an attacker can perform SSRF.
For example:

      http://b0x.com/index.php?read=http://internal_host/admin/
      
<h3>Case 3: Dns Spoofing</h3>
In this case,The web application has funcionality which allow user to fetch data from remote URL. User need to specify the remote URL with any IP or domain name.
For example:
           
                   http://web.com/index.php?loadfile=http://127.0.0.1/b0x.txt 

The web application perform check if user has specified the input as "localhost", "Internal IPs" or "Reserved IPs". If domain/IP specified by user is blacklisted, script will not fetch the content and stop processing.
 
 so when the web app is blacklisting the reserved and internal IPs then we can purchase a domain and bind that domain with the reserved IP
 or internal IPs and can trick the web application an perform SSRF.
 For example:
                
                http://web.com/index.php?loadfile=http://owndomain/b0x.txt

<h3>Case 4:HTML to PDF generater script</h3>
In this case, This is the scenrio of the web app which is using HTML to PDF generator script and passing untrusted user supplied data to HTML file which is processed by HTML to PDF generator.


In this case, if attacker supplied data is not getting senitized or filtered before placing it to HTML code, attacker can trick "HTML to PDF generator" software to access the internal Hosts/domains.
When HTML code will be processed by the "HTML to PDF generator", HTML code will be evaluated to corresponding representation of that HTML code in web browser. 



For example:
            
                                          Payloads

         To grab the data from HTTP based URL, use below mentioned style payload

                  <link rel=attachment href="http://web_URL">
                  <link rel=attachment href="http://localhost/admin.php">
                  
         To grab the data from internal file system, use below mentioned style payload

                  <link rel=attachment href="file://internal_file_path">
                  <link rel=attachment href="file:///etc/passwd">

                    

<h3>Case 5:PORT And IP Scaning</h3>
In this case an attacker is able to scan the server for its open ports. This is usually done by using the loopback interface on the server (127.0.0.1 or localhost) with the addition of the port that is being scanned (21, 22, 25…).

Some examples are:

             https://b0x.com/page?url=http://localhost:22/
             https://b0x.com/page?url=http://127.0.0.1:25/
             https://b0x.com/page?url=http://127.0.0.1:3389/
