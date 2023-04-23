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
                        class="border-bottom border-dark border-3   ">{{ $categoryName }}</span></li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 bg-light text-center">
                @foreach ($categories as $category)
                    <a href="{{ route('shop', ['category' => $category['slug']]) }}"
                        @if (Route::currentRouteName() == 'shop' && request()->input('category') == $category['slug']) class="d-block text-decoration-none text-uppercase p-3 bg-secondary text-light" @else
                        class="d-block text-decoration-none text-dark-emphasis text-uppercase p-3" @endif>
                        {{ $category['name'] }}
                    </a>
                @endforeach
            </div>
            <div class="col-10">
                <div class="row">
                    <div class="dropdown">
                        <button class="btn btn-secondary float-end mt-3 dropdown-toggle" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Price
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li>
                                <a class="dropdown-item{{ Request::get('sort') === 'low_high' ? ' active' : '' }}"
                                    href="{{ route('shop', ['category' => request()->category, 'sort' => 'low_high']) }}">Low
                                    to High</a>
                            </li>
                            <li>
                                <a class="dropdown-item{{ Request::get('sort') === 'high_low' ? ' active' : '' }}"
                                    href="{{ route('shop', ['category' => request()->category, 'sort' => 'high_low']) }}">High
                                    to Low</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row text-center">
                    @foreach ($products as $product)
                        <div class="col-3">
                            <div class="card p-3 border-0">
                                <img src="{{ URL::asset($product['image']) }}" class="card-img-top"
                                    alt="{{ $product['name'] }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product['name'] }}</h5>
                                    <p class="card-text text-truncate">{{ $product['details'] }}</p>
                                    <p class="card-text">@currency($product['price'])</p>
                                    <a href="#" class="btn btn-outline-dark">Add to Cart</a>
                                    <a href="{{ route('shop.show', ['product' => $product['id']]) }}"
                                        class="btn btn-outline-dark">View</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <x-scripts />
</body>

</html>
