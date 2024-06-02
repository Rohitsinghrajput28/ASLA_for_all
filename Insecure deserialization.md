# Insecure deserialization
========================

Insecure deserialization vulnerabilities occur when untrusted data is used to abuse the logic of an application, inflict Denial of Service (DoS) attacks, or even execute arbitrary code remotely.
or 
Occur when the serialize data is deserialized same as valid one on the server side without checking the lntegrity or whether the data is correct or not which is expected, which process further 
and breaks the logic of the application and can leads:

<h3>Risk </h3>
Including denial of service (DoS)
Sensitive data exposure
Authentication bypass
Remote code execution attacks
SQL injection

<h3>Mitigations</h3>
Intigrity checks

<h3>Application Security Practices</h3>

Apply Principle of Least Privilege: Ensure that the application and its components operate with the least amount of privilege necessary.
Encrypt Serialized Data: Encrypt serialized data in transit and at rest to prevent tampering.

<h3>Data Handling and Validation</h3>

Use Strong Typing: Ensure that only objects of the expected type are deserialized.
Validate Data: Validate incoming serialized data against a whitelist of expected classes and properties before deserializing.
<h3>Avoiding Deserialization of Untrusted Data</h3>

Do Not Deserialize Untrusted Data: Avoid deserializing data from untrusted sources whenever possible.
Use Safe Data Formats: Prefer data formats that do not support direct object deserialization, such as JSON or XML, instead of binary serialization formats that can be more dangerous.

<h3>Deserialization Framework and Library Controls</h3>

Use Libraries with Care: Be cautious with deserialization libraries. Choose libraries that have built-in security features or are known to be more secure.
Disable Object Creation: In deserialization libraries that support it, disable the ability to create arbitrary objects during deserialization.

