<!doctype html>
<html lang="en">
<x-header />

<body>
    <x-navbar />
    <div class="container">
        <div class="row">
            <a href="#">Continue shopping</a>
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
                        <div class="row">
                            <div class="col-3">
                                <!-- Image -->
                                <img src="{{ url('/assests/Carousel Iamges/carousel-img-1.jpg') }}"
                                    class="w-100 h-100 object-fit-cover" alt="Blah Blah cake" />
                                <!-- Image -->
                            </div>
                            <div class="col-4">
                                <!-- Data -->
                                <p class="text-uppercase fw-bold">Blah Blah Cake</p>
                                <div class="text-start text-justify">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores pariatur in vero
                                        nesciunt animi blanditiis tempore, molestiae quos, exercitationem accusantium.
                                    </p>
                                </div>
                                <!-- Remove From Cart Button -->
                                <button type="button" class="shadow btn btn-primary btn-sm me-1 mb-2"
                                    data-mdb-toggle="tooltip" title="Remove item">
                                    <i class="bi bi-trash-fill px-2"></i>
                                </button>
                                <!-- Add to Favorite Button -->
                                <button type="button" class="shadow btn btn-danger btn-sm mb-2"
                                    data-mdb-toggle="tooltip" title="Move to the wish list">
                                    <i class="bi bi-heart-fill px-2"></i>
                                </button>
                                <!-- Data -->
                            </div>
                            <!-- Quantity -->
                            <div class="col-3 text-center">
                                <span class="text-uppercase h6">Quantity</span>
                                <div class="input-group w-75 mt-3 ms-4">
                                    <button class="btn btn-outline-danger"
                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                        type="button">
                                        <i class="bi bi-dash"></i>
                                    </button>
                                    <input type="number" min="0" name="quantity" value="1"
                                        class="text-center form-control" placeholder=""
                                        aria-label="Example text with button addon" aria-describedby="button-addon1">
                                    <button class="btn btn-outline-primary"
                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                        type="button" id="button-addon1"><i class="bi bi-plus"></i></button>
                                </div>
                            </div>
                            <!-- Quantity -->
                            <div class="col-2 text-center">
                                <span class="text-uppercase h6">Price</span>
                                <!-- Price -->
                                <p class="mt-3 fw-bold">@currency(1799)</p>
                                <!-- Price -->
                            </div>
                        </div>
                        <!-- Single item -->
                        <hr class="my-4" />
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
    </div>
    <x-scripts />
</body>

</html>
