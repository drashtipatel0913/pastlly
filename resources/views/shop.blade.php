<!doctype html>
<html lang="en">
<x-header />

<body>
    <x-navbar />
    <div class="container-fluid text-uppercase">
        <div style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb border-bottom p-3 my-0">
                <li class="breadcrumb-item">
                    <a class="text-decoration-none text-dark-emphasis" href="{{ route('welcome') }}">Home</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a class="text-decoration-none text-dark-emphasis p-1" href="{{ route('shop') }}">Shop</a>
                </li>
                <li class="breadcrumb-item active text-dark-emphasis" aria-current="page"><span
                        class="border-bottom border-dark border-2 p-2">{{ $categoryName }}</span></li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="p-0 col-2 bg-light text-center">
                <a href="{{ route('shop') }}"
                    class="d-block text-decoration-none text-uppercase p-3 rounded-0 btn border-bottom border-3">Search
                    by categories</a>
                @foreach ($categories as $category)
                    <a href="{{ route('shop', ['category' => $category['slug']]) }}"
                        @if (Route::currentRouteName() == 'shop' && request()->input('category') == $category['slug']) class="d-block text-decoration-none text-uppercase p-3 bg-secondary text-light" @else
                        class="d-block text-decoration-none text-dark-emphasis text-uppercase p-3" @endif>
                        {{ $category['name'] }}
                    </a>
                @endforeach
            </div>
            <div class="col-10">
                @if (count($products) === 0)
                    <div class="row text-center">
                        <div class="justify-content-center">
                            <img src="{{ URL::asset('assests/Images/no_page.png') }}" class="mt-5 mb-5 w-25"
                                alt="The page you're looking for is not available">
                            <p class="text-muted text-uppercase mt-2 fs-6 h4">We apologize, but there are no products
                                available in this category right now.</p>
                            <p class="text-muted text-uppercase mt-2">Please browse our other categories to find what
                                you're looking for.</p>
                            <a href="{{ route('shop') }}" class="btn btn-dark text-uppercase">Browze</a>
                        </div>
                    </div>
                @else
                    <div class="row text-center">
                        <div class="row">
                            <div class="dropdown">
                                <button class="btn btn-dark btn-sm px-4 float-end mt-3 dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Price
                                </button>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li>
                                        <a class="text-light dropdown-item{{ Request::get('sort') === 'low_high' ? ' active' : '' }}"
                                            href="{{ route('shop', ['category' => request()->category, 'sort' => 'low_high']) }}">Low
                                            to High</a>
                                    </li>
                                    <li>
                                        <a class="text-light dropdown-item{{ Request::get('sort') === 'high_low' ? ' active' : '' }}"
                                            href="{{ route('shop', ['category' => request()->category, 'sort' => 'high_low']) }}">High
                                            to Low</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @foreach ($products as $product)
                            <div class="col-3">
                                <div class="card p-2 border-0">
                                    <img src="{{ URL::asset($product['image']) }}" class="card-img-top"
                                        alt="{{ $product['name'] }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product['name'] }}</h5>
                                        <p class="card-text text-truncate">{{ $product['details'] }}</p>
                                        <p class="card-text">@currency($product['price'])</p>
                                        <div class="d-flex">
                                            <a href="{{ route('shop.show', ['product' => $product['id']]) }}"
                                                class="btn btn-outline-dark px-3">View</a>
                                            <form method="POST" action="{{ route('cart.store') }}">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $product->id }}">
                                                @if (collect($cart)->where('product_id', $product->id)->count())
                                                    <button type="submit" class="btn btn-dark text-uppercase ms-2 px-2"
                                                        disabled>
                                                        already in Basket
                                                    </button>
                                                @else
                                                    <button type="submit"
                                                        class="btn btn-dark text-uppercase ms-2 px-3 ">
                                                        Add to basket
                                                    </button>
                                                @endif
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
    <x-scripts />
</body>

</html>
