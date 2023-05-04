<!doctype html>
<html lang="en">
<x-header />

<body>
    <x-navbar />
    <div class="container">
        @if ($cartItems->count() == 0)
            <div class="mt-4 justify-content-center text-center">
                <img src="{{ URL::asset('assests/Images/empty_cart.png') }}" alt="Empty Cart" class="w-25">
                <p class="text-capitalize text-muted h1">Your cart is empty</p>
                <p class="text-capitalize text-muted">looks like you have not added anything to your cart. go ahead &
                    explore top delicious categories</p>
                <div class="justify-content-center">
                    <a href="{{ route('shop') }}" class="btn btn-dark text-capitalize text-center w-50">Continue
                        shopping</a>
                </div>
            </div>
        @else
            <div class="row">
                <a href="{{ route('shop') }}" class="my-3 btn btn-outline-dark text-capitalize">Continue
                    shopping</a>
            </div>
            <div class="row justify-content-center my-4">
                <div class="col-8">
                    <div class="card mb-4">
                        <div class="card-header">
                            <span class="float-start text-uppercase fs-5 fw-semibold">
                                Your items
                            </span>
                            <i class="bi bi-basket-fill float-end text-success-emphasis h4 ms-2"></i>
                        </div>
                        <div class="card-body">
                            @foreach ($cartItems as $item)
                                <div class="row cart-div">
                                    <div class="col-2 h-100">
                                        <!-- Image -->
                                        <img src="{{ URL::asset($item['product']->image) }}"
                                            class="object-fit-cover w-100 h-100" alt="{{ $item['product']->name }}" />
                                        <!-- Image -->
                                    </div>
                                    <div class="col-3">
                                        <!-- Data -->
                                        <p class="text-uppercase fw-bold mb-1">{{ $item['product']->name }}</p>
                                        <div class="text-start text-justify">
                                            <p class="text-start text-justify"
                                                style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                                {{ $item['product']->details }}
                                            </p>
                                        </div>
                                        <!-- Remove From Cart Button -->
                                        <div class="d-flex">
                                            <form action="{{ route('cart.destroy', $item['product_id']) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="shadow btn btn-primary btn-sm me-2"
                                                    data-mdb-toggle="tooltip" title="Remove item">
                                                    <i class="bi bi-trash-fill px-2"></i>
                                                </button>
                                            </form>
                                            <form action="{{ route('cart.destroy', $item['product_id']) }}"
                                                method="POST">
                                                @csrf
                                                {{-- @method('DELETE') --}}
                                                <button type="submit" class="shadow btn btn-danger btn-sm mb-2"
                                                    data-mdb-toggle="tooltip" title="Move to the wish list">
                                                    <i class="bi bi-heart-fill px-2"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <!-- Add to Favorite Button -->
                                        <!-- Data -->
                                    </div>
                                    <!-- Quantity -->
                                    <div class="col-2 text-center">
                                        <span class="text-uppercase h6">Price</span>
                                        <!-- Price -->
                                        <p class="mt-3 fw-bold">@currency($item['product']->price)</p>
                                        <!-- Price -->
                                    </div>
                                    <div class="col-3 text-center">
                                        <span class="text-uppercase h6">Quantity</span>
                                        <div class="input-group w-75 mt-3 ms-4">
                                            <button class="btn btn-outline-danger"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                                type="button">
                                                <i class="bi bi-dash"></i>
                                            </button>
                                            <input type="number" min="0" name="quantity"
                                                value="{{ $item['quantity'] }}" class="text-center form-control"
                                                placeholder="" aria-label="Example text with button addon"
                                                aria-describedby="button-addon1">
                                            <button class="btn btn-outline-primary"
                                                onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                                type="button" id="button-addon1"><i class="bi bi-plus"></i></button>
                                        </div>
                                    </div>
                                    <!-- Quantity -->
                                    <div class="col-2 text-center">
                                        <span class="text-uppercase h6">SubTotal</span>
                                        <!-- Price -->
                                        <p class="mt-3 fw-bold">@currency($item['product']->price)</p>
                                        <!-- Price -->
                                    </div>
                                </div>
                                <!-- Single item -->
                                <hr class="my-4" />
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card mb-4 text-uppercase">
                        <div class="card-header py-3">
                            <h5 class="mb-0 text-uppercase">order Summary</h5>
                        </div>
                        <div class="card-body">
                            <div class="input-group mt-3 mb-4">
                                <input type="text" class="form-control text-uppercase fs-6"
                                    placeholder="Enter promocode here" aria-label="Recipient's username"
                                    aria-describedby="basic-addon2">
                                <span class="input-group-text" id="basic-addon2">Apply</span>
                            </div>
                            <div
                                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0 mb-4">
                                subtotal
                                <span>$53.98</span>
                            </div>
                            <div
                                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0 mb-4">
                                Delivery fee
                                <span>$53.98</span>
                            </div>
                            <div
                                class="list-group-item d-flex justify-content-between align-items-center px-0 border-0 pb-0 mb-4">
                                tax services and other fees
                                <span>$53.98</span>
                            </div>
                            <div
                                class="list-group-item d-flex justify-content-between fw-bold align-items-center border-0 px-0 mb-4">
                                <div>you pay</div>
                                <span>$53.98</span>
                            </div>
                            <button type="button" class="btn btn-primary w-100 my-3">
                                Go to checkout
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    </div>
    <x-scripts />
</body>

</html>
