# Laravel 12 監控排程任務

引入 spatie 的 laravel-schedule-monitor 套件來擴增排程任務的監控，監控 Laravel 指令排程器排定，每當計劃任務開始，結束，失敗或被跳過時，它將在資料庫中的日誌表中寫入一筆紀錄。

## 使用方式
- 把整個專案複製一份到你的電腦裡，這裡指的「內容」不是只有檔案，而是指所有整個專案的歷史紀錄、分支、標籤等內容都會複製一份下來。
```sh
$ git clone
```
- 將 __.env.example__ 檔案重新命名成 __.env__，如果應用程式金鑰沒有被設定的話，你的使用者 sessions 和其他加密的資料都是不安全的！
- 當你的專案中已經有 composer.lock，可以直接執行指令以讓 Composer 安裝 composer.lock 中指定的套件及版本。
```sh
$ composer install
```
- 產生 Laravel 要使用的一組 32 字元長度的隨機字串 APP_KEY 並存在 .env 內。
```sh
$ php artisan key:generate
```
- 執行 __Artisan__ 指令的 __migrate__ 來執行所有未完成的遷移。
```sh
$ php artisan migrate
```
- 執行 __Artisan__ 指令的 __schedule-monitor:sync__ 來負責將任務排程表與資料庫同步。強烈建議將此命令加入到部署正式環境的腳本中。
```sh
$ php artisan schedule-monitor:sync
```
- 執行 __Artisan__ 指令的 __schedule-monitor:list__ 將查看任務排程表，並在 `monitored_scheduled_task_log_items` 資料表中為每個任務建立一筆紀錄。。
```sh
$ php artisan schedule-monitor:list
```

----

## 畫面截圖
![](https://i.imgur.com/GILI77A.png)
> 將任務排程表與資料庫同步

![](https://i.imgur.com/W42hnLW.png)
> 查看任務排程表
