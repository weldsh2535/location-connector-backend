@extends('layouts.app')

@section('title', 'Welcome to Our Store')

@section('content')
    <!-- Hero Section -->
    <div class="relative bg-gray-900 overflow-hidden">
        <div class="max-w-7xl mx-auto">
            <div class="relative z-10 pb-8 bg-gray-900 sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                    <div class="sm:text-center lg:text-left">
                        <h1 class="text-4xl tracking-tight font-extrabold text-white sm:text-5xl md:text-6xl">
                            <span class="block">Summer Collection</span>
                            <span class="block text-primary-400">2023</span>
                        </h1>
                        <p class="mt-3 text-base text-gray-300 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                            Discover our new arrivals with up to 40% discount. Limited time offer.
                        </p>
                        <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                            <div class="rounded-md shadow">
                                <a href="#" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700 md:py-4 md:text-lg md:px-10">
                                    Shop Now
                                </a>
                            </div>
                            <div class="mt-3 sm:mt-0 sm:ml-3">
                                <a href="#" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-primary-700 bg-white hover:bg-gray-50 md:py-4 md:text-lg md:px-10">
                                    View Collection
                                </a>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
            <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="{{ asset('images/hero.jpg') }}" alt="Summer Collection">
        </div>
    </div>

    <!-- Featured Categories -->
    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Shop by Category
                </h2>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 mx-auto">
                    Browse through our wide selection of categories
                </p>
            </div>

            <div class="mt-10">
                <div class="grid grid-cols-2 gap-6 sm:grid-cols-3 lg:grid-cols-4">
                    @foreach($categories as $category)
                        <div class="group relative bg-white border border-gray-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-300">
                            <a href="{{ route('categories.show', $category->slug) }}" class="block">
                                <div class="aspect-w-3 aspect-h-2 bg-gray-200 group-hover:opacity-75">
                                    <img src="{{ $category->image_url }}" alt="{{ $category->name }}" class="w-full h-full object-center object-cover">
                                </div>
                                <div class="p-4">
                                    <h3 class="text-sm font-medium text-gray-900">
                                        <span aria-hidden="true" class="absolute inset-0"></span>
                                        {{ $category->name }}
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-500">{{ $category->products_count }} products</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Products -->
    <div class="bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Featured Products
                </h2>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 mx-auto">
                    Our most popular products based on sales
                </p>
            </div>

            <div class="mt-10 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                @foreach($featuredProducts as $product)
                    <div class="group relative bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                        </div>
                        <div class="p-4">
                            <div>
                                <h3 class="text-sm text-gray-700">
                                    <a href="{{ route('products.show', $product->slug) }}">
                                        <span aria-hidden="true" class="absolute inset-0"></span>
                                        {{ $product->name }}
                                    </a>
                                </h3>
                                <p class="mt-1 text-sm text-gray-500">{{ $product->category }}</p>
                            </div>
                            <div class="mt-4 flex justify-between items-center">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">${{ $product->price }}</p>
                                    @if($product->compare_price)
                                        <p class="text-sm font-medium text-gray-500 line-through">${{ $product->compare_price }}</p>
                                    @endif
                                </div>
                                <form action="{{ route('cart.add', $product->slug) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="ml-4 p-2 rounded-full bg-primary-100 text-primary-600 hover:bg-primary-200 focus:outline-none">
                                        <x-heroicon-o-shopping-cart class="h-5 w-5" />
                                        <span class="sr-only">Add to cart</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                        @if($product->sale_percentage)
                            <div class="absolute top-0 right-0 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-bl-lg">
                                SALE {{ $product->sale_percentage }}%
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>

            <div class="mt-10 text-center">
                <a href="{{ route('products.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                    View All Products
                    <x-heroicon-o-arrow-right class="ml-2 -mr-1 h-4 w-4" />
                </a>
            </div>
        </div>
    </div>

    <!-- Testimonials -->
    <div class="bg-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    What our customers say
                </h2>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                    Don't just take our word for it - hear from our satisfied customers
                </p>
            </div>

            <div class="mt-10 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($testimonials as $testimonial)
                    <div class="pt-6">
                        <div class="flow-root bg-gray-50 rounded-lg px-6 pb-8 h-full">
                            <div class="-mt-6">
                                <div>
                                    <span class="inline-flex items-center justify-center p-3 bg-primary-500 rounded-md shadow-lg">
                                        <x-heroicon-o-user class="h-6 w-6 text-white" />
                                    </span>
                                </div>
                                <h3 class="mt-8 text-lg font-medium text-gray-900 tracking-tight">{{ $testimonial->author }}</h3>
                                <p class="mt-5 text-base text-gray-500">
                                    "{{ $testimonial->content }}"
                                </p>
                                <div class="mt-4 flex items-center">
                                    @for($i = 0; $i < $testimonial->rating; $i++)
                                        <x-heroicon-s-star class="h-5 w-5 text-yellow-400" />
                                    @endfor
                                    @for($i = $testimonial->rating; $i < 5; $i++)
                                        <x-heroicon-s-star class="h-5 w-5 text-gray-300" />
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-primary-700">
        <div class="max-w-2xl mx-auto text-center py-16 px-4 sm:py-20 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
                <span class="block">Ready to start shopping?</span>
                <span class="block">Sign up for exclusive offers.</span>
            </h2>
            <p class="mt-4 text-lg leading-6 text-primary-200">
                Join our newsletter and get 10% off your first order.
            </p>
            <form class="mt-8 sm:flex">
                <label for="email-address" class="sr-only">Email address</label>
                <input id="email-address" name="email" type="email" autocomplete="email" required class="w-full px-5 py-3 border border-transparent placeholder-gray-500 focus:ring-2 focus:ring-offset-2 focus:ring-offset-primary-700 focus:ring-white focus:border-white sm:max-w-xs rounded-md" placeholder="Enter your email">
                <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3 sm:flex-shrink-0">
                    <button type="submit" class="w-full flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-primary-600 bg-white hover:bg-primary-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-primary-700 focus:ring-white">
                        Subscribe
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection