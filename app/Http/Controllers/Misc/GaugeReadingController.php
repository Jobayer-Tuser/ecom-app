<?php

namespace App\Http\Controllers\Misc;

use Modules\JiraBoard\Http\Controllers\Controller;
use Modules\JiraBoard\Models\GaugeReading;
use Generator;
use Illuminate\Support\Facades\DB;

class GaugeReadingController extends Controller
{
    public function index(): void
    {
        $filePath = public_path("small_set.csv");

        $consumerInfo = function($row) {
            return [
                'first_name'  => $row[1],
                'last_name'   => $row[2],
                'email'       => $row[3],
                'gender'      => $row[4],
                'ip_address'  => $row[5],
            ];
        };

//        self::insertBulkDataWithRawQuery($filePath);

        $generatedData = self::prepareCsvToArray(path: $filePath, consumerInfo: $consumerInfo, chunk: 1000);
        self::insertBulkDataWithChunkFunction($generatedData);
//        self::insertBulkDataWithCustomChunkFunctionWhenForeignKeyExists($generatedData);

        echo "Database inserted correctly";
    }

    /**
     * This one way to insert bulk thousands of file but not efficient yet.
     * @param Generator $generatedData
     * @return void
     */
    private function insertBulkDataWithChunkFunction(Generator $generatedData): void
    {
        foreach ($generatedData as $data){
            GaugeReading::query()->insert($data);
        }
    }

    /**
     * @param Generator $generator
     * @return void
     */
    private function insertBulkDataWithCustomChunkFunctionWhenForeignKeyExists(Generator $generator): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::statement('ALTER TABLE consumers DISABLE KEYS');

        foreach ($generator as $chunkData){
            GaugeReading::query()->insert($chunkData);
        }

        DB::statement('ALTER TABLE consumers ENABLE KEYS');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }

    /**
     * @param string $path
     * @param callable $consumerInfo
     * @param int $chunk
     * @return Generator
     */
    private function prepareCsvToArray(string $path, callable $consumerInfo, int $chunk = 500): Generator
    {
        $file = fopen($path, 'r');
        fgetcsv($file); # for skipping the first line.

        $data =[];

        for ($ii = 1; ($row = fgetcsv($file)) !== false; $ii++)
        {
            $data[] = $consumerInfo($row);

            if ($ii % $chunk == 0 ){
                yield $data;
                $data = [];
            }
        }

        if(!empty($data))
        {
            yield $data;
        }
    }

    /**
     * @param string $path
     * @return void
     */
    private function insertBulkDataWithRawQuery(string $path) : void
    {
        $escapePath = DB::getPdo()->quote($path);
        DB::statement("
            LOAD DATA LOCAL INFILE {$escapePath}
            INTO TABLE consumers
            FIELDS TERMINATED BY ','
            LINES TERMINATED BY '\\n'
            (first_name, last_name, email, gender, ip_address)
        ");
    }

    private function sorting(): void
    {
        $data = [];
        sort($data);
        rsort($data);
        usort($data, function ($first, $second) {
            return $first['en'] <=> $second['end']; // spaceship operator
        });

        // this equivalent to this
        usort($data, function ($first, $second) {
            if ($first['id'] < $second['id']){
                return -1;
            } else if ($first['id'] === $second['id']){
               return 0;
            } else{
                return 1;
            }
        });
    }

    private function retrievingLargeDatasets(): void
    {
        # Using a Chunk
        GaugeReading::query()->chunk(100, function ($posts){
            foreach ($posts as$post){
                echo $post;
            }
        });

        #Using Cursor
        foreach (GaugeReading::query()->cursor() as $post){
            echo $post;
        }

        $posts = GaugeReading::query()->chunkById( 100, function ($posts){
            foreach ($posts as $post){
                echo $post;
            }
        });

    }
}
