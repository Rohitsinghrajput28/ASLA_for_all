Cross-Site Scripting
====
Xss is a web security vulnerability.It is client side attack in which the user supplied javascript or HTML tag injected on web application
and the output reflect on the web page.

XSS is classified as Three types:

1.Reflected XSS

   2.Stored XSS

   3.DOM XSS(Document object Model)

<h3>Explanation</h3>

<h3>1.Reflected XSS:</h3>
It is a type of XSS in which user supplied script or HTML code is REFlected on web application
    It is non-Persistent XSS.
       
           For Example:
           
                      Search field,any input field,error message.
                      or any other response.
              
<h3> 2.Stored XSS:</h3>

   It is a type of XSS in which user supplied script or HTML code is permanently saved on web application until the victim visits it
        It is Persistent XSS.
        
            For Example:
                      In a database,visitor log,comment filed,message forum
              
  <h3>3.DOM XSS:</h3>    
  It is a type of XSS in which user supplied data is passing in client-side script.
            
            
<H3>Prevention</h3>

1.Filter input on arrival:

At the point where user input is received, filter as strictly as possible based on what is expected or valid input.

2.Encode data on output:

At the point where user-controllable data is output in HTTP responses, encode the output to prevent it from being interpreted as active content. Depending on the output context, this might require applying combinations of HTML, URL, JavaScript, and CSS encoding.

3.Use appropriate response headers:

To prevent XSS in HTTP responses that aren't intended to contain any HTML or JavaScript, you can use the Content-Type and X-Content-Type-Options headers to ensure that browsers interpret the responses in the way you intend.



    When web application is converting the user input values to upper case

              <SVG ONLOAD=&#97&#108&#101&#114&#116(1)>
