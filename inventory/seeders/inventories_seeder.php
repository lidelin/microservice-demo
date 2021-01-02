<?php

declare(strict_types=1);

use Hyperf\Database\Seeders\Seeder;
use Hyperf\Snowflake\IdGeneratorInterface;
use Hyperf\Utils\ApplicationContext;

class InventoriesSeeder extends Seeder
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

        $productNo = $generator->generate();

        \App\Model\Inventory::firstOrCreate(['product_no' => $productNo], ['quantity' => 100]);
    }
}
