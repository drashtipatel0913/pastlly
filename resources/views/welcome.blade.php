<!doctype html>
<html lang="en">
<x-header />

<body>

    <h2>Products</h2>
    @foreach ($products as $product)
        {{ $product['name'] }}
        <img src="{{ URL::asset($product['image']) }}" width="100">
    @endforeach
    <br>
    <h2>Categories</h2>
    {{ $categories }}


    <x-scripts />
</body>

</html>
