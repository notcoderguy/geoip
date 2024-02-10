#!/bin/sh

# Wait for the database to be ready
/usr/bin/wait-for-it.sh db:3306 --timeout=30

# Check if migrations have already been run
if [ ! -f "/path/to/migration.flag" ]; then
  php artisan migrate:fresh --force
  php artisan db:seed --force
  # Create a flag file to indicate completion
  touch /path/to/migration.flag
fi

# Continue with the main process
exec "$@"
