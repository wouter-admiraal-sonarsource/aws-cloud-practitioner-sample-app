#!/bin/bash -ex
yum -y install stress php
wget https://github.com/wouter-admiraal-sonarsource/aws-cloud-practitioner-sample-app/archive/refs/heads/main.zip
unzip main.zip
cd aws-cloud-practitioner-sample-app-main/
sudo php -S 0.0.0.0:80
