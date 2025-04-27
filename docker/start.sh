#!/bin/bash

redis-server &
php artisan geoip:download-mmdb &
php artisan serve --host=0.0.0.0 --port=80
