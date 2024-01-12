# プロジェクト名

## 概要

このLaravelプロジェクトは、Beds24の連携機能を備えており、施設の予約情報を管理・更新することができます。RedisとLaravel Horizonを使用して、効率的なジョブキュー管理と並列処理を実現しています。

## 環境要件

- PHP ^7.3|^8.0
- Laravel ^6.2
- Redisサーバー
- Laravel Horizon ^4.0
- (その他の依存関係がある場合は、ここに追記してください。)

## インストール手順

1. リポジトリをクローンします。

   ```sh
   git clone [リポジトリURL]

2. 依存関係をインストールします。
    ```sh
    composer install
3. アプリケーションキーを生成します。
    ```sh
    php artisan key:generate
4. データベースマイグレーションを実行します。
    ```sh
    php artisan migrate
    php artisan db:seed
5. 実行
    ```sh
    php artisan serve
    php artisan schedule:run
    php artisan queue:work
6. Laravel Horizonをインストールし、サービスを開始します。
    ```sh
    php artisan horizon:install
    php artisan horizon:assets
    php artisan horizon
5. Monitoring
    ```sh
    redis-cli monitor

### 使用方法
プロジェクトのスケジューラは、app/Console/Kernel.phpに定義されています。予約情報の更新ジョブは、command:updateReservationコマンドによって定期的に実行されます。

### 開発者向け情報
このプロジェクトには、以下のカスタムコマンドが含まれています。

php artisan command:updateReservation: 予約情報を更新します。
ジョブの実行状況はLaravel Horizonでモニタリングすることができます。

Horizonのダッシュボードはhttp://localhost:8000/horizonでアクセスできます。
