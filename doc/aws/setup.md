# AWS Setup


Overview.. TODO


## general

```
52.29.54.163	pd-ffm-staging01    # ElasticIP
52.29.174.164	pd-ffm-staging02    # ElasticIP

52.29.189.143	pd-ffm-prod01       # ElasticIP (needed for ES access)
52.29.189.199	pd-ffm-prod02       # ElasticIP (needed for ES access)
```


### EC2

AMI: `debian-wheezy-amd64-hvm-2015-01-28-ebs (ami-98043785)`






## RDS

Postgres.. TODO



### Redis

TODO


### Elasticsearch Service


Access policy: IP based

Therefore, we need fixed IPs for the app servers that need ES access
