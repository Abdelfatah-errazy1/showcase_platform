<footer id="footer" aria-label="Website footer">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="footer-widget">
                    <div class="footer-logo" aria-label="Website logo">
                        <a href="{{ route('home') }}" class="logo"><img src="{{ asset('assets/imgs/ezd.png') }}" width="90" alt="EZD Logo"></a>
                    </div>
                    <ul class="footer-nav" aria-label="Footer navigation">
                        <li>
                            <a href="{{ route('terms.conditions') }}" aria-label="Terms and Conditions">Terms and Conditions</a>
                        </li>
                        <li>
                            <a href="{{ route('privacy.policy') }}" aria-label="Privacy Policy">Privacy Policy</a>
                        </li>
                    </ul>
                    <div class="footer-copyright">
                        <span>&copy; 
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                             All rights reserved to
                             <a href="https://ezdpro.com" target="_blank" aria-label="EZDpro website">EZD</a>
                            </span>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="footer-widget">
                            <h3 class="footer-title" aria-label="About Us section">About Us</h3>
                            <ul class="footer-links" aria-label="About us links">
                                <ul>
                                   
                                    <li>
                                        <a href="{{ route('about.us') }}" aria-label="About Us">About Us</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('contact.us') }}" aria-label="Contact Us">Contact Us</a>
                                    </li>
                                </ul>
                                
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="footer-widget">
                            <h3 class="footer-title" aria-label="Categories section">Categories</h3>
                            <ul class="footer-links" aria-label="Category links">
                                @foreach ($categories as $category)
                                <li><a href="{{ route('category.projects', $category->slug) }}" aria-label="Category: {{ $category->name }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="footer-widget">
                    <h3 class="footer-title" aria-label="Newsletter section">Join our Newsletter</h3>
                    <div class="footer-newsletter">
                        <form method="POST" action="https://ezdpro.com/subscribe" aria-label="Subscribe to our newsletter">
                            @csrf
                            <input class="input" type="email" id="subscribe" name="email" aria-label="Enter your email" placeholder="Enter your email">
                            <button class="newsletter-btn" aria-label="Subscribe to newsletter"><i class="fa fa-paper-plane"></i></button>
                        </form>
                    </div>
                    <ul class="footer-social" aria-label="Social media links">
                        <li><a href="https://t.me/ezdcommunity" target="_blank" aria-label="EZD Telegram group"><i class="fab fa-telegram"></i></a></li>
                        <li><a href="https://www.facebook.com/profile.php?id=100077438636363" target="_blank" aria-label="Facebook link"><i class="fab fa-facebook"></i></a></li>
                        <li><a href="https://x.com/ezdpro99?t=7vM0VMPvGGX44TSYLJGanw&s=09" target="_blank" aria-label="Twitter link"><i class="fab fa-twitter"></i></a></li>
                    </ul>
                </div>
            </div>

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</footer>
<!-- /Footer -->
