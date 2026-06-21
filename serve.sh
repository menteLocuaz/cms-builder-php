#!/bin/bash
cleanup() { kill $PHP_PID 2>/dev/null; }
trap cleanup EXIT
php -S localhost:6060 -t public &
PHP_PID=$!
npx tailwindcss -i ./public/css/input.css -o ./public/css/style.css --watch
