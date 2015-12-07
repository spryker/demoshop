Codeception Tests
=================

# Functional Tests
## Frontend
- You will find frontend (yves) tests in Functional/Pyz/Yves.
- Configuration (urls, helpers, ...) are placed in Functional.suite.yml

### Requirements
Make sure that webdriver is running. If you got no GUI please makre sure that phantomjs is installed and running:
```bash
$ ./phantomjs --webdriver=4444
```

Note: A bash script to install phantomjs can be found in development.

### Execution
To execute tests please use following command:

```bash
$ php vendor/bin/codecept -vvv run Functional Pyz/Yves
```
