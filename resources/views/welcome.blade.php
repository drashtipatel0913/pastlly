<!doctype html>
<html lang="en">
<x-header />

<body>
    <x-navbar />

    <div class="container-fluid text-center">
        <div class="row row-cols-2 m-3 row-cols-lg-5 g-2 g-lg-3">
            @foreach ($featured as $product)
                <div class="col">
                    <div class="card">
                        <a href="{{ route('shop.show', ['product' => $product['id']]) }}" class="btn btn-outline-dark p-0">
                            <img src="{{ URL::asset($product['image']) }}" class="card-img-top rounded-bottom-0"
                                alt="{{ $product['name'] }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product['name'] }}</h5>
                                <p class="card-text text-truncate">{{ $product['details'] }}</p>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <x-scripts />
</body>

</html>
