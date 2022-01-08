<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ config('app.name') }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <style>
        /* already defined in bootstrap4 */
        .text-xs-center {
            text-align: center;
        }

        .g-recaptcha {
            display: inline-block;
        }

    </style>
    <!-- Favicons -->
    <link href="{{ url('/img/favicon.png') }}" rel="icon">
    <link href="{{ url('/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->

    <link href="{{ url('/css/fontawesome.min.css') }}" rel="stylesheet">
    <link href="{{ url('/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ url('/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ url('/vendor/venobox/venobox.css') }}" rel="stylesheet">
    <link href="{{ url('/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ url('/vendor/aos/aos.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ url('/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: iPortfolio - v1.5.0
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Mobile nav toggle button ======= -->
    <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

    <!-- ======= Header ======= -->
    <header id="header">
        <div class="d-flex flex-column">

            <div class="profile">
                <img class="img-fluid" src="{{ url('/img/profile-img.jpg') }}" alt="">
                @php
                    
                @endphp
                <h1 class="text-light"><a href="index.html">{{ $data['sobreMim']->nome }}</a></h1>
                <div class="social-links mt-3 text-center">
                    <a href="http://fb.com/flaviomartil" target="_blank" class="facebook"><i
                            class="bx bxl-facebook"></i></a>
                    <a href="https://www.instagram.com/flaviowmartil/" target="_blank" class="instagram"><i
                            class="bx bxl-instagram"></i></a>
                    <a href="https://join.skype.com/invite/BpMXWSv29aeK" target="_blank" class="google-plus"><i
                            class="bx bxl-skype"></i></a>
                    <a href="https://www.linkedin.com/in/flavio-wormstall-martil-384aa2175/" target="_blank"
                        class="linkedin"><i class="bx bxl-linkedin"></i></a>
                </div>
            </div>

            <nav class="nav-menu">
                <ul>

                    <li class="active"><a href="#" class="back-to-tops"><i class="bx bx-home"></i>
                            <span>Inicio</span></a></li>
                    <li><a href="#about"><i class="bx bx-user"></i> <span>Sobre mim</span></a></li>
                    <li><a href="#resume"><i class="bx bx-file-blank"></i> <span>Resumo</span></a></li>
                    <li><a href="#portfolio"><i class="bx bx-book-content"></i> Portfolio</a></li>
                    <li><a href="#contact"><i class="bx bx-envelope"></i> Contato</a></li>

                </ul>
            </nav><!-- .nav-menu -->
            <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
        <div class="hero-container" data-aos="fade-in">

            <h1>{{ $data['sobreMim']->nome }}</h1>
            <p>Eu sou programador <span class="typed" data-typed-items=" PHP, Laravel, C#"></span></p>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="section-title">
                    <h2>Sobre mim</h2>
                    <p>Seja bem vindo ao meu site, quer saber mais sobre mim? Confira abaixo:</p>
                </div>

                <div class="row">
                    <div class="col-lg-4" data-aos="fade-right">
                        <img class="img-fluid" src="{{ url('/img/profile-img.jpg') }}" alt="">
                    </div>
                    <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
                        <h3>Desenvolvedor web</h3>

                        <div class="row">
                            <div class="col-lg-6">
                                <ul>



                                    <li><i class="icofont-rounded-right"></i> <strong>Aniversário:</strong>
                                        {{ $data['sobreMim']->aniversario }}</li>

                                    <li><i class="icofont-rounded-right"></i> <strong>Website:</strong>
                                        {{ $data['sobreMim']->website }}</li>
                                    <li><i class="icofont-rounded-right"></i> <strong>Telefone:</strong>
                                        {{ $data['sobreMim']->telefone }}</li>
                                    <li><i class="icofont-rounded-right"></i> <strong>Cidade:</strong>
                                        {{ $data['sobreMim']->cidade_atual }}, Brasil</li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul>
                                    <li><i class="icofont-rounded-right"></i> <strong>Idade:</strong>
                                        {{ $data['sobreMim']->idade }}</li>
                                    <li><i class="icofont-rounded-right"></i> <strong>E-mail:</strong>
                                        {{ $data['sobreMim']->email }}</li>
                                    <li><i class="icofont-rounded-right"></i> <strong>Freelance:</strong>
                                        {{ $data['sobreMim']->freelance_status }}</li>
                                </ul>
                            </div>
                        </div>
                        <p>
                        <ul>
                            <li><i class="icofont-rounded-right"></i> <strong>Competências comportamentais: </strong>
                                </p>
                                @foreach ($data['competencias'] as $competencias)
                            <li><i class="icofont-rounded-right"></i>{{ $competencias->detalhes }}
                            </li>
                            @endforeach
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->



        <!-- ======= Skills Section ======= -->
        <section id="skills" class="skills section-bg">
            <div class="container">

                <div class="section-title">
                    <h2 class="mb-3">Habiilidades</h2>
                    <p>Linguagens de Programação &amp; Ferramentas</p>
                </div>
                <ul class="list-inline dev-icons">
                    <li class="list-inline-item" title="HTML5">
                        <i class="fab fa-html5 fa-3x"></i>
                    </li>
                    <li class="list-inline-item" title="CSS3">
                        <i class="fab fa-css3-alt fa-3x"></i>
                    </li>
                    <li class="list-inline-item" title="JAVASCRIPT">
                        <i class="fab fa-js-square fa-3x"></i>
                    </li>
                    <li class="list-inline-item" title="WORDPRESS">
                        <i class="fab fa-wordpress fa-3x"></i>
                    </li>
                    <li class="list-inline-item" title="PHP">
                        <i class="fab fa-php fa-3x"></i>
                    </li>
                    <li class="list-inline-item" title="LARAVEL">
                        <i class="fab fa-laravel fa-3x"></i>
                    </li>
                    <li class="list-inline-item" title="LINUX">
                        <i class="fab fa-linux fa-3x"></i>
                    </li>
                    <li class="list-inline-item" title="AMAZON AWS">
                        <i class="fab fa-aws fa-3x"></i>
                    </li>
                </ul>

                <div class="subheading mb-3">Fluxo de trabalho</div>
                <ul class="fa-ul mb-0">

                    <li>
                        <i class="fa-li fa fa-check"></i>
                        Teste em Navegadores &amp; Depuração
                    </li>
                    <li>
                        <i class="fa-li fa fa-check"></i>
                        Equipes Multifuncionais
                    </li>
                    <li>
                        <i class="fa-li fa fa-check"></i>
                        Desenvolvimento Ágil com Scrum/ITIL
                    </li>
                </ul>
            </div>

        </section><!-- End Skills Section -->

        <!-- ======= Resume Section ======= -->
        <section id="resume" class="resume">
            <div class="container">

                <div class="section-title">
                    <h2>Resumo</h2>
                    <p>{{ $data['sobreMim']->resumo }}</p>
                </div>

                <div class="row">
                    <div class="col-lg-6" data-aos="fade-up">
                        <h3 class="resume-title">Sumário</h3>


                        <h3 class="resume-title">Educação</h3>
                        @foreach ($data['educacao'] as $educacao)
                            <div class="resume-item">
                                <h4>{{ $educacao->tipo }}</h4>
                                <h5>{{ $educacao->inicio }} - {{ $educacao->fim }}</h5>
                                <p><em>{{ $educacao->escola }}, {{ $educacao->cidade }},
                                        {{ $educacao->estado }}</em>
                                </p>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <h3 class="resume-title">Experiência profissional</h3>
                        @foreach ($data['empresas'] as $empresa)
                            <h3>{{ $empresa }}</h3>
                        @endforeach
                        <div class="resume-item">
                            <h4>Auxiliar de Ti | Quinta Valentina </h4>
                            <h5>2020 - Atualmente</h5>
                            <p><em>Distrito Industrial, São José Do Rio Preto </em></p>
                            <ul>
                                <li>Desenvolvimento e manutenção de sistemas em Php/Laravel, C#
                                    (Intranet,CRM,E-commerce)</li>
                                <li>SHOPIFY: conhecimento em desenvolvimento de ferramentas e suporte aos
                                    usuários </li>
                                <li>VTEX: conhecimento em desenvolvimento de ferramentas e suporte aos usuários
                                </li>
                                <li>ERP Protheus: experiência com rotinas, como de importação de clientes e
                                    pedidos,
                                    gestão de
                                    estoques, apoio ao faturamento e inserção de dados via API</li>


                            </ul>
                        </div>
                        <div class="resume-item">
                            <h4>Vendedor de Telemarketing e Auxiliar de TI</h4>
                            <h5>2018 - 2020</h5>
                            <p><em>Vila Angélica, São José Do Rio Preto </em></p>
                            <ul>
                                <li>Vendas por telefone</li>
                                <li>Desenvolvimento de sistema para captação de clientes via SINTEGRA</li>
                                <li>Construção de ferramenta para cobrança via whatsapp</li>
                                <li>Manutenção de hardware, manutenção de redes, suporte aos usuários</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Resume Section -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio section-bg">
            <div class="container">

                <div class="section-title">
                    <h2>Portfolio</h2>
                    <p>Aqui estão presentes trabalhos feitos por mim, até o momento</p>
                </div>
                <div class="row" data-aos="fade-up">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">Todos</li>
                            @foreach ($data['categorias'] as $categoria)
                                <li data-filter=".filter-{{ $categoria }}">
                                    {{ $categoria }}</li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">
                    @foreach ($data['projetos'] as $projeto)

                        <div class="col-lg-4 col-md-6 portfolio-item filter-{{ $projeto->nome_categoria }}">
                            <div class="portfolio-wrap">
                                <h4>{{ $projeto->nome }}</h4>
                                <img src="{{ url($projeto->imagem) }}" class="img-fluid" alt="">
                                <div class="portfolio-links">
                                    <a href="{{ url($projeto->imagem) }}" data-gall="portfolioGallery"
                                        class="venobox" title="{{ $projeto->descricao }}"><i
                                            class="bx bx-plus"></i></a>
                                    <a href="{{ $projeto->link }}" title="Mais detalhes"><i
                                            class="bx bx-link"></i></a>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </section><!-- End Portfolio Section -->





        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="section-title">
                    <h2>Contato</h2>
                    <p>Aqui você consegue me mandar um e-mail diretamente para mim, a respeito de freelance, vagas,
                        fique a vontade</p>
                </div>

                <div class="row" data-aos="fade-in">

                    <div class="col-lg-5 d-flex align-items-stretch">
                        <div class="info">
                            <div class="address">
                                <i class="icofont-google-map"></i>
                                <h4>Endereço:</h4>
                                <p>{{ $data['sobreMim']->endereco }}, {{ $data['sobreMim']->cidade_atual }}, SP
                                    {{ $data['sobreMim']->cep }}</p>
                            </div>

                            <div class="email">
                                <a href="mailto:{{ $data['sobreMim']->email_profissional }}" class="icon-block">
                                    <i class="icofont-envelope"></i>
                                </a>
                                <h4>Email profissional:</h4>
                                <a href="mailto:{{ $data['sobreMim']->email_profissional }}"
                                    style="text-align: center;margin-left: 15.9px;margin-top: 18.5px;  text-decoration: none;"
                                    class="icon-block">
                                    {{ $data['sobreMim']->email_profissional }}
                                </a>
                            </div>

                            <div class="phone">
                                <a href="tel:{{ $data['sobreMim']->telefone }}" class="icon-block">
                                    <i class="icofont-phone"></i>
                                </a>
                                <h4>Ligar:</h4>
                                <a href="tel:{{ $data['sobreMim']->telefone }}"
                                    style="text-align: center;margin-left: 14.5px;margin-top: 18.5px;  text-decoration: none;"
                                    class="icon-block">
                                    {{ $data['sobreMim']->telefone }}
                                </a>

                            </div>

                        </div>

                    </div>

                    <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                        <form action="/sendEmail" method="post" role="form" class="php-email-form">
                            {{ csrf_field() }}
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">Seu nome</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        data-rule="minlen:4" data-msg="Por favor digite pelo menos 4 palavras" />
                                    <div class="validate"></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name">Seu e-mail</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        data-rule="email" data-msg="Por favor insira um e-mail valido" />
                                    <div class="validate"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name">Assunto</label>
                                <input type="text" class="form-control" name="subject" id="subject"
                                    data-rule="minlen:4" data-msg="Por favor insira um assunto" />
                                <div class="validate"></div>
                            </div>
                            <div class="form-group">
                                <label for="name">Mensagem</label>
                                <textarea class="form-control" name="message" rows="10" data-rule="required"
                                    data-msg="Por favor escreva para mim"></textarea>
                                <div class="validate"></div>
                            </div>
                            <div class="mb-3">
                                <div class="loading">Carregando</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Sua mensagem foi enviada, obrigado</div>
                            </div>
                            <div class="text-xs-center">
                                {!! Recaptcha::render() !!}
                            </div>
                            <div class="text-center">
                                <button type="submit">Enviar Mensagem</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <div class="copyright">

            </div>

        </div>
    </footer><!-- End  Footer -->

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ url('/vendor/jquery/jquery.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".back-to-tops").click(function() {
                $("html, body").animate({
                    scrollTop: 0
                }, 800);
            });
        });
    </script>
    <script src="{{ url('/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
    <script src="{{ url('/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ url('/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
    <script src="{{ url('/vendor/counterup/counterup.min.js') }}"></script>
    <script src="{{ url('/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ url('/vendor/venobox/venobox.min.js') }}"></script>
    <script src="{{ url('/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ url('/vendor/typed.js/typed.min.js') }}"></script>
    <script src="{{ url('/vendor/aos/aos.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ url('/js/main.js') }}"></script>

</body>

</html>
