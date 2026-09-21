@echo off
echo ===================================================
echo   Menjalankan Animedesu dengan PHP 8.0 & CI4 Router
echo   URL: http://localhost:8080/
echo   Admin: http://localhost:8080/login
echo ===================================================
"C:\xampp_8.0\php\php.exe" -S localhost:8080 -t public vendor\codeigniter4\framework\system\Commands\Server\rewrite.php
