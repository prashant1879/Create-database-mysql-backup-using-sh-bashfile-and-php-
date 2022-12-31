<?php

databaseBackup();

function databaseBackup()
{
  $host     = "localhost";
  $username = "admin";
  $password = "admin";
  $database = "sample";

  $date     = date("d-m-Y h:i:s a");
  $filename = "db_backup_" . str_replace(" ", "_", $date) . ".gz";
  $backupfolder = "./backups";
  $fullpathbackupfile = $backupfolder . "/" . $filename;
  $logfile = $backupfolder . "/" . "log.txt";
  file_put_contents($logfile, "mysqldump started at : " . date("d-m-Y h:i:s a") . "\n", FILE_APPEND);
  shell_exec("mysqldump --host=" . $host . " --user=" . $username . " --password=" . $password . " --default-character-set=utf8 --single-transaction " . $database . " | gzip > " . $fullpathbackupfile . "");
  file_put_contents($logfile, "mysqldump ended at : " . date("d-m-Y h:i:s a") . "\n", FILE_APPEND);
  file_put_contents($logfile, ">>>>>>>>>>>>>>>>>>>>>>>>>>" . "\n", FILE_APPEND);
  exit;
}
