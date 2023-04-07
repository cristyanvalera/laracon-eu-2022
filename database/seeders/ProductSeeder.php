<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createFeaturedProduct(
            name: 'Producto destacado con LTV 50%',
            maxLtv: 50,
            fee: 1,
        );

        $this->createFeaturedProduct(
            name: 'Producto destacado con LTV 55%',
            maxLtv: 55,
            fee: 1.5,
        );

        $this->createFeaturedProduct(
            name: 'Producto destacado con LTV 60%',
            maxLtv: 60,
            fee: 2,
        );

        $this->createFeaturedProduct(
            name: 'Producto destacado con LTV 65%',
            maxLtv: 65,
            fee: 2.5,
        );

        $this->createFeaturedProduct(
            name: 'Producto destacado con LTV 70%',
            maxLtv: 70,
            fee: 3,
        );

        $this->createFeaturedProduct(
            name: 'Producto destacado con LTV 75%',
            maxLtv: 75,
            fee: 3.5,
        );

        $this->createFeaturedProduct(
            name: 'Producto destacado con LTV 80%',
            maxLtv: 80,
            fee: 4,
        );

        $this->createFeaturedProduct(
            name: 'Producto normal con LTV 50%',
            maxLtv: 50,
            fee: 1,
        );

        $this->createFeaturedProduct(
            name: 'Producto normal con LTV 55%',
            maxLtv: 55,
            fee: 1.5,
        );

        $this->createProduct(
            name: 'Producto normal con LTV 60%',
            maxLtv: 60,
            fee: 2,
        );

        $this->createProduct(
            name: 'Producto normal con LTV 65%',
            maxLtv: 65,
            fee: 2.5,
        );

        $this->createProduct(
            name: 'Producto normal con LTV 70%',
            maxLtv: 70,
            fee: 3,
        );

        $this->createProduct(
            name: 'Producto normal con LTV 75%',
            maxLtv: 75,
            fee: 3.5,
        );

        $this->createProduct(
            name: 'Producto normal con LTV 80%',
            maxLtv: 80,
            fee: 4,
        );
    }

    private function createFeaturedProduct(string $name, float $maxLtv, int|float $fee): void
    {
        Product::create([
            'name' => $name,
            'max_ltv' => $maxLtv,
            'fee' => $fee,
            'interest_rate' => $fee / 2,
            'featured' => true,
        ]);
    }

    private function createProduct(string $name, float $maxLtv, int|float $fee): void
    {
        Product::create([
            'name' => $name,
            'max_ltv' => $maxLtv,
            'fee' => $fee,
            'interest_rate' => $fee / 2,
            'featured' => false,
        ]);
    }
}
