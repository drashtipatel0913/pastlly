<!doctype html>
<html lang="en">
<x-header />

<body>
    <x-navbar />
    <div class="container-fluid">
        <div style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb border-bottom p-3 my-0">
                <li class="breadcrumb-item">
                    <a class="text-decoration-none text-dark-emphasis" href="{{ route('welcome') }}">Home</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a class="text-decoration-none text-dark-emphasis p-1" href="{{ route('shop') }}">Shop</a>
                </li>
                <li class="breadcrumb-item active text-dark-emphasis" aria-current="page">
                    <span>{{ $category }}</span>
                </li>
                <li class="breadcrumb-item active text-dark-emphasis" aria-current="page"><span
                        class="border-bottom border-dark border-2">{{ $product->name }}</span></li>
            </ol>

        </div>
    </div>
    <x-scripts />
</body>

</html>
