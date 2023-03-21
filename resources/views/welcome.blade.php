<!doctype html>
<html lang="en">
<x-header />

<body>
    <x-navbar />

    <div class="container text-center">
        <div class="row row-cols-2 m-3 row-cols-lg-5 g-2 g-lg-3">
            @foreach ($products as $product)
                <div class="col">
                    <div class="card">
                        <img src="{{ URL::asset($product['image']) }}" class="card-img-top"
                            alt="{{ $product['name'] }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product['name'] }}</h5>
                            <p class="card-text text-truncate">{{ $product['details'] }}</p>
                            <a href="#" class="btn btn-primary">Add to Cart</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <x-scripts />
</body>

</html>
