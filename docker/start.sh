#!/bin/bash

redis-server &
php artisan app:pull:mmdb &
php artisan serve --host=0.0.0.0 --port=80
