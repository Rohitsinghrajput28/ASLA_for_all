<h1> Graph QL Test Cases: </h1>
Denial of Service via Batch Query And GraphQL Aliases  -  Medium
--------------------

Description:
GraphQL aliases allows users to query the same field multiple times with different arguments in a single request. It is useful when multiple variations of the same field needs to be retrieved in one query. A Denial of Service (DoS) attack via Batch Queries and GraphQL aliases can be dangerous as it exploits the flexibility of GraphQL to send numerous operations within a single query, overwhelming the server with resource-intensive tasks. If API endpoint server only counts the number of queries rather than the number of operations within a query for Rate limiting logic, an attackers can exploit this to create very complex and large queries that the server has to process in one go. This can lead to excessive use of server resources, causing slowdowns or crashes.
The GraphQL endpoint for the login request typically processes a login request within approximately 2 seconds. However, if an attacker creates multiple aliases for the login field within a single request, the application's response time dramatically increases to up to 41 seconds. This vulnerability can be exploited by an attacker to create multiple such requests, significantly consuming server resources and leading to the slowdown or unavailability of the GraphQL endpoint. This type of attack is a variant of a Denial of Service (DoS) attack, where the attacker aims to exhaust the server's processing capabilities by overwhelming it with complex queries.
The primary security risk associated with this vulnerability is the potential for a Denial of Service (DoS) attack. By exploiting the application's handling of GraphQL batch queries, an attacker can:
•	Degrade Performance: Significantly slow down the application's response times for legitimate users, leading to poor user experience and potential service disruptions.
•	Resource Exhaustion: Consume excessive server resources (CPU, memory, bandwidth), which could lead to the application becoming unresponsive or crashing.
•	Operational Disruption: Disrupt normal business operations, particularly if the application is critical for business functions.
•	The risk is especially high for applications without rate limiting, request validation, or adequate monitoring, making them susceptible to such batch query attacks.
Note: During the assessment, Any Org* did not explicitly conduct a Denial of Service (DoS) attack. However, the identified vulnerability indicates the potential for a DoS attack, as evidenced by the increased response time when the number of aliases in a batch query rises. This vulnerability suggests a susceptibility to performance degradation under specific conditions, highlighting a potential risk for DoS exploitation.


Steps to Reproduce:
1.	Navigate to the below-mentioned URL, download and set up the "Altair" tool.
https://axx.dev/#download 
2.	Make sure the "Altair" tool is configured to route the traffic through Burp proxy.
3.	Launch the "Altair" tool, enter the URL mentioned in the "Instances" section in the "Enter URL" section, and click on the "Send Request" button.
4.	Create the "Login" mutation query using the available documentation under the "Docs" section.
5.	In the "Altair" tool query, enter the correct username, and password and click on the "Send Request" button.
6.	Navigate to the Burp HTTP history tab and send the login request to the Burp Repeater.
7.	In Burp Repeater, click on the "send" button and observe that the application approximately 2 seconds to generate accessToken & refreshToken.
8.	Copy the below-mentioned code and save it as "index.html".
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale">
<title>Document</title>
<script src="script.js"></script>
</head>
</body>
</html>
9.	Copy the below-mentioned code and save it as "script.js" in the same folder.
let passwords = ''
let list = passwords.split(",")
let text = list.map((password, index) => {
return `login_${index + 1}: login(input: {password: "${password}", id: "ab-35138"}) {
        ... on Authorization {
          account {
            id
            vehicles {
              id
            }
          }
          accessToken
          refreshToken
          scope
          tokenType
          expiry
          idToken
        }
        ... on InvalidCredentialException{
            errorId 
          }
      }\n`
}).join("")

console.log(text)
10.	In script.js file paste 60 to 80 passwords only separated by comma.
11.	In the folder, open command prompt and enter below mentioned command to start Python server:
python -m http.server 8007
12.	Open the index.html file using the Firefox browser, navigate to the console of the browser, and observe that the aliases for login have been generated successfully with all the provided passwords.
13.	In Burp Repeater, replace the aliases properly and click on the send button.
14.	Observe that the GraphQL's login mutation takes around 39 to 41 seconds to respond back to the user.
15.	This indicates that a Lack of restrictions on the number of aliases to be used in a single HTTP request can allow an attacker to slow down the application.


Remediation:
To mitigate this vulnerability, the following measures should be implemented:
•	Depth Limiting: Limit the depth of queries to prevent excessively nested queries.
•	Rate Limiting: Implement rate limiting to restrict the number of requests a single client can make within a certain timeframe. This will help in preventing an attacker from overwhelming the server with numerous requests in a short period.
•	Query Complexity Analysis: Analyze the complexity of incoming GraphQL queries and reject those that are overly complex. This can be done by setting a maximum depth or query cost that a single request can have.
•	Aliasing Limits: Impose restrictions on the number of aliases that can be used in a single request. This will prevent attackers from crafting excessively large queries that can slow down the application.
•	Throttling: Implement throttling to slow down the processing of requests from clients that are making unusually high numbers of requests.
•	Monitoring and Alerts: Set up monitoring to detect unusual patterns of activity that may indicate an ongoing attack. Implement alerts to notify administrators of potential DoS attempts.
•	Request Validation: Validate incoming requests to ensure they adhere to expected patterns and do not contain excessive or unusual query structures.
•	Caching: Use caching mechanisms to reduce the load on the server by serving repeated requests from the cache instead of processing them anew.
•	Resource Allocation: Ensure the application is deployed with sufficient resources and has the ability to scale dynamically to handle sudden spikes in load.


3.2.2.1	GraphQL Introspection Not Disabled (Low)
-----------------------------

Description:
The application utilizes the GraphQL API without disabling the default Introspection system, thereby allowing external users to access information pertaining to the data model of the application.
When an application utilizes the GraphQL API, the default Introspection system provides the ability for the user initiating requests to retrieve information regarding the application's Queries, Data Types, Mutations (methods used to create, update, delete data in the back-end system) and Subscriptions (interaction between a client and server when an event is triggered).
Although the Introspection system is a very useful functionality for developers working on an application in a non-production environment, leaving the system enabled in a production environment will lead to the disclosure of sensitive information of the inner workings of the application to external parties.
If the Introspection system was left enabled on a production environment, a malicious actor will be able to query various resources pertaining to the application schema. This will allow the actor to determine the inner workings of the application and may assist them in identifying weaknesses and conducting further attacks. Leaving the Introspection system enabled in a production environment can in some ways be considered similar to disclosing the source code of the application publicly.


Steps to Reproduce:

1.	Navigate to the below-mentioned URL, download and set up the "Altair" tool.
https://altairgraphql.dev/#download 
2.	Make sure the "Altair" tool is configured to route the traffic through Burp proxy.
3.	Launch the "Altair" tool, enter the URL mentioned in the "Instances" section in the "Enter URL" section, and click on the "Send Request" button.
4.	Create the "Login" mutation query using the available documentation under the "Docs" section.
5.	In the "Altair" tool query, enter the correct username, and password and click on the "Send Request" button.
6.	In the Burp HTTP history tab, locate the request URL that is mentioned in the instances section and send it to the repeater.
7.	In Burp Repeater, Replace the below introspection query as request body:
query IntrospectionQuery {\n      __schema {\n        \n        queryType { name }\n        mutationType { name }\n        subscriptionType { name }\n        types {\n          ...FullType\n        }\n        directives {\n          name\n          description\n          \n          locations\n          args {\n            ...InputValue\n          }\n        }\n      }\n    }\n\n    fragment FullType on __Type {\n      kind\n      name\n      description\n      \n      fields(includeDeprecated: true) {\n        name\n        description\n        args {\n          ...InputValue\n        }\n        type {\n          ...TypeRef\n        }\n        isDeprecated\n        deprecationReason\n      }\n      inputFields {\n        ...InputValue\n      }\n      interfaces {\n        ...TypeRef\n      }\n      enumValues(includeDeprecated: true) {\n        name\n        description\n        isDeprecated\n        deprecationReason\n      }\n      possibleTypes {\n        ...TypeRef\n      }\n    }\n\n    fragment InputValue on __InputValue {\n      name\n      description\n      type { ...TypeRef }\n      defaultValue\n      \n      \n    }\n\n    fragment TypeRef on __Type {\n      kind\n      name\n      ofType {\n        kind\n        name\n        ofType {\n          kind\n          name\n          ofType {\n            kind\n            name\n            ofType {\n              kind\n              name\n              ofType {\n                kind\n                name\n                ofType {\n                  kind\n                  name\n                  ofType {\n                    kind\n                    name\n                  }\n                }\n              }\n            }\n          }\n        }\n      }\n    }
8.	In Burp Repeater, click on the Send button.
9.	Observe that the entire GraphQL schema has been disclosed in the response, which can be further used to create "Mutation" and "Query" used by the application.

Introspectio query: {"query": "query IntrospectionQuery{__schema{queryType{name}mutationType{name}subscriptionType{name}types{...FullType}directives{name description locations args{...InputValue}}}}fragment FullType on __Type{kind name description fields(includeDeprecated:true){name description args{...InputValue}type{...TypeRef}isDeprecated deprecationReason}inputFields{...InputValue}interfaces{...TypeRef}enumValues(includeDeprecated:true){name description isDeprecated deprecationReason}possibleTypes{...TypeRef}}fragment InputValue on __InputValue{name description type{...TypeRef}defaultValue}fragment TypeRef on __Type{kind name ofType{kind name ofType{kind name ofType{kind name ofType{kind name ofType{kind name ofType{kind name ofType{kind name}}}}}}}}"}

Remidiation:

To remediate this issue, ensure Introspection is disabled in the production environment. In order to restrict the usage of the Introspection system, consider using validation rules that prohibits the parsing of queries containing "_type" and/or "_schema" fields.
The exact means of disabling Introspection varies based on the programming language and frameworks being used for the application. However, the basic concept behind creating restrictive validation rules remains the same. Below are some reference links for disabling Introspection for a few common languages and frameworks:
•	PHP - https://webonyx.github.io/graphql-php/security/#disabling-introspection 
•	Ruby - https://graphql-ruby.org/schema/introspection.html#disabling-introspection 
•	NodeJS - https://www.npmjs.com/package/graphql-disable-introspection 
•	Java - https://www.graphql-java.com/documentation/v11/execution/
