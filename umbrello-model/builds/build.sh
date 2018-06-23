#!/bin/bash

rm finalcode.sql

####
cat users.sql >> finalcode.sql
cat categories.sql >> finalcode.sql
cat places.sql >> finalcode.sql

cat equipments.sql >> finalcode.sql
cat activities.sql >> finalcode.sql
cat equipments_activities.sql >> finalcode.sql

####
subl finalcode.sql