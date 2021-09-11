PREVILEGE ESCALATION
===

It is a web security vulnerability in which a user can perform action such as addtion,deletion,modification on behalf of other user.

It is classified as two types:

1.Horizontal previlege escalation

2.Vertical previlege escalation

<h3>Expalanation</h3>

<h3>1.Horizontal previlege Escalation:</h3>

It is a type of previlege escalation in which a user is able to perform any action 
such as addition,deletion & modification on behalf of other user at same previlege.

For example: 
 

<h3>2.Vertical previlege Escalation:</h3>

It is a type of previlege escalation in which a user is able to perform any action such 
as addition,deletion & modification on behalf of other user at lower to high previlege.

For Example:


<H3>IDOR</H3>
 
 IDOR stands for insecure-direct object reference is a access control type web security vulnerability in which it allows an attacker to only view data of other users it depend upon the object reference through it allow to view other users to view data.
 
 >>>    For example:
 
            
 To view data of other users with the object reference i.e user_id parameter 
 
     http://indishell/B0x.php?user_id=1


Prevention:

    1.Never rely on obfuscation alone for access control.
    2.Unless a resource is intended to be publicly accessible, deny access by default.
    3.Wherever possible, use a single application-wide mechanism for enforcing access controls.
    4.At the code level, make it mandatory for developers to declare the access that is allowed for each         resource, and deny access by default.
    5.Thoroughly audit and test access controls to ensure they are working as designed.

