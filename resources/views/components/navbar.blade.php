  <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
      <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="{{ route('/') }}">Home</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('about') }}">About</a>
                  </li>

                  <li class="nav-item">
                  <a class="nav-link" href="{{ route('restaurant-menu') }}">Menu</a>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('catering') }}">Catering</a>
                  </li>
              </ul>

                <livewire:cart-icon/>

          </div>
      </div>
  </nav>
