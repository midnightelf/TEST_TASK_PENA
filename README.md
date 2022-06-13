чтобы поднять проект:<br/>

0. copy and paste `.env.example`. rename to `.env`
1. `composer install`<br/>
2. `vendor/bin/sail up -d`<br/>
3. `vendor/bin/sail artisan key:generate`
4. `vendor/bin/sail artisan migrate --seed`<br/>
5. `vendor/bin/sail artisan serve`
6. Go to [localhost:8081](http://locahost:8081)

(1) для добавления нового поставщика надо создать новый класс поставщика
в `App\Carriers\Factories`. (2) класс поставщика должен реализовывать интерфейс `App\Interfaces\CarrierFactoryInterface`. (3) после создания класса поставщика его необходимо зарегестрировать в `App\Models\Delivery::$carriers` в формате `[short_name => CarrierFactory::class]`.
