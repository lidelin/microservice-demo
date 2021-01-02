<?php

declare(strict_types=1);

use Hyperf\Database\Seeders\Seeder;
use Hyperf\Snowflake\IdGeneratorInterface;
use Hyperf\Utils\ApplicationContext;

class AccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $container = ApplicationContext::getContainer();
        $generator = $container->get(IdGeneratorInterface::class);

        $userId = $generator->generate();

        \App\Model\Account::firstOrCreate(['user_id' => $userId], ['balance' => 10000000]);
    }
}
