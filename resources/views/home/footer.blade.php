<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="full">
                    <div class="logo_footer">
                        <a href="#"><img width="210" src="images/logs.jpg" alt="#" /></a>
                    </div>
                    <div class="information_f">
                        <p><strong>TELEPHONE:</strong> +977 9807226379</p>
                        <p><strong>EMAIL:</strong> suzbey.sapkota@gmail.com</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="widget_menu">
                                    <h3>Menu</h3>
                                    <ul>
                                        <li><a href="#">Home</a></li>
                                        <li><a href="#">Services</a></li>
                                        <li><a href="#">Review</a></li>
                                        <li><a href="#">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="widget_menu">
                                    <h3>Account</h3>
                                    <ul>
                                        <li><a href="#">Login</a></li>
                                        <li><a href="#">Register</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="widget_menu">
                            <h3>Ask Question/Drop Your Review</h3>
                            <div class="form_sub">
                                <form action="/send-mail" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" class="form-control mb-0" id="email"
                                            placeholder="Email" required name="email">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" id="message" placeholder="Message" required name="message" style="min-height: 100px"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
