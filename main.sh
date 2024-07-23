for i in {1..10}
do
    php artisan queue:work --stop-when-empty
done