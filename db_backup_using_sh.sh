#!/bin/sh

now="$(date +'%d_%m_%Y_%H_%M_%S')"
host="localhost"
username="admin"
password="admin"
databasename="sample"
filename="db_backup_$now".gz
backupfolder="./backups"
fullpathbackupfile="$backupfolder/$filename"
logfile="$backupfolder/"log.txt
echo "mysqldump started at $(date +'%d-%m-%Y %H:%M:%S')" >> "$logfile"
mysqldump --host="$host" --user="$username" --password="$password" --default-character-set=utf8 --single-transaction "$databasename" | gzip > "$fullpathbackupfile"
echo "mysqldump finished at $(date +'%d-%m-%Y %H:%M:%S')" >> "$logfile"
echo "*****************" >> "$logfile"
exit 0
