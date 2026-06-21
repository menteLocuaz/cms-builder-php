@echo off
start /B php -S localhost:6060 -t public
npx tailwindcss -i ./public/css/input.css -o ./public/css/style.css --watch
taskkill /F /IM php.exe >nul 2>&1
