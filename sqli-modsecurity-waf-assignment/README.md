# SQL Injection Mitigation using ModSecurity WAF

sqli-modsecurity-waf-assignment/
│
├── README.md
│
├── app/
│   ├── page1.php        # SQLi vulnerable login form
│   └── page2.php        # Non-exploitable (allowed via WAF rule)
│
├── waf/
│   └── custom_rules.conf
│
└── setup/
    ├── apache-modsecurity.conf
    └── mysql-setup.sql
