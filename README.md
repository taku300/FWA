<p align="center">
<a href=""><img src="/public/images/layout/logo_white_strate.png" width="400" alt="福岡県ウエイトリフティング協会ロゴ"></a>
<a href=""><img src="/public/images/top/top1.png" width="400" alt="福岡県ウエイトリフティング協会トップ画像"></a><br>
</p>
<br>

# How to Setup

`git clone https://github.com/taku300/FWA.git`  
`cd FWA`  
`composer install`  
`vendor/bin/sail up -d --build`  
`cp .env.local .env`  
`vendor/bin/sail artisan migrate --seed`  
`php artisan:storage link`
`vendor/bin/sail artisan migrate --seed`  
`vendor/bin/sail npm install`  
`vendor/bin/sail npm run dev` このコマンドを実行した状態で開発を進める

`localhost:3000` でアクセス

# Check All Bugs fixed
`vendor/bin/sail test`

### System Versions

* PHP version  
`8.1.13`

* Laravel version  
`9.43.0`

* mysql version  
`5.7.40`

* composer version  
`2.5.1`

* node version  
`18.12.1`

* npm version  
`9.2.0`
