Codeception Tests
=================

# Functional Tests
## Frontend
- You will find frontend (yves) tests in Functional/Pyz/Yves.
- Configuration (urls, helpers, ...) are placed in Functional.suite.yml

### Requirements

#### phantomjs

Make sure that WebDriver is running. If you got no GUI please make sure that phantomjs is installed and running.

Start phantomjs:
```bash
$ ./phantomjs --webdriver=4444
```

Note: A bash script (install_phantomjs.sh) to install phantomjs can be found in development.


#### Selenium / SauceLabs

You can also execute tests in Selenium with real browsers. When using SauceLabs please make sure to provide your accesskey in configuration.

Functional.suite.yml example:
```yaml
modules:
    enabled:
      - Filesystem
      - \Module\Functional

      - WebDriver:
          url:         'http://www.de.pets-deli.dev/'
          host:        'SAUCELABS_USER:ACCESSKEY@ondemand.saucelabs.com'
          browser:     'firefox'
          capabilities:
            platform:                 'Windows 10'
            version:                  '42.0'

          window_size: '1920x1200'
          wait:        10
```


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
