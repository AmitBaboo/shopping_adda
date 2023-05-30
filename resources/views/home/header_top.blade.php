<div class="header-top">
                <div class="container">
                    <div class="header-left">
                        <p>Special collection already available.</p><a href="#">&nbsp;Read more ...</a>
                    </div><!-- End .header-left -->

                    <div class="header-right">

                        <ul class="top-menu">
                            <li>
                                <a href="#">Links</a>
                                <ul>
                                    <li>
                                        <div class="header-dropdown">
                                            <a href="#">USD</a>
                                            <div class="header-menu">
                                                <ul>
                                                    <li><a href="#">Eur</a></li>
                                                    <li><a href="#">Usd</a></li>
                                                </ul>
                                            </div><!-- End .header-menu -->
                                        </div>
                                    </li>
                                    <li>
                                        <div class="header-dropdown">
                                            <a href="#">English</a>
                                            <div class="header-menu">
                                                <ul>
                                                    <li><a href="#">English</a></li>
                                                    <li><a href="#">French</a></li>
                                                    <li><a href="#">Spanish</a></li>
                                                </ul>
                                            </div><!-- End .header-menu -->
                                        </div>
                                    </li>
                                    <!---<li><a href="#signin-modal" data-toggle="modal">Sign in / Sign up</a></li>-->

                                    @if (Route::has('login'))
                                    @auth
                                   
                                    <div class="ml-5 header-dropdown">
                                            <a href="#" style="text-transform: uppercase;">{{ auth()->user()->name }}</a>
                                            <div class="header-menu">
                                                <ul>
                                                    <li><a href="http://127.0.0.1:8000/profile">Profile</a></li>


                                                    <form method="POST" action="http://127.0.0.1:8000/logout">  
                                                    @csrf
                                                    <li><a href="http://127.0.0.1:8000/logout" onclick="event.preventDefault();
                                                this.closest('form').submit();">Logout</a></li>
                                                 </form>

                                                 
                                                 
                                                </ul>
                                            </div><!-- End .header-menu -->
                                        </div>

                                      


                                    @else
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                    <li><a href="{{ route('register') }}">Register</a></li>
                                    @endauth
                                    @endif

                                </ul>
                            </li>
                        </ul><!-- End .top-menu -->
                    </div><!-- End .header-right -->

                </div><!-- End .container -->
            </div><!-- End .header-top -->