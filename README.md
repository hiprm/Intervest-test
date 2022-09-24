### 1) Clone The Project From GitHub
    git clone https://github.com/hiprm/Intervest-test.git

### 2) Create a MYSQL DB and rename  .env.example to .env

### 3) Add DB name to .env file

### 4) composer install

### 5) Run DataBase Migration
    php artisan migrate

### 6) Restart Queue for daily PCR record save
    php artisan queue:restart

### 7) Run Cron Job for save API data
    php artisan schedule:run 

### 8) check laravel logs

### 9) monotor queue untill save all record 
    php artisan queue:listen 

### 10) start project
    php artisan serve
    

