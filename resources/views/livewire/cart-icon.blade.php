<ul class="navbar-nav mt-5 mt-lg-0 ms-auto">
    <li class="nav-item">
        <a id="cart-icon" class="nav-link p-0" href="{{ route('cart') }}">                   
            <div class="position-relative d-inline-block">
                <i class="fa-solid fa-cart-shopping text-dark fw-bold fs-5"></i>
                <span id="cart-count"
                      class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    {{ $cartCount }}
                </span>
            </div>
        </a>
    </li>
</ul>
