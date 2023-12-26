<?php

declare(strict_types=1);

namespace Tests\Support;

use App\Models\Product;
use App\Models\Promocode;
use App\Models\User;
use Behat\Gherkin\Node\TableNode;

/**
 * Inherited Methods
 * @method void wantTo($text)
 * @method void wantToTest($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method void pause($vars = [])
 *
 * @SuppressWarnings(PHPMD)
*/
class FunctionalTester extends \Codeception\Actor
{
    use _generated\FunctionalTesterActions;

    protected User $user;
    protected string $token;

    /**
     * @Given I login as :name
     */
    public function iLoginAs(string $name): void
    {
        $this->user = User::where(['name' => $name])->first();

        $this->token = $this->user->createToken('test')->plainTextToken;
    }

    /**
     * @Given I add product with $:price price in my cart
     */
    public function iAddProductWithPriceInMyCart(string $price): void
    {
        $product = Product::where(['price' => $price])->first();

        $this->user->cart->products()->save($product);
    }

   /**
    * @When I checkout
    */
    public function iCheckout()
    {
    }

    /**
     * @Then I should see that total number of products is :num
     */
    public function iShouldSeeThatTotalNumberOfProductsIs(string $num): void
    {
        $this->assertEquals($num, $this->user->cart->products()->count());
    }

   /**
    * @Then my order amount is $:total
    */
    public function myOrderAmountIs(string $total): void
    {
        $this->assertEquals($total, $this->user->cart->total());
    }

    /**
     * @Given I have products in my cart
     */
    public function iHaveProductsInMyCart(TableNode $products)
    {
        foreach ($products->getRows() as $index => $row) {
            if ($index === 0) { // first row to define fields
                continue;
            }

            $product = Product::where(['price' => $row[0]])->first();

            $this->user->cart->products()->save($product);
        }
    }

    /**
     * @Given I add promo code :code to my cart
     */
    public function iAddPromoCodeToMyCart(string $code)
    {
        $code = Promocode::where(['code' => $code])->first();

        $this->user->cart->promoCode()->associate($code);
    }
}
