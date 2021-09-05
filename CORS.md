Cross-Origin Resource Sharing
=======
CORS is a web security vulnerability that enables web browser to perform cross domain request using XHR(XMLhttprequest)API in a controlled manner.
The Cross origin header also have an origin Request which defines domain intiating request.It also defines the protocol to use between the a web browser and server to check 
whether a cross origin request is allowed or not.

<h3>CORS cases</h3>

<h3>Case1:CORS with arbitrary origin Reflection</h3>
In this case, web application accept CORS request from any Origin. The code put the "Origin" value in HTTP response header 
"Access-Control-Allow-Origin". Now, this configuration will allow any script from any "Origin" to make CORS request 
to application. Web browser will perform standard CORS request checks and Script from malicious domain will be able to steal the data.


<h3>Case2:Application has bad regex</h3>
In this case web application has weak regex implementation in code which just check for presence of domain name "b0x.com" anywhere HTTP request "origin" header.
If HTTP header "Origin" has value "inb0x.com" or b0x.comlab.com, regex will mark it pass. This misconfiguration 
will lead to sharing of data over cross origin.

<h3>Case3:Application Trust "null" Origin</h3>
In this scenario, application HTTP response header "Access-Control-Allow-Origin" is always set to "null".
When user specify any value other than null, application does not process it and keep reflecting "null" in HTTP response.
There are few tricks which allow an attacker to perform exploitation and can ex-filtrate data of victim using CORS request.

<h3>How to prevent CORS-based attacks</h3>
CORS vulnerabilities arise primarily as misconfigurations. Prevention is therefore a configuration problem. The following sections describe some effective defenses against CORS attacks.

<h3>1.Proper configuration of cross-domain requests</h3>
If a web resource contains sensitive information, the origin should be properly specified in the Access-Control-Allow-Origin header.

<h3>2.Only allow trusted sites</h3>
It may seem obvious but origins specified in the Access-Control-Allow-Origin header should only be sites that are trusted. In particular, dynamically reflecting origins from cross-domain requests without validation is readily exploitable and should be avoided.

<h3>3.Avoid whitelisting null</h3>

Avoid using the header Access-Control-Allow-Origin: null. Cross-domain resource calls from internal documents and sandboxed requests can specify the null origin. CORS headers should be properly defined in respect of trusted origins for private and public servers.





