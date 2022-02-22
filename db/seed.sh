#!/bin/bash

echo "Wait for postgreSQL database start..." >> /dev/stdout
echo "Hi" >> /dev/stdout
wait-for localhost:5432 -t 300 -- echo "PostgreSQL ready!" >> /dev/stdout
#POSTGRES_PASSWORD
createdb -h localhost -U postgres -e reservation
pg_restore -h localhost -U postgres -d reservation < pgdb.psql
rm -rf async-seed.sh seed.sh