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


              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Category /</span> View Category</h4>



              <!-- sub category Table -->
              <div class="card">
                <h5 class="card-header">Sub Categories</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">

                    <thead>
                      <tr>
                        <th>sub Category name</th>
                        <th>main category</th>
                        <th>Actions</th>
                      </tr>
                    </thead>

                    <tbody class="table-border-bottom-0">
                      @foreach($sub_category as $sub_category)
                      <tr>
                        <td> <strong>{{$sub_category->sub_category_name}}</strong></td>
                        <td>{{$sub_category->category_name}}</td>
                      
                       
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                              <a class="dropdown-item" href="{{url('delete_sub_category',$sub_category->id)}}"><i class="bx bx-trash me-1"></i> Delete</a>
                            </div>
                          </div>
                        </td>

                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ sub category Table -->


              <!--/ line brake -->
              <hr class="my-5" />
              <!--/ line brake -->

                <!-- main category Table -->
                <div class="card">
                <h5 class="card-header">Categories</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">

                    <thead>
                      <tr>
                        <th>Category name</th>
                        <th>Actions</th>
                      </tr>
                    </thead>

                    <tbody class="table-border-bottom-0">
                      @foreach($category as $category)
                      <tr>
                        <td> <strong>{{$category->category_name}}</strong></td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                              <a class="dropdown-item" href="{{url('delete_category',$category->id)}}"><i class="bx bx-trash me-1"></i> Delete</a>
                            </div>
                          </div>
                        </td>

                      </tr>
                      @endforeach
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
