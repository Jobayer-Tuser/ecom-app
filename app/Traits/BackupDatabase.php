<?php

namespace App\Traits;

use Exception;
use Illuminate\Support\Facades\Log;

trait BackupDatabase
{
    protected function performBackup(int $userId)
    {
        try {
            $port     = config("database.connections.mysql.port");
            $host     = config("database.connections.mysql.host");
            $database = config("database.connections.mysql.database");
            $username = config("database.connections.mysql.username");
            $password = config("database.connections.mysql.password");

            $path     = storage_path("app/backups");
            $backupFile = $path . "/$database-$userId-" . date("Y-m-d-H-i-s") . ".sql";

            $backupCommand = "mysqldump
                    -u $username
                    -p $password
                    -h $host
                    -P $port
                    --single-transaction
                    --quick --lock-tables=false
                    --databases $database > $backupFile |
                    gzip > $backupFile";

            exec($backupCommand, $output, $exitCode);

            if ($exitCode) {
                Log::error("Backup failed for user $userId" . implode("\n", $output));
            }

            return $backupFile;

        } catch (Exception $exception) {
            Log::error("Backup failed for user $userId: ".  $exception->getMessage());
        }
    }
}
