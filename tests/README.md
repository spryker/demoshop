Codeception Tests
=================

# Functional Tests
## Frontend
- You will find frontend (yves) tests in Functional/Pyz/Yves.
- Configuration (urls, helpers, ...) are placed in Functional.suite.yml

### Requirements
Make sure that webdriver is running. If you got no GUI please make sure that phantomjs is installed and running:
```bash
$ ./phantomjs --webdriver=4444
```

Note: A bash script (install_phantomjs.sh) to install phantomjs can be found in development.

### Execution
To execute tests please use following command:

```bash
$ php vendor/bin/codecept -vvv run Functional Pyz/Yves
```

To specify a different environment than development please use argument "--env":

```bash
$ php vendor/bin/codecept -vvv --env=staging run Functional Pyz/Yves
```

### Debugging
Every failing test is creating a screenshot and saves the source code of the failed step. You can find these files in *_output* directory.
You can also save screenshots whenever you want to. These files are located in *debug* directory inside *_output*.
