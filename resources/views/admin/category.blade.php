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

    <title>Add Category</title>
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
          <div class="content-wrapper"
          
          >
            <!-- Content -->       
            <div class="container-xxl flex-grow-1 container-p-y" style="text-transform: uppercase;">


            <div class="row">
  <div class="col-12">
  <div class="d-flex align-items-center justify-content-between">

     <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Category /</span> Add Category</h4>
    
      <a href="{{url('show_category')}}" class="btn btn-outline-green">Back</a>
      </div>
      </div>
      </div>

          





          
          <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Create New Sub Category</h5>
                      
                    </div>
                    <div class="card-body">
                      <form action="{{url('/add_sub_category')}}" method="POST">
                      @csrf

                      <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Select Main Category</label>
                          
                          <select class="form-select" name="main_category" aria-label="Default select example" required="" style="text-transform: uppercase;">
                          <option selected="" value="">select</option>
                          @foreach($data as $category)
                          <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                          @endforeach
                        </select>
                         
                        </div> 


                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Sub Category Name</label>
                          <input type="text" name="sub_category" class="form-control" id="basic-default-fullname" placeholder="Write here" required=""/>
                        </div>   
                        <button type="submit" class="btn btn-outline-secondary">Add</button>
                      </form>
                    </div>
                  </div>
                </div>
             
              </div>











           
            <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Create New Category</h5>
                      
                    </div>
                    <div class="card-body">
                      <form action="{{url('/add_category')}}" method="POST">
                      @csrf
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Category Name</label>
                          <input type="text" name="category" class="form-control" id="basic-default-fullname" placeholder="Write here" required=""/>
                        </div>   
                        <button type="submit" class="btn btn-outline-secondary">Add</button>
                      </form>
                    </div>
                  </div>
                </div>
             
              </div>








             
                
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
