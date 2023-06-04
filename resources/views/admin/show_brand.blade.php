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
  <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>

    <title>Brand</title>
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

            

            <div class="row">
  <div class="col-12">
  <div class="d-flex align-items-center justify-content-between">

  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Brand /</span> View brands</h4>
    
      <a href="{{url('brand')}}" class="btn btn-outline-green">Add Brand</a>
      </div>
      </div>
      </div>



      
      @if(session()->has('message'))
      <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      {{session()->get('message')}}
      </div>
      @endif
      
      
   
           

          





                <!-- main category Table -->
                <div class="card">
                <div class="table-responsive text-nowrap">
                  <table class="table css-serial">

                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Brand name</th>
                        <th>image</th>
                        <th>Actions</th>
                      </tr>
                    </thead>

                    <tbody class="table-border-bottom-0">
                    @foreach($brand as $brand)
                      <tr>
                        <td></td>
                        <td> <strong>{{$brand->brand_name}}</strong></td>
                        <td> <img style="width:150px;" src="/images/brand_image/{{$brand->brand_image}}" alt="brand_image"></td>
                        
                        <td>
                        
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{url('update_brand',$brand->id)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                              <a class="dropdown-item" href="{{url('delete_brand',$brand->id)}}"onclick="return confirm('Are You Sure To Delete This Brand')">
                                <i class="bx bx-trash me-1"></i> Delete</a>
                            </div>
                          </div>
                        </td>
                        @endforeach
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
