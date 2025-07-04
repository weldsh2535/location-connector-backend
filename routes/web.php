<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $categories = [
        (object)[
            'name' => 'Electronics',
            'slug' => 'electronics',
            'image_url' => 'https://via.placeholder.com/150?text=Electronics',
            'products_count' => 42
        ],
        (object)[
            'name' => 'Books',
            'slug' => 'books',
            'image_url' => 'https://via.placeholder.com/150?text=Books',
            'products_count' => 17
        ],
        (object)[
            'name' => 'Clothing',
            'slug' => 'clothing',
            'image_url' => 'https://via.placeholder.com/150?text=Clothing',
            'products_count' => 8
        ],
    ];
    $featuredProducts = [
        (object)[
            'id' => 1,
            'name' => 'Smartphone',
            'slug' => 'smartphone',
            'price' => 699,
            'compare_price' => 799,
            'sale_percentage' => 13, // Example: 13% off
            'image_url' => 'https://via.placeholder.com/150?text=Smartphone',
            'category' => 'Electronics'
        ],
        (object)[
            'id' => 2,
            'name' => 'Novel',
            'slug' => 'novel',
            'price' => 19,
            'compare_price' => 25,
            'sale_percentage' => 24, // Example: 24% off
            'image_url' => 'https://via.placeholder.com/150?text=Novel',
            'category' => 'Books'
        ],
        (object)[
            'id' => 3,
            'name' => 'T-Shirt',
            'slug' => 't-shirt',
            'price' => 25,
            'compare_price' => 30,
            'sale_percentage' => 17, // Example: 17% off
            'image_url' => 'https://via.placeholder.com/150?text=T-Shirt',
            'category' => 'Clothing'
        ],
    ];
    $testimonials = [
        (object)[
            'author' => 'Alice Smith',
            'content' => 'Great service and amazing products!',
            'rating' => 5
        ],
        (object)[
            'author' => 'Bob Johnson',
            'content' => 'Fast shipping and excellent customer support.',
            'rating' => 4
        ],
        (object)[
            'author' => 'Carol Lee',
            'content' => 'Quality exceeded my expectations.',
            'rating' => 5
        ],
    ];
    return view('layouts.home', compact('categories', 'featuredProducts', 'testimonials'));
});

Route::get('/categories/{slug}', function ($slug) {
    return "Category: " . $slug;
})->name('categories.show');

Route::get('/products/{slug}', function ($slug) {
    return "Product: " . $slug;
})->name('products.show');

Route::post('/cart/add/{slug}', function ($slug) {
    return "Added product to cart: " . $slug;
})->name('cart.add');

Route::get('/products', function () {
    return "All Products Page";
})->name('products.index');

Route::get('/cart', function () {
    return "Cart Page";
})->name('cart.index');

Route::get('/login', function () {
    return "Login Page (placeholder)";
})->name('login');

Route::get('/register', function () {
    return "Register Page (placeholder)";
})->name('register');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
