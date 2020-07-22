<?php

namespace Tests\Unit;

use App\User;
use App\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_has_many_products()
    {
        $user = factory(User::class)->create();
        $product1 = factory(Product::class)->create(['user_id' => $user->id]);
        $product2 = factory(Product::class)->create(['user_id' => $user->id]);
        $product3 = factory(Product::class)->create(['user_id' => $user->id]);

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $user->products);
        $this->assertEquals(3, $user->products->count());
    }
}
