# laravel-blade-app

## 技術選定
- Laravel : 10.13.5 (PHP : 8.2.7)  
- Node : v19.9.0  
- npm : 9.6.3  
- Mysql : 8.0  
- PHPUnit 10.2.1  


## docker build
以下を実行する  
```
% docker-compose up -d --build
```

## .env
### ファイルコピー
```
% cp .env.local.example .env
```

### DB接続情報
.envを下記のように編集する  
```
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel-db
DB_USERNAME=docker
DB_PASSWORD=password
```

### メール送信設定
メールを使用する場合は設定する。「MAIL_PASSWORD」はGmailのアプリパスワードなどを指定。  
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
% docker-compose exec php php artisan db:seed
```

## ViteとLaravelプラグインのインストール
```
% docker-compose exec php npm install
% docker compose exec php npm run build
```

## storage
### シンボリックリンクを作成
```
% docker-compose exec php php artisan storage:link
```

### 権限変更
```
% docker-compose exec php chmod -R 777 ./storage
```

### 画像を設置
下記に画像を設置する  
```
storage/app/public
```
※設置する画像については問い合わせ下さい。  

## ユーザー登録
### User側
1. 「登録」ボタン押下  
2. ユーザー情報を入力後、「登録」ボタン押下  
3. ユーザートップページが表示されていることを確認  

### 管理者側
管理者としてログインするとプランを作成できます。  

1. 「登録」ボタン押下  
2. ユーザー情報を入力後、「登録」ボタン押下  
3. 管理者トップページが表示されていることを確認  

## URL
### User Top page
```
http://localhost:8080/
```

### Admin Top page
```
http://localhost:8080/admin/
```

### Phpmyadmin
- URL  
```
http://localhost:8000/
```

- 接続情報  
```
サーバ：db
ユーザ名：docker
パスワード：password
```