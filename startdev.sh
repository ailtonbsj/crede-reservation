#!/bin/bash

cd web/
env \
DATABASE_SERV=$(sudo docker inspect reserv-db1 | grep "IPAddress\": \"172" | cut -d'"' -f 4) \
DATABASE_PASS=orkideaframework \
GCALENDAR_ID=yourcalendar@gmail.com \
GOOGLE_APPLICATION_CREDENTIALS=../../../keys.json \
TIMEZONE="America/Fortaleza" \
php -S 0.0.0.0:8082
