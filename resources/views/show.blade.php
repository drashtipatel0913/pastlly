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
        <div class="container mt-4">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-5">
                                <div id="carouselExampleAutoplaying" class="carousel slide p-3" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="{{ $product->image }}" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ $product->image }}" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ $product->image }}" class="d-block w-100" alt="...">
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="p-4 mt-5">
                                    <div class="float-end">
                                        <i class="bi bi-basket-fill text-muted h4"></i>
                                    </div>
                                    <div class="mb-3">
                                        <span class="text-uppercase text-muted brand">{{ $category }}</span>
                                        <h5 class="text-uppercase my-3 fs-2">{{ $product->name }}</h5>
                                        <div class="fs-3 price d-flex flex-row align-items-center"> <span
                                                class="act-price">@currency($product->price)</span>
                                        </div>
                                    </div>
                                    <p class="about">{{ $product->details }}</p>
                                    @if ($product->isAvailable)
                                        <div class="sizes mt-5">
                                            <span class="text-success text-uppercase">available<span>
                                                    <i class="fs-4 align-middle bi bi-emoji-smile"></i>
                                        </div>
                                        <div class="cart mt-3 align-items-center">
                                            <a class="btn btn-primary text-uppercase mr-2 px-4" href="#"
                                                role="button">Add to
                                                cart</a>
                                        </div>
                                    @else
                                        <div class="sizes mt-5">
                                            <span class="text-danger text-uppercase">i'm sorry! this product isn't
                                                available right know<span>
                                                    <i class="fs-4 align-middle bi bi-emoji-frown"></i>
                                        </div>
                                        <div class="cart mt-3 align-items-center">
                                            <button class="btn btn-primary text-uppercase mr-2 px-4" role="button"
                                                disabled>Add to
                                                cart</button>
                                        </div>
                                    @endif
                                    <div class="mt-4 fs-3">
                                        <i class="bi bi-heart align-middle text-muted"></i>
                                        <i class="bi bi-share-fill align-middle ms-3 text-muted"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-scripts />
</body>

</html>
