<!doctype html>
<html lang="en">
<x-header />

<body>
    <h2>This is Shop</h2>

    <h1>Shop > {{ $categoryName }}</h1>

    @foreach ($categories as $category)
        <a href="{{ route('shop', ['category' => $category['slug']]) }}">{{ $category['name'] }}</a>
    @endforeach
    <br>
    @foreach ($products as $product)
        {{ $product['name'] }}
    @endforeach

    <x-scripts />
</body>

</html>
