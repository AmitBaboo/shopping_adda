<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="{{url('/')}}" class="app-brand-link mt-2">
              
              <img style="width:200px; margin-left:20px;" src="{{asset('admin_layout/assets/img/logo.png')}}" alt="logo">
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item active">
              <a href="{{url('/')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            

            <!-- Category -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Categories section</span></li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Category</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{url('category')}}" class="menu-link">
                    <div data-i18n="Without menu">Add Category</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{url('show_category')}}" class="menu-link">
                    <div data-i18n="Without navbar">View Category</div>
                  </a>
                </li>
               
              </ul>
            </li>

              <!-- Product -->
              <li class="menu-header small text-uppercase"><span class="menu-header-text">Product section</span></li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Product</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="layouts-without-menu.html" class="menu-link">
                    <div data-i18n="Without menu">Add Product</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-without-navbar.html" class="menu-link">
                    <div data-i18n="Without navbar">View Product</div>
                  </a>
                </li>
               
              </ul>
            </li>

              <!-- Product -->
              <li class="menu-header small text-uppercase"><span class="menu-header-text">Brand section</span></li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Brand</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{url('brand')}}" class="menu-link">
                    <div data-i18n="Without menu">Add brand</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{url('show_brand')}}" class="menu-link">
                    <div data-i18n="Without navbar">View brand</div>
                  </a>
                </li>
               
              </ul>
            </li>

           

          </ul>
          
        </aside>