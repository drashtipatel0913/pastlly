<!doctype html>
<html lang="en">
<x-header />

<body>

    <h2>Categories</h2>
    @foreach ($categories as $category)
        <a href="{{ route('shop', ['category' => $category['slug']]) }}">{{ $category['name'] }}</a>
    @endforeach
    <br>
    <h2>Products</h2>
    @foreach ($products as $product)
        {{ $product['name'] }}
        <img src="{{ URL::asset($product['image']) }}" width="100">
    @endforeach

    <x-scripts />
</body>

</html>
