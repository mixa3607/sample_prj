#!/bin/bash

USER="$1"
PASS="$2"
DB="library"

echo 'CREATE DATABASE '"$DB" | mysql -u "$USER" -p"$PASS"
mysql -u "$USER" -p"$PASS" "$DB" < schema.sql
mysql -u "$USER" -p"$PASS" "$DB" < storages.sql
mysql -u "$USER" -p"$PASS" "$DB" < pictures.sql
mysql -u "$USER" -p"$PASS" "$DB" < authors.sql
mysql -u "$USER" -p"$PASS" "$DB" < genres.sql

