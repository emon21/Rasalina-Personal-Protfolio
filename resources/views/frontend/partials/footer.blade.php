 @php
$footer = App\Models\Footer::first();
 @endphp
 
 <footer class="footer">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-4">
                    <div class="footer__widget">
                        <div class="fw-title">
                            <h5 class="sub-title">Contact us</h5>
                            <h4 class="title">{{ $footer->footer_phone_no }}</h4>
                        </div>
                        <div class="footer__widget__text">
                            <p>{{ $footer->footer_description }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="footer__widget">
                        <div class="fw-title">
                            <h5 class="sub-title">my address</h5>
                            <h4 class="title">AUSTRALIA</h4>
                        </div>
                        <div class="footer__widget__address">
                            <p>{{ $footer->footer_address }}</p>
                            <a href="mailto:noreply@envato.com" class="mail">{{ $footer->footer_email }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="footer__widget">
                        <div class="fw-title">
                            <h5 class="sub-title">Follow me</h5>
                            <h4 class="title">socially connect</h4>
                        </div>
                        <div class="footer__widget__social">
                            <p>{{ $footer->footer_text }}</p>
                            <ul class="footer__social__list">
                                
                                <li><a href="#"><i class="fab fa-facebook-f"></i> {{ $footer->footer_social_facebook }}</a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i> {{ $footer->footer_social_twitter }}</a></li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright__wrap">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center copyright__text">
                            <p>{{ $footer->footer_copyright }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>