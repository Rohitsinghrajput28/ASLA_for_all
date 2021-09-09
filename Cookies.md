COOKIES
===
An HTTP cookie is a small piece of data that a server sends to the user's web browser.
The Browser may store it and send it back with the later request to the same server.
Typically,it remembers the stateful information of stateless HTTP protocol

It is used in following sections which are as given below:
<h3>Session Managment:</h3>
1.Login
2.Shopping
3.Game score

<h3>Personalization:</h3>
1.User Preference
2.Themes
3.Other setting

<h3>Tracking</h3>
1.Recording

 2.Analyzing user's behaviour
 
<h3>Syntax:</h3>

      Set-Cookie: <name>=<value>[; <Max-Age>=<age>] [; expires=<date>][; domain=<domain_name>] [; path=<some_path>][; secure][; HttpOnly]

 <h3> Five attributes of cookie are as follows:</h3>
<h3>Expire</h3>
Sets a date until which the cookie is valid.This causes the browser to save the cookie to persistent storage and it is used in subsequent browser sessions until the expiration date is reached.if this attribute is not set ,the cookie is used in current browser session.

<h3>Domain</h3>
Specifies the domain for which the cookie is valid.This must be the same or a parent of the domain from which the cookie is received.

mis_configured domain attribute : if the session cookie usable on another domain?(broadly scoped session cookie domain)
if the domain is set as domain=.domain.com;

<h3>Path</h3>
Specifies the URL(Uniform Resource locater) path(directory) for which the cookie is valid.
for example: 
path=/;

<h3>Secure</h3>
If this attribute is set ,the cookie will be submitted only in HTTPS request.it is checked by the browser. 

<h3>HTTPonly</h3>

If this attribute is set , the cookie cannot be directly accessed via client-side javascript.it is checked by the browser

