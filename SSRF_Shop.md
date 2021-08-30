Server Side Request Forgery
==========

<h3>Case 1: Normal SSRF scenario</h3>
In this case, web application is processing HTTP URL through GET/POST parameter and fetching the HTTP response from specified URL.
For exmple:

      http://web.com/index.php?wg=http://remote_host/image.jpg
An attacker can pass the arbitrary URLs such as internal hosts IP. 
For example:

      http://web.com/index.php?wg=http://internal_host/admin/
      
<h3>Case 2: File read functionality</h3>
In this case, web application is reading file saved in server.
For exmple:

      http://web.com/index.php?read=log.txt
In this case, if web application is passing the user supplied data directly to a function which can read files not just from local system but also from HTTP URL, an attacker can perform SSRF.
For example:

      http://web.com/index.php?read=http://internal_host/admin/
      
