<a href="{{ route('cart.index') }}" class="me-5 btn btn-light position-relative">
    <i class="bi bi-basket-fill"></i>
    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
        {{ $totalCartItems }}
        <span class="visually-hidden">Cart Items</span>
    </span>
</a>
