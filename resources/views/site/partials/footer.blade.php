<footer class="section-footer bg-dark white">
    <div class="container">
        <section class="footer-top padding-top">
            <div class="row">
                <aside class="col-sm-3">
                    <article class="white">
                        <h5 class="title">Contatos</h5>
                        <p>
                            <strong>Telefone: </strong> +55(31)994178583
                            <br>
                            <strong>E-mail: </strong> alissonfabiano7@gmail.com
                        </p>

                        <div class="btn-group white">
                            @if (config('settings.social_facebook') != null)
                                <a class="btn btn-facebook" title="Facebook" target="_blank" href="#"><i
                                        class="fab fa-facebook-f  fa-fw"></i>
                                </a>
                            @endif
                            @if (config('settings.social_instagram') != null)
                                <a class="btn btn-instagram" title="Instagram" target="_blank" href="#"><i
                                        class="fab fa-instagram  fa-fw"></i>
                                </a>
                            @endif
                            @if (config('settings.social_Youtube') != null)
                                <a class="btn btn-youtube" title="Youtube" target="_blank" href="#"><i
                                        class="fab fa-youtube  fa-fw"></i>
                                </a>
                            @endif
                            @if (config('settings.social_twitter') != null)
                                <a class="btn btn-twitter" title="Twitter" target="_blank" href="#"><i
                                        class="fab fa-twitter  fa-fw"></i>
                                </a>
                            @endif
                        </div>
                    </article>
                </aside>
            </div>
            <!-- row.// -->
            <br>
        </section>
        <section class="footer-bottom row border-top-white">
            <div class="col-sm-6">
                <p class="text-white-50"> Feito por Alisson Fabiano</p>
            </div>
            <div class="col-sm-6">
                <p class="text-md-right text-white-50">
                    Copyright &copy
                    <br>
                    <a href="http://bootstrap-ecommerce.com" class="text-white-50">Bootstrap-ecommerce UI kit</a>
                </p>
            </div>
        </section>
        <!-- //footer-top -->
    </div>
    <!-- //container -->
</footer>
