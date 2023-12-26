Feature: checkout
  In order to buy products
  As a customer
  I want to be able to buy several products

  Background:
    Given I login as "Test User"

  Scenario: try checkout
    Given I add product with $500 price in my cart
    And I add product with $700 price in my cart
    And I add product with $1000 price in my cart
    When I checkout
    Then I should see that total number of products is 3
    And my order amount is $2200

  Scenario: try checkout with table
    Given I have products in my cart
      | price |
      | 700   |
      | 900   |
    When I checkout
    Then I should see that total number of products is 2
    And my order amount is $1600

  Scenario Outline: order discount
    Given I add product with $<price> price in my cart
    And I add promo code "<promo_code>" to my cart
    When I checkout
    And my order amount is $<total>

    Examples:
      | price | promo_code | total |
      | 500   | 10%OFF     | 450   |
      | 700   | 50%OFF     | 350   |
      | 1200  | 80%OFF     | 240   |
