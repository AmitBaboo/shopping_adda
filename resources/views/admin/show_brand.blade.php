<!DOCTYPE html>

<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
  @include('admin.head')
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        @include('admin.sidebar')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          @include('admin.navbar')
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->       
            <div class="container-xxl flex-grow-1 container-p-y" style="text-transform: uppercase;">

            @if(session()->has('message'))
      <div class="alert alert-success">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

        {{session()->get('message')}}
      </div>
          @endif


              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Brand /</span> View brands</h4>





                <!-- main category Table -->
                <div class="card">
                <h5 class="card-header">Brands</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">

                    <thead>
                      <tr>
                        <th>Brand name</th>
                        <th>image</th>
                        <th>Actions</th>
                      </tr>
                    </thead>

                    <tbody class="table-border-bottom-0">
                   
                      <tr>
                        @foreach($brand as $brand)
                        <td> <strong>{{$brand->brand_name}}</strong></td>
                        <td> <img style="width:150px;" src="/brand_image/{{$brand->brand_image}}" alt="brand_image"></td>
                        @endforeach
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href=""><i class="bx bx-edit-alt me-1"></i> Edit</a>
                              <a class="dropdown-item" href="}" onclick="return confirm('Are You Sure To Delete This Category')">
                                <i class="bx bx-trash me-1"></i> Delete</a>
                            </div>
                          </div>
                        </td>

                      </tr>
                      
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ main category Table -->

             
                
              </div>          
            </div>
            <!-- / Content -->
            

            <!-- Footer -->
            @include('admin.footer')
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    @include('admin.script')
  </body>
</html>
