#!/bin/bash
#php artisan queue:work --stop-when-empty

greeting="hello"


for i in {1..10}
do
    echo "Run $i" $greeting
done
