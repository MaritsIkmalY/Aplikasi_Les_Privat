<!DOCTYPE html>
<html lang="en">

<head>
    <title>LesKuy</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite(['resources/css/style.css', 'resources/js/landing.js', 'resources/css/font-awesome.css'])
</head>

<body>
    {{-- <!-- preloader start -->
    <div class="preloader js-preloader">
        <img src="img/logo-leskuy.png" alt="preloader" />
    </div>
    <!-- preloader end --> --}}

    <!-- header start -->
    <header class="header js-header">
        <div class="container">
            <div class="header-main">
                <div class="logo">
                    <a href="#"><img src="/img/logo-leskuy.png" alt="logo" />leskuy</a>
                </div>
                <button type="button" class="nav-toggler js-nav-toggler">
                    <span></span>
                </button>
                <nav class="nav js-nav">
                    <ul>
                        <li style="--item: 0"><a href="{{ route('login') }}">Masuk</a></li>
                        <li style="--item: 1"><a href="{{ route('register') }}">Daftar</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- home section start -->
    <section class="home">
        <div class="container">
            <div class="row">
                <div class="home-text">
                    <h1>Daftar Leskuy yuk</h1>
                    <p>yuk daftar</p>
                    <div class="flex-row">
                        <a href="{{ route('login') }}" class="btn">Masuk</a>
                        <a href="{{ route('register') }}" class="text-primary font-bold">Daftar</a>
                    </div>
                </div>
                <div class="home-img">
                    <div class="fancy-br-box">
                        <img src="img/pakguru.png" alt="img" />
                        <div class="icon-box">
                            <img src="img/icon/graduate-m.png" alt="icon" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- home section end -->

    <!-- about section start -->
    <section class="about section-padding">
        <div class="container">
            <div class="section-title">
                <h2 class="title">about us</h2>
                <p class="sub-title">kenapa kamu harus daftar LesKuy</p>
            </div>
            <div class="row">
                <div class="about-img">
                    <div class="fancy-br-box">
                        <img src="img/tes.png" alt="img" />
                        <div class="icon-box">
                            <img src="img/icon/graduate-f.png" alt="img" />
                        </div>
                    </div>
                </div>
                <div class="about-text">
                    <p>
                      about
                    </p>
                    <h3>Fasilitas LesKuy</h3>
                    <ul>
                        <li><i class="fas fa-check"></i> Turu</li>
                        <li><i class="fas fa-check"></i> Turu maneh</li>
                        <li><i class="fas fa-check"></i> Mangan</li>
                        <li><i class="fas fa-check"></i> Mabar</li>
                        <li><i class="fas fa-check"></i> Ngudud gapapa, tapi izin ortu</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- about section end -->

    <!-- services section start -->
    <section class="services section-padding">
        <div class="container">
            <div class="section-title">
                <h2 class="title">services</h2>
                <p class="sub-title">Apa yang kami sediakan</p>
            </div>
            <div class="row">
                <!-- services item start -->
                <div class="services-item">
                    <div class="img-box">
                        <img src="img/LesKuy04.png" alt="" />
                    </div>
                    <div class="text">
                        <h3>Turu</h3>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ullam laboriosam ea voluptate
                            obcaecati.</p>
                    </div>
                </div>
                <!-- services item end -->
                <!-- services item start -->
                <div class="services-item">
                    <div class="img-box">
                        <img src="img/LesKuy04.png" alt="" />
                    </div>
                    <div class="text">
                        <h3>Turu</h3>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ullam laboriosam ea voluptate
                            obcaecati.</p>
                    </div>
                </div>
                <!-- services item end -->
                <!-- services item start -->
                <div class="services-item">
                    <div class="img-box">
                        <img src="img/LesKuy04.png" alt="" />
                    </div>
                    <div class="text">
                        <h3>Turu</h3>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ullam laboriosam ea voluptate
                            obcaecati.</p>
                    </div>
                </div>
                <!-- services item end -->
                <!-- services item start -->
                <div class="services-item">
                    <div class="img-box">
                        <img src="img/LesKuy04.png" alt="" />
                    </div>
                    <div class="text">
                        <h3>Turu</h3>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ullam laboriosam ea voluptate
                            obcaecati.</p>
                    </div>
                </div>
                <!-- services item end -->
            </div>
        </div>
    </section>
    <!-- services section end -->

    <!-- fun fact section start -->
    <section class="fun-fact">
        <div class="container">
            <div class="row">
                <!-- fun fact item start -->
                <div class="fun-fact-item">
                    <div class="box">
                        <h2>1000</h2>
                        <p>pengajar</p>
                    </div>
                </div>
                <!-- fun fact item end -->
                <!-- fun fact item start -->
                <div class="fun-fact-item">
                    <div class="box">
                        <h2>1000</h2>
                        <p>murid</p>
                    </div>
                </div>
                <!-- fun fact item end -->
                <!-- fun fact item start -->
                <div class="fun-fact-item">
                    <div class="box">
                        <h2>10</h2>
                        <p>penghargaan</p>
                    </div>
                </div>
                <!-- fun fact item end -->
                <!-- fun fact item start -->
                <div class="fun-fact-item">
                    <div class="box">
                        <h2>4.7</h2>
                        <p>rating</p>
                    </div>
                </div>
                <!-- fun fact item end -->
            </div>
        </div>
    </section>
    <!-- fun fact section end -->

    <!-- contact section start -->
    <section class="contact section-padding">
        <div class="container">
            <div class="row">
                <div class="contact-details">
                    <div class="section-title">
                        <p class="sub-title">contact us</p>
                    </div>
                    <div class="text-1">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Distinctio veniam
                        quod vero voluptatum ipsum aliquam tenetur obcaecati accusantium. Necessitatibus ratione amet
                        similique et reiciendis facilis.</div>
                    <div class="contact-info">
                        <div class="contact-info-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <p>Kos Gebang depan masjid, Surabaya</p>
                        </div>
                        <div class="contact-info-item">
                            <i class="fas fa-envelope"></i>
                            <p>leskuyofficial@gmail.com</p>
                        </div>
                        <div class="contact-info-item">
                            <i class="fas fa-phone"></i>
                            <p>+62-813-5703-0197</p>
                        </div>
                    </div>
                    <div class="social-links">
                        <a href="#" title="Facebook"><i class="fab fa-facebook"></i></a>
                        <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" title="Linkedin"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="contact-form">
                    <div class="icon-box">
                        <img src="img/icon/graduate-m.png" alt="icon" />
                    </div>
                    <div class="contact-box">
                        <form action="">
                            <div class="input-box">
                                <input type="text" placeholder="Name" class="input-control" />
                            </div>
                            <div class="input-box">
                                <input type="text" placeholder="Email" class="input-control" />
                            </div>
                            <div class="input-box">
                                <input type="text" placeholder="Subject" class="input-control" />
                            </div>
                            <div class="input-box">
                                <textarea placeholder="Message" class="input-control"></textarea>
                            </div>
                            <button type="submit" class="btn">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact section end -->

    <!-- footer start -->
    <footer class="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="footer-item">
                        <h3>about us</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea tempora repellendus ipsa aliquam
                            atque odio a nesciunt expedita beatae quaerat!</p>
                    </div>
                    <div class="footer-item">
                        <h3>follow us</h3>
                        <ul>
                            <li><a href="#">Facebook</a></li>
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">Linkedin</a></li>
                        </ul>
                    </div>
                    <div class="footer-item">
                        <h3>information</h3>
                        <ul>
                            <li><a href="#">privacy policy</a></li>
                            <li><a href="#">terms & condition</a></li>
                            <li><a href="#">gatahu</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <p>© leskuy, 2022.</p>
            </div>
        </div>
    </footer>
    <!-- footer end -->

    <!-- theme light dark switcher start -->
    <button type="button" class="switcher-btn js-switcher-btn">
        <i class="fas"></i>
    </button>
    <!-- theme light dark switcher end -->
</body>

</html>
