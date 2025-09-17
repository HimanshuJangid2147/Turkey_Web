<footer class="site-footer">
    @include('user.partials.newsletter')
    <div class="container">
        <div class="row gy-4 gx-lg-5 align-items-start">

            <div class="col-lg-3 col-md-12">
                <div class="footer-card">
                    <div class="footer-brand">
                        <div class="footer-brand-icon-wrapper">
                            <i class="bi bi-airplane-fill"></i>
                        </div>
                        <h4 class="footer-brand-text">Turkey Travel</h4>
                    </div>
                    <p class="footer-card-description">
                        Discover the magic of Turkey with our expertly curated travel experiences. Creating
                        unforgettable memories since 1989.
                    </p>
                    <div class="footer-region-select m-3 ">
                        {{-- Dropdown for region select --}}
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="bi bi-globe"></i> Select Your Region
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">Europe</a></li>
                                <li><a class="dropdown-item" href="#">Asia</a></li>
                                <li><a class="dropdown-item" href="#">North America</a></li>
                                <li><a class="dropdown-item" href="#">South America</a></li>
                                <li><a class="dropdown-item" href="#">Africa</a></li>
                                <li><a class="dropdown-item" href="#">Oceania</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-md-12">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-6">
                        <h5 class="footer-heading">Booking</h5>
                        <ul class="footer-links">
                            <li><a href="#">My Booking</a></li>
                            <li><a href="#">Trip Feedback</a></li>
                            <li><a href="#">Safe Travels</a></li>
                            <li><a href="#">Travel Alerts</a></li>
                            <li><a href="#">Agent Login</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                        <h5 class="footer-heading">Company</h5>
                        <ul class="footer-links">
                            <li><a href="/about">About Us</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">B Corp</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                        <h5 class="footer-heading">Contact</h5>
                        <ul class="footer-links">
                            <li><a href="#">Get in Touch</a></li>
                            <li><a href="#">Live Chat</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Reviews</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                        <h5 class="footer-heading">Purpose</h5>
                        <ul class="footer-links">
                            <li><a href="#">The Foundation</a></li>
                            <li><a href="#">People</a></li>
                            <li><a href="#">Planet</a></li>
                            <li><a href="#">Wildlife</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p class="footer-copyright">© {{ date('Y') }} Turkey Travel. All rights reserved.</p>
            <div class="footer-socials">
                <a href="#" title="Facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" title="Instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" title="Twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" title="YouTube"><i class="bi bi-youtube"></i></a>
            </div>
        </div>
    </div>
</footer>
