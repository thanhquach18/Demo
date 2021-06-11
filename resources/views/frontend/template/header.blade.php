<header id="header">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="navbar-top">
          <div class="d-flex justify-content-between align-items-center">
           
            
          </div>
        </div>
        <div class="navbar-bottom">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <a class="navbar-brand" href="#"
                ><img src="{{ URL::asset('assets/images/logo.svg') }}" alt=""
              /></a>
            </div>
            <div>
              <button
                class="navbar-toggler"
                type="button"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
              >
                <span class="navbar-toggler-icon"></span>
              </button>
              <div
                class="navbar-collapse justify-content-center collapse"
                id="navbarSupportedContent"
              >
                <ul
                  class="navbar-nav d-lg-flex justify-content-between align-items-center"
                >
                  <li>
                    <button class="navbar-close">
                      <i class="mdi mdi-close"></i>
                    </button>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="{{ route('website.index') }}">Trang Chủ</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#blog">Tin Tức</a>
                  </li>
                 
                </ul>
              </div>
            </div>
            
            <ul class="navbar-nav d-lg-flex justify-content-between align-items-center">
              <li class="nav-item">
                <a href="#" class="nav-link"><i class="mdi mdi-magnify"></i></a>
              </li>
              <li class="nav-item">
                <a href="{{ route('login.get') }}" class="nav-link">Đăng Nhập</a>
              </li>
              {{-- <li class="nav-item">
                <a href="#" class="nav-link">Sign in</a>s
              </li> --}}
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
  