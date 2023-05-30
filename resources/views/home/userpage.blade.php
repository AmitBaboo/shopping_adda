<!DOCTYPE html>
<html lang="en">


<!-- molla/index-1.html  22 Nov 2019 09:55:06 GMT -->
<head>
  @include('home.head')
</head>

<body>
    <div class="page-wrapper">
        <header class="header header-2 header-intro-clearance">
        @include('home.header_top')
        
        @include('home.header_middle')
           
        @include('home.navbar')
           
        </header><!-- End .header -->

        <main class="main">
            
        @include('home.slider')

        @include('home.brand')  

        <div class="mb-3 mb-lg-5"></div><!-- End .mb-3 mb-lg-5 -->

        @include('home.banner_section')  

        <div class="mb-3"></div><!-- End .mb-6 -->

        @include('home.future_section')  
 

        <div class="mb-5"></div><!-- End .mb-5 -->

        @include('home.deal_section') 

        <div class="mb-6"></div><!-- End .mb-6 -->

        @include('home.top_selling')   

        @include('home.blog')

        </main><!-- End .main -->

        @include('home.footer')

        </div><!-- End .page-wrapper -->
    
        <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    
        <!-- Mobile Menu -->
        <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

        @include('home.mobile_sidebar')

        <!-- Sign in / Register Modal -->
        @include('home.mobile_login_reg')
        <!-- End .modal -->
    
       <!-- @include('home.news_letter') -->

        <!-- Plugins JS File -->
        @include('home.script')
</body>


<!-- molla/index-1.html  22 Nov 2019 09:55:32 GMT -->
</html>