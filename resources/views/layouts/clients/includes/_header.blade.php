<header id="header" aria-label="Website header">
    <!-- Nav -->
    <div id="nav">
        <div id="nav-fixed">
            <div class="container">
                <!-- logo -->
                <div class="nav-logo" aria-label="Website logo">
                    <a href="{{ route('projects.index') }}" class="logo">
                        <img src="{{ asset('assets/imgs/ezd.png')}}" alt="EZD Logo">
                    </a>
                </div>
                <!-- /logo -->

                <!-- nav -->
                <ul class="nav-menu nav navbar-nav flex-row d-none d-lg-block" aria-label="Main navigation">
                    <li><a href="https://ezdpro.com" aria-label="bolgs news">News</a></li>
                    <li><a href="" aria-label="Popular category">Popular</a></li>
                    @foreach ($categories as $category )
                      <li class="{{ $category->class }}">
                          <a href="{{ route('category.projects', $category->slug) }}" aria-label="Category: {{ $category->name }}">{{ $category->name }}</a>
                      </li>
                    @endforeach
                </ul>
                <!-- /nav -->

                <!-- search & aside toggle -->
                <div class="nav-btns">
                    <button aria-label="Open navigation menu" class="aside-btn">
                        <i class="fas fa-bars"></i>
                    </button>
                    <button class="search-btn" aria-label="Search for projects" onclick="getElementById('query').focus()">
                        <i class="fas fa-search"></i>
                    </button>
                    <form action="{{ route('projects.index') }}" method="GET" class="search-form" aria-label="Search form">
                        <input class="search-input" autocomplete="off" type="text" id="query" name="query" 
                            aria-label="Search projects" placeholder="Enter Your Search ...">
                        <div id="search-results" class="list-group" style="position: absolute; z-index: 1000;"></div>
                        <button aria-label="Close search" class="search-close">
                            <i class="fas fa-times"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div id="nav-aside" aria-label="Aside navigation">
            <!-- nav -->
            <div class="section-row">
                <button aria-label="Close aside navigation" class="nav-aside-close">
                    <i class="fas fa-times"></i>
                </button>
                <ul class="nav-aside-menu" aria-label="Aside menu links">
                    <li><a href="{{ route('home') }}" aria-label="Home page">Home</a></li>
                    @if (Auth::check() && Auth::user()->is_admin)
                    <li><a href="{{ route('admin.projects.index') }}" aria-label="Admin dashboard">Administration</a></li>
                    @endif
                    <li><a href="{{ route('about.us') }}" aria-label="About us page">About Us</a></li>
                    @if (!Auth::check())
                    <li><a href="{{ route('auth.login') }}" aria-label="login us page">Login </a></li>
                    <li><a href="{{ route('auth.register') }}" aria-label="register us page">Register </a></li>
                    @endif
                    <li><a href="{{ route('contact.us') }}" aria-label="Contact page">Contacts</a></li>
                    {{-- <li><a href="#" aria-label="Advertisement page">Advertisement</a></li> --}}
                    @if (Auth::check())
                    <li><a class="text-danger" href="{{ route('auth.logout') }}" aria-label="Log out">Log out</a></li>
                    @endif
                </ul>
            </div>
            <!-- /nav -->

            <!-- widget projects -->
            <div class="section-row" aria-label="Recent projects section">
                <h3>Recent projects</h3>
                @foreach ($topProjects as $project)
                <div class="post post-widget">
                    <a class="post-img" href="{{ route('projects.show', ['category'=>$project->category->slug,'project'=>$project->slug]) }}" 
                        aria-label="View post: {{ $project->title }}">
                        <img src="{{ asset($project->image_path)}}" alt="Image for {{ $project->title }}">
                    </a>
                    <div class="post-body">
                        <h3 class="post-title">
                            <a href="{{ route('projects.show', ['category'=>$project->category->slug,'project'=>$project->slug]) }}" 
                                aria-label="View post: {{ $project->title }}">
                                {{ $project->title }}
                            </a>
                        </h3>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- /widget projects -->

            <!-- social links -->
            <div class="section-row" aria-label="Social media links">
                <h3>Follow us</h3>
                <ul class="nav-aside-social">
                    <li><a href="https://t.me/ezdcommunity" target="_blank" aria-label="EZD Telegram group"><i class="fab fa-telegram"></i></a></li>
                    <li><a href="https://www.facebook.com/profile.php?id=100077438636363" target="_blank" aria-label="Facebook link"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="https://x.com/ezdpro99?t=7vM0VMPvGGX44TSYLJGanw&s=09" target="_blank" aria-label="Twitter link"><i class="fab fa-twitter"></i></a></li>
                    
                </ul>
            </div>
            <!-- /social links -->

            <!-- aside nav close -->
            <button aria-label="Close aside navigation" class="nav-aside-close">
                <i class="fas fa-times"></i>
            </button>
            <!-- /aside nav close -->
        </div>
        <!-- Aside Nav -->
    </div>
    <!-- /Nav -->
    @yield('header')
</header>
