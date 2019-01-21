# ShopiApp
Basic online marketplace to browse and buy books.

# Task
Task: Build the barebones of an online marketplace.

- Can be used to fetch products either one at a time or all at once.
- Every product should have a title, price, and inventory_count.
- Querying for all products should support passing an argument to only return products with available inventory. 

Additional:

Products should be able to be "purchased" which should reduce the inventory by 1. 
Products with no inventory cannot be purchased.

Fit these product purchases into the context of a simple shopping cart. 
That means purchasing a product requires 
- creating a cart
- adding products to the cart
- "completing" the cart (checking out)
- The cart should contain:
	- A list of all included products, 
	- A total dollar amount (the total value of all products)
	- AND product inventory shouldn't reduce until after a cart has been completed.

# The Challenge
I chose to use Laravel 5.7 PHP framework, with an MVC architectural pattern which beautifully handles CRUD methodology.

<strong> Screenshots below, but please feel *super* free to download the two demo videos under `/demo`! :)  </strong>

</br><strong> *The Model*: </strong>
    Table name `products` with columns `id`, `title`, `author`, `price`, `inventory_count`, `barcode`, `description` and `img_src`

</br><strong> *The Controllers*: </strong>
</br>PagesController controls the routing to pages. (really only the home page but could include a contact page and others...)
</br>ProductsController contains all the main functionality:
    </br>`index($instock)` : displays the listing of all the products (/books) 
            - The attribute $instock allows to filter out the products that are not in stock (inventory_count === 0)
    </br>`cart()` : displays the listing of cart resource
    </br>`show($id)`: view a specific singular product/book
    </br>`addToCart($id)`: add a product to the cart by storing the item in a laravel session.
    </br>`updateCart()`: update the specified resource in cart session (add quantity, lower quantity).
    </br>`removeFromCart()`: remove the specified resource from cart session.
    </br>`checkout()` : decrement the inventory count and flush the session

</br><strong> *The Views*: </strong>
</br>`index.blade.php` : this is the home page
</br>`cart.blade.php` : this page displays the cart
</br>`listing.blade.php` : this page distplays the products
</br>`show.blade.php` : this is a display for a singular product
</br>`thankyou.blade.php` : this is the page you're redirected to, after checking out



-----------------------------------------------------------------------------------------------------------------------------
<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb combination of simplicity, elegance, and innovation give you tools you need to build any application with which you are tasked.

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
