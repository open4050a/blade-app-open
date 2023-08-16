# laravel-blade-app

## 技術選定
- Laravel : 10.13.5 (PHP : 8.2.7)  
- Node : v19.9.0  
- npm : 9.6.3  
- Mysql : 8.0  
- PHPUnit 10.2.1  


## docker build
```
% docker-compose up -d --build
```

## .env
```
% cp .env.local.example .env
```
.env Database
```
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel-db
DB_USERNAME=docker
DB_PASSWORD=password
```
.env 「MAIL_PASSWORD」はGmailのアプリパスワードなどを指定
```
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=sampleName
MAIL_PASSWORD=xxxxxxxxxxxxxxxxxx
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

## composer install
```
% docker-compose exec php composer install
```

## DB構築
```
% docker-compose exec php php artisan migrate
```

## ViteとLaravelプラグインのインストール
```
% docker-compose exec php npm install
% docker compose exec php npm run build
```

## URL
### User Top page
```
http://localhost:8080/
```

### Admin Top page
```
http://localhost:8080/
```

### Phpmyadmin
```
http://localhost:8000/
```
