Cross-site Request Forgery
============
It stands for cross-site request forgery,
     it is a client side vulnerability,it is a web security vulnerability that allows an attacker
     to perform unwanted activty on behalf of end user on the web application where he is currently 
     authenticated.
     
  <h3>To Test CSRF:</h3>
     It mainly occur where some event is perform like updates of data,some submission of data or any other request changing 
     function is happening.so, to create a form by using burp suite or manually by including all the parameters.
     then host the POC at any IP that is rechable to victim such as internet based server and then submit form to 
     the vulnerbale URL and at last test the creditianls.
     
<h3>We can Perform </h3>

1. Reputation damage
2. Financial gain or loss
3. DOS attack
            
  <h3>Basic form including parameters</h3>
     For example:
     
     <html>
     <body>
     <form method="GET" action="http://b0x.com/changepasword">
     <input type="hidden" name="new_password" value="pass123">
     <input type="hidden" name="conf_password" value="pass123">
     <input type="submit" name="change">
     </form>
     <body>
     </html>
     
     
   <h3>CSRF Scenerios</h3>
     
   <h3>case1: Normal CSRF</h3>
     In this case, web application is not performing any check on form submission like addition,deletion,moditification so now we can directly host the poc on the vulnerable url and whenever victim visits the form the event will be performed.
     
   <h3>case2: CSRF Token</h3>
     
  1.In this case , web application is checking the token bind with the authorized user
     so here, we can check by providing the attacker's account token and replace it in burp suite to check whether it is processing or not.
     
   2.Justification:valid token
     we can also check that whether web application is checking valid token only or not. Random token with same length.
     
  3.Removing the token as well as token parameter value that whether web application is parsing a user without token   
     
  4. we can change request method if there is "GET" method we can change it to "POST"
  
  
 <h3>Case3:Referer Header Check</h3>
     When web application is checking the referer header
      defaultly set by the web browser and it
      can't be spoof/design
      
   For example :
    We have 
  
     referer: http://abc.com/previous_web_page.html
   We can add Regex as 
   
     referer: http://abc.combox.in
                  
   We need to purchase the domain name as "combox.in"
   
   Host the POC by creating form and make the victim to perform the event.
   
 <H3>PREVENTION</H3>
 
 1.Unpredictable with high entropy, as for session tokens in general.
 
 2.Tied to the user's session.
 
 3.Strictly validated in every case before the relevant action is executed.
   

              
      
  
