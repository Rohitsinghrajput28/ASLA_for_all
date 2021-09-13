Clickjacking:
===

it is a web security vulnerability of tricking a user clicking on something different from what the user preceives thus poetntially revealing
confidential information or allowing others to take control of their compute while clicking on seemingly innocous object.

<h3>Identification</h3>

If the target URL process in <iframe> then we can go for clickjacking
  
 
              <html>
                <head>
                    <title>Clickjack test page</title>
                </head>
                <body>
                    <iframe src="http://www.target.site" width="500" height="500"></iframe>
                </body>
            </html>

<h3>test cases</h3>
1.frame busting code:-

<h3>Prevention</h3>

X-frame-deny,same origin,flow from URI
