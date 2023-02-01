<div id="saiba_mais" class="beautypress-video-section beautypress-bg parallax-bg" data-parallax="scroll"
     data-image-src="<?= PASTASITE; ?>img/welcome-v3-img.jpg">
    <div class="container">
        <div class="beautypress-video-section-content">
            <p>Em poucos minutos você já terá uma agenda bem organizada e detalhada.</p>
            <h3>Veja como tudo é simples é rápido.</h3>
            <a href="<?= PASTAUPLOADS; ?>Videos/Escola-de-Apostolos.mp4" data-co-botao="13"
               class="beautypress-video-popup menu_click beautypress-video-popup-btn bg-color-purple">
                <i class="fa fa-play"></i>
            </a>
            <p>Em poucos minutos você já terá uma agenda bem organizada e detalhada.</p>
        </div><!-- .beautypress-video-section-content END -->
    </div>
    <div class="beautypress-black-overlay"></div>
</div><!-- .beautypress-video-section END -->


<!-- Pricing table -->
<section id="planos_sistema"
         class="beautypress-pricing-table-section padding-g beautypress-padding-bottom  beautypress-bg">
    <div class="container">
        <div class="row">
            <?php
            $foto = 1;
            $cores = [
                'primario',
                'red',
                'pink',
                'green',
                'purple',
                'black-gradient'
            ];
            $result = array_reverse($result);
            /** @var PlanoEntidade $plano */
            foreach ($result as $plano) {
                if ($plano->getCoPlano() > 1) {
                    ?>
                    <div class="col-md-12 col-sm-12 col-lg-4 col-xl-4">
                        <div class="beautypress-single-pricing-table">
                            <div class="beautypress-pricing-header beautypress-<?= $cores[$foto - 1]; ?>-overlay">
                                <?php
                                echo '<img src="' . TIMTHUMB . '?src=' .
                                    PASTASITE . 'img/pricing-' . $foto . '.jpg&w=370&h=274" 
                                alt="' . $plano->getNoPlano() . '" title="' . $plano->getNoPlano() . '" />';
                                ?>
                                <div class="beautypress-pricing-header-content">
                                    <div class="beautypress-pricing-title">
                                        <h2><?= $plano->getNoPlano(); ?></h2>
                                    </div>
                                    <div class="beautypress-pricing-price">
                                        <h4>Total: <?= Valida::FormataMoeda(
                                                $plano->getCoUltimoPlanoAssinante()->getNuValor()); ?></h4>
                                        <h5><span>R$</span><?php
                                            $preço = explode(',', Valida::FormataMoeda(
                                                $plano->getCoUltimoPlanoAssinante()->getNuValor() /
                                                $plano->getNuMesAtivo()
                                            ));
                                            echo $preço[0];
                                            echo '<span>,' . $preço[1] . '/Mês</span>';
                                            ?>
                                        </h5>
                                    </div>
                                </div>
                            </div><!-- .beautypress-pricing-header END -->
                            <div class="beautypress-pricing-footer">
                                <ul class="beautypress-both-side-list">
                                    <li>Sem Taxa de Adesão<span><i class="fa fa-check"></i></span></li>
                                    <li>Meses de Assinatura<span><?= $plano->getNuMesAtivo(); ?></span></li>
                                    <li>Módulo Agendamento<span><i class="fa fa-check"></i></span></li>
                                    <li>Estatísticas da Agenda<span><i class="fa fa-check"></i></span></li>
                                    <li>Relatórios<span><i class="fa fa-check"></i></span></li>
                                    <li>Suporte<span><i class="fa fa-check"></i></span></li>
                                    <li>Mentoria Ao Vivo<span><i class="fa fa-check"></i></span></li>
                                    <?php if ($foto > 1) { ?>
                                        <li>E-book Gestão<span><i class="fa fa-check"></i></span></li>
                                    <?php } else { ?>
                                        <li>E-book Gestão<span><i class="xsicon icon-cancel"></i></span></li>
                                    <?php } ?>
                                    <?php if ($foto > 2) { ?>
                                        <li>Mentoria Individual<span><i class="fa fa-check"></i></span></li>
                                    <?php } else { ?>
                                        <li>Mentoria Individual<span><i class="xsicon icon-cancel"></i></span></li>
                                    <?php } ?>
                                </ul>
                                <?php
                                $coBotao = null;
                                if ($plano->getCoPlano() == 2) {
                                    $coBotao = 9;
                                } elseif ($plano->getCoPlano() == 4) {
                                    $coBotao = 10;
                                } elseif ($plano->getCoPlano() == 5) {
                                    $coBotao = 11;
                                }
                                ?>
                                <div class="beautypress-btn-wraper experimentar_gratis">
                                    <a href="#" data-class="compra" data-plano="<?= $plano->getCoPlano(); ?>"
                                       data-co-botao="<?= $coBotao; ?>"
                                       class="menu_click xs-btn round-btn box-shadow-btn bg-color-<?= $cores[$foto - 1]; ?>">
                                        Adquirir Plano<span></span></a>
                                </div>
                            </div><!-- .beautypress-pricing-footer END -->
                        </div><!-- .beautypress-single-pricing-table END -->
                    </div>
                    <?php $foto++;
                }
            } ?>
        </div>
    </div>
    <dIndeiv class="beautypress-black-overlay"></dIndeiv>
</section><!-- .beautypress-pricing-table-section END -->
<!-- Pricing table -->


<section class="beautypress-call-to-action-section beautypress-bg parallax-bg padding-xg" data-parallax="scroll"
         data-image-src="<?= PASTASITE; ?>img/gallery-V4-5.jpg">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-4 col-xl-4">
                <div class="beautypress-single-square-service-content beautypress-version-2">
                    <i class="xsicon icon-essential-oil-2"></i>
                    <h2>Mais Tempo</h2>
                    <p>Com uma agenda organizada e com menos stress sobrará mais tempo para a família, viagens, cursos
                        profissionalizantes e atividades extras.</p>
                    <div class="beautypress-overlay-with-img img-1"></div>
                </div><!-- .beautypress-single-square-service-content END -->
            </div>
            <div class="col-sm-12 col-lg-4 col-xl-4">
                <div class="beautypress-single-square-service-content beautypress-version-2">
                    <i class="xsicon icon-cosmetics"></i>
                    <h2>Mais Faturamento</h2>
                    <p>Com organização da agenda, possibilita atender mais clientes, com maior qualidade aumentando,
                        assim, seu faturamento
                        para obter uma maior liberdade financeira.</p>
                    <div class="beautypress-overlay-with-img img-2"></div>
                </div><!-- .beautypress-single-square-service-content END -->
            </div>
            <div class="col-sm-12 col-lg-4 col-xl-4">
                <div class="beautypress-single-square-service-content beautypress-version-2">
                    <i class="xsicon icon-relax"></i>
                    <h2>Reconhecimento</h2>
                    <p>Com mais tempo para focar no atendimento do cliente, conseguira fidelizar mais clientes obtendo o
                        reconhecimento profissional tão sonhado.</p>
                    <div class="beautypress-overlay-with-img img-3"></div>
                </div><!-- .beautypress-single-square-service-content END -->
            </div>
        </div>
    </div>
</section>

<section id="duvidas" class="beautypress-faq-section padding-m">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xl-12">
                <div class="beautypress-simple-title mb-30">
                    <h3>Dúvidas Frequentes</h3>
                </div>
            </div>
            <div class="col-md-12 col-xl-6">
                <div class="beautypress-accordion beautypress-version-1">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default active">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion" aria-expanded="true"
                                   href="#collapse1">
                                    Por que o Sistema da Beleza é diferente de tudo?
                                </a>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    Porque com o SisBela você vai adquirir um sistema que vai automatizar todo o seu
                                    negócio, você também poderá fazer parte nos auxiliando com sugestões de melhorias e
                                    ferramentas para o sistema e também ganhará mentorias, <em>X-Bela</em>
                                    <a data-class="bonus" class="menu_click"
                                       style="font-weight: bolder; cursor: pointer;">interativas ao vivo pelo zoom</a>
                                    para te auxiliar na gestão do seu empreendimento.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                    Quais são os benefícios?
                                </a>
                            </div>
                            <div id="collapse2" class="panel-collapse collapse">
                                <div class="panel-body">
                                    Você nunca mais irá passar pelos conflitos de agenda, tendo mais tranquilidade para
                                    gerenciar seu tempo, cuidando do seu negócio de onde você estiver e possibilitando o
                                    investimento na sua profissionalização tornando-se assim um profissional cada vez
                                    mais reconhecido no mercado.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                                    Como que sei que o SisBela vai realmente me ajudar?
                                </a>
                            </div>
                            <div id="collapse3" class="panel-collapse collapse">
                                <div class="panel-body">
                                    O SisBela é um sistema de Gestão de Agendamento, ajudando no planejamento do
                                    crescimento do seu negócio.
                                    Já a falta de planejamento é uma das maiores causas que levam um negócio ao
                                    fechamento. Sendo que 46,2% dos negócios fecham antes de completarem 4 Anos, Por
                                    outro lado uma boa gestão leva ao crescimento, sendo que de 9 a cada
                                    10 negócios de sucesso desejam expandir.<br><br>
                                    <b>Fonte Sebrae</b>. Mais Informações.
                                    <a href="https://www.sebrae.com.br/Sebrae/Portal%20Sebrae/UFs/SP/Anexos/causa_mortis_2014.pdf"
                                       title="Dados de Pesquisa feita pelo Sebrae" target="_blank">Dados de Pesquisa</a>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                                    Por que minha empresa não evolui?
                                </a>
                            </div>
                            <div id="collapse4" class="panel-collapse collapse">
                                <div class="panel-body">
                                    A falta de gestão é o maior vilão do empreendedor no cenário atual, seja ela
                                    financeira, organizacional, processual e de pessoas. Uma boa gestão é essencial para
                                    a saúde e prosperidade do seu negócio. A mentoria <em>X-Bela</em> vai te auxiliar na
                                    formação
                                    e execução desses processos fundamentais para crescermos juntos e conquistar metas
                                    inacreditáveis!
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                                    Qual é o verdadeiro problema?
                                </a>
                            </div>
                            <div id="collapse5" class="panel-collapse collapse">
                                <div class="panel-body">
                                    Talvez você pense que seu problema está na desordem da sua agenda, mas o problema
                                    está na falta de gerenciamento desses agendamentos. Com o SisBela podemos solucionar
                                    todas as suas dificuldades com um sistema que gerenciará seus colaboradores,
                                    agendamentos, e serviços de uma maneira simples e prática. E assim, venceremos
                                    juntos a desordem que nos impede de crescer e se profissionalizar cada vez mais.
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- .beautypress-accordion .beautypress-version-1 END -->
            </div>
            <div class="col-md-12 col-xl-6">
                <div class="beautypress-accordion beautypress-version-1">
                    <div class="panel-group" id="accordion2">
                        <div class="panel panel-default active">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion2" aria-expanded="true"
                                   href="#collapse6">
                                    Por que deve começar agora?
                                </a>
                            </div>
                            <div id="collapse6" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    As vagas para as turmas de Mentoria X-Bela e assinaturas do sistema são limitadas,
                                    pois precisamos dar uma grande atenção para cada um de nossos clientes, para que
                                    eles
                                    obtenham realmente os resultados que oferecemos. Após o lançamento não teremos
                                    vagas disponíveis para outras turmas.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion2" href="#collapse7">
                                    Por que eu devo confiar em você?
                                </a>
                            </div>
                            <div id="collapse7" class="panel-collapse collapse">
                                <div class="panel-body">
                                    Nos do Sistema da Beleza, temos competências nas áreas de programação (Sistema e
                                    App) e na de gestão de negócios, e vismos a necessidade de sairmos da nossa zona de
                                    corforto para oferecermos os nossos conhecimentos em prol e benefícios de outras
                                    pessoas. Já passamos por situação semelhante e gostarias de ajudar os empreendedores
                                    a crescerem e elevar o mercado nacional.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion2" href="#collapse8">
                                    Como Funciona isso tudo?
                                </a>
                            </div>
                            <div id="collapse8" class="panel-collapse collapse">
                                <div class="panel-body">
                                    O acesso ao SisBela é imediato e de fácil marcação dos agendamento e o sistema faz
                                    todo o restante para você, a falta de organização da agenda, estara com os dias
                                    contados, e na nossa area de relatórios você acompanharar todo os andamentos dos
                                    agendamento. Já para a consultoria e so agaurdar o aviso de inicio das aulas e
                                    participar.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion2" href="#collapse9">
                                    Como e quando posso começar?
                                </a>
                            </div>
                            <div id="collapse9" class="panel-collapse collapse">
                                <div class="panel-body">
                                    Basta escolher o plano que melhor atenda suas necessidades! Ao realizar o pagamento
                                    você terá acesso ao SisBela de imediato em caso de cartão de crédito. No caso de
                                    pagamento por boleto bancário é necessário aguardar a compensação dele. Para as
                                    mentorias, você será direcionado para a próxima turma em aberto e será avisado a
                                    data de início pelo WhatsApp e via e-mail.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion2" href="#collapse10">
                                    O que eu tenho a Perder?
                                </a>
                            </div>
                            <div id="collapse10" class="panel-collapse collapse">
                                <div class="panel-body">
                                    Caso não realize a assinatura do nosso Sistema da Beleza, nada ira mudar na sua
                                    vida, as chances as vezes passam só uma vez, e deixamos sempre para depois, nossas
                                    vagas são limitadas por conta da mentoria, onde prestamos um acompanhamento de cada
                                    cliente. assim a oportunidade é agora, caso deixe para depois, poderá não ter
                                    mais vagas.
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- .beautypress-accordion .beautypress-version-1 END -->
            </div>
        </div>
        <div class="col-md-12 col-xl-12 align-center padding-p">
            <div class="beautypress-btn-wraper">
                <a href="#" data-class="compra" data-co-botao="12"
                   class="menu_click xs-btn round-btn box-shadow-btn bg-color-cyan">Quero
                    Organizar minha agenda agora
                    <span
                            style="top: 119.297px; left: 17.4688px;"></span></a>
            </div>
        </div>
    </div>
</section>



<div id="bonus" class="beautypress-our-service-section padding-m">
    <div class="container">
        <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12 align-center padding-p">
            <h2>Bônus por planos</h2>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-4 col-xl-4">
                <div class="beautypress-single-our-sevice beautypress-version-2 bg-color-white">
                    <div class="beautypress-service-header img-full">
                        <img src="<?= PASTASITE; ?>img/mentoria_ao_vivo.jpg" alt="">
                    </div><!-- .beautypress-service-header img-full END -->
                    <div class="beautypress-service-footer">
                        <a href="#" class="beautypress-service-title">Mentoria Ao Vivo</a>
                        <p>O nosso diferencial é que todas as Mentorias são AO VIVO on-line. Estaremos transmitindo
                            conteúdo, conversando, ouvindo sugestões e tirando dúvidas na mesma HORA!</p>
                        <div class="col-md-12 text-center padding-p">
                            <a href="#" data-class="compra" data-plano="2" data-co-botao="14"
                               class="menu_click xs-btn bg-color-pink round-btn box-shadow-btn">
                                Quero esse bônus
                                <span style="top: -8.10938px; left: 105.5px;"></span>
                            </a>
                        </div>
                    </div><!-- .beautypress-service-footer END -->
                </div><!-- .beautypress-single-our-sevice END -->
            </div>
            <div class="col-md-12 col-sm-12 col-lg-4 col-xl-4">
                <div class="beautypress-single-our-sevice beautypress-version-2 bg-color-white">
                    <div class="beautypress-service-header img-full">
                        <img src="<?= PASTASITE; ?>img/ebook_gestao.jpg" alt="">
                    </div><!-- .beautypress-service-header img-full END -->
                    <div class="beautypress-service-footer">
                        <a href="#" class="beautypress-service-title underline-title">E-book Gestão</a>
                        <p>Nosso E-Book te ensinará, com praticidade, objetividade e rapidez, os 10 Passos para você ter
                            a autonomia e conhecimento para
                            gerenciar seu negócio com propriedade.</p>
                        <div class="col-md-12 text-center padding-p">
                            <a href="#" data-plano="4" data-class="compra" data-co-botao="15"
                               class="menu_click xs-btn bg-color-black-gradient round-btn box-shadow-btn">
                                Quero esse bônus
                                <span style="top: -8.10938px; left: 105.5px;"></span>
                            </a>
                        </div>
                    </div><!-- .beautypress-service-footer END -->
                </div><!-- .beautypress-single-our-sevice END -->
            </div>
            <div class="col-md-12 col-sm-12 col-lg-4 col-xl-4">
                <div class="beautypress-single-our-sevice beautypress-version-2 bg-color-white">
                    <div class="beautypress-service-header img-full">
                        <img src="<?= PASTASITE; ?>img/mentoria_individual.jpg" alt="">
                    </div><!-- .beautypress-service-header img-full END -->
                    <div class="beautypress-service-footer">
                        <a href="#" class="beautypress-service-title">Mentoria Individual</a>
                        <p>Uma Mentoria exclusiva e detalhada para identificarmos as falhas e impulsionarmos as
                            qualidades visando uma maior organização e maior lucratividade para seu negócio.</p>
                        <div class="col-md-12 text-center padding-p">
                            <a href="#" data-plano="5" data-class="compra" data-co-botao="16"
                               class="menu_click xs-btn bg-color-cyan round-btn box-shadow-btn">
                                Quero esse bônus
                                <span style="top: -8.10938px; left: 105.5px;"></span>
                            </a>
                        </div><!-- .beautypress-service-footer END -->
                    </div><!-- .beautypress-service-footer END -->
                </div><!-- .beautypress-single-our-sevice END -->
            </div>
        </div>
    </div>
</div>

<div class="beautypress-clients-section beautypress-about-section-v2">
    <div class="beautypress-clients-wraper no-slider beautypress-version-3 beautypress-bg"
         style="background-image: url(<?= PASTASITE; ?>img/welcome-bg-v4-2.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-6 col-xl-6">
                    <div class="beautypress-about-us-img">
                        <img src="<?= PASTASITE; ?>img/autor_sistema.png" alt="">
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                    <div class="beautypress-about-us-content">
                        <div class="beautypress-sub-heading beautypress-version-2">
                            <h2 data-title="About Us">Sobre o Desenvolvedor do Sistema</h2>
                            <h3>Leonardo Bessa</h3>
                        </div><!-- .beautypress-sub-heading END -->
                        <p>Formado em Tecnologia da Informação e Pós Graduado em Desenvolvimento de Sistemas para Web,
                            Trabalha como Desenvolvedor de Sistemas desde 2010, ja trabalhou em mais de 30 projetos de
                            Software em orgões públicos como: MEC, FNDE e Ibama. com mais de 50 Cursos na area de
                            Desenvolvimento de Sistemas.</p>
                    </div>
                </div>
            </div>
        </div>
        <!--        <div class="beautypress-black-overlay"></div>-->
    </div><!-- .beautypress-clients-wraper .no-slider .beautypress-version-3 END -->
</div>

<section class="beautypress-booking-section seguranca-checkout">
    <div class="container">
        <div class="row padding-m">
            <div class="col-sm-12 col-lg-4 col-xl-4 margin-p">
                <div class="beautypress-single-square-service-content beautypress-version-2">
                    <img src="<?= PASTASITE; ?>img/1.jpg" alt="">
                </div><!-- .beautypress-single-square-service-content END -->
            </div>
            <div class="col-sm-12 col-lg-4 col-xl-4 margin-p">
                <div class="beautypress-single-square-service-content beautypress-version-2">
                    <img src="<?= PASTASITE; ?>img/2.jpg" alt="">
                </div><!-- .beautypress-single-square-service-content END -->
            </div>
            <div class="col-sm-12 col-lg-4 col-xl-4 margin-p">
                <div class="beautypress-single-square-service-content beautypress-version-2">
                    <img src="<?= PASTASITE; ?>img/3.jpg" alt="">
                </div><!-- .beautypress-single-square-service-content END -->
            </div>
            <div class="col-sm-12 col-lg-4 col-xl-4 margin-p">
                <div class="beautypress-single-square-service-content beautypress-version-2">
                    <img src="<?= PASTASITE; ?>img/4.jpg" alt="">
                </div><!-- .beautypress-single-square-service-content END -->
            </div>
            <div class="col-sm-12 col-lg-4 col-xl-4 margin-p">
                <div class="beautypress-single-square-service-content beautypress-version-2">
                    <img src="<?= PASTASITE; ?>img/5.jpg" alt="">
                </div><!-- .beautypress-single-square-service-content END -->
            </div>
            <div class="col-sm-12 col-lg-4 col-xl-4 margin-p">
                <div class="beautypress-single-square-service-content beautypress-version-2">
                    <img src="<?= PASTASITE; ?>img/6.jpg" alt="">
                </div><!-- .beautypress-single-square-service-content END -->
            </div>
        </div>
        <div class="row" id="compra">
            <div class="col-md-12 col-sm-12 col-lg-6 col-xl-6">
                <div class="beautypress-booking-text-wraper">
                    <div class="beautypress-booking-content-text beautypress-border beautypress-version-3">
                        <div class="beautypress-booking-text" style="padding-left: 35px;">
                            <h2>Adeus agenda de papel!</h2>
                            <h3>Papel nunca mais..</h3>

                            <p style="font-weight: bold;">
                                Nossa missão é eliminar os papeis da sua vida, automatizando e facilitando seu
                                agendamento, contato com os clientes e armazenando os atendimentos e registros. Vamos
                                ajudar você a ter uma agenda moderna e organizada.
                            </p>
                            <ul style="margin-top: 25px;">
                                <li>Agenda disponível...</li>
                                <li>24 Horas por dia</li>
                                <li>7 Dias da semana</li>
                                <li>De forma rápida e prática</li>
                            </ul>
                        </div><!-- .beautypress-booking-text END -->
                    </div><!-- .beautypress-booking-content-text END -->
                </div><!-- .beautypress-booking-text-wraper END -->
            </div>
            <div class="col-md-12 col-sm-12 col-lg-6 col-xl-6">
                <div class="beautypress-booking-form-wraper">
                    <form action="<?= PASTASITE; ?>Venda/Assinatura" method="POST" id="VendaAssinatura"
                          role="form" enctype="multipart/form-data" name="VendaAssinatura" class="formulario">
                        <div class="beautypress-service-and-date">
                            <h2>Ainda não é cliente? Faça seu cadastro.</h2>
                            <h5>Sou Cliente, acesse o sistema
                                <a href="<?= PASTAADMIN; ?>Index/PrimeiroAcesso" title="Acesso ao Sitema SisBela"
                                   target="_blank">SisBela</a>.</h5>

                            <div class="input-group margin-p form-group <?= NO_FANTASIA; ?>_parent">
                                <input type="text" name="<?= NO_FANTASIA; ?>" class="form-control ob"
                                       id="<?= NO_FANTASIA; ?>" placeholder="Nome do Estabelecimento">
                                <div class="input-group-addon"><i class="fa fa-hospital-o"></i></div>
                                <span class="help-block" id="<?= NO_FANTASIA; ?>-info"></span>
                            </div>

                            <div class="input-group margin-p form-group <?= NO_PESSOA; ?>_parent">
                                <input type="text" name="<?= NO_PESSOA; ?>" class="form-control ob"
                                       id="<?= NO_PESSOA; ?>" placeholder="Nome Completo do Responsável">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <span class="help-block" id="<?= NO_PESSOA; ?>-info"></span>
                            </div>

                            <div class="input-group margin-p form-group <?= NU_TEL1; ?>_parent">
                                <input type="text" name="<?= NU_TEL1; ?>" class="form-control tel ob"
                                       id="<?= NU_TEL1; ?>" placeholder="Telefone (WhatsApp)....">
                                <div class="input-group-addon"><i class="fa fa-whatsapp"></i></div>
                                <span class="help-block" id="<?= NU_TEL1; ?>-info"></span>
                            </div>

                            <div class="input-group margin-p form-group <?= DS_EMAIL; ?>_parent">
                                <input type="text" name="<?= DS_EMAIL; ?>" class="form-control email ob"
                                       id="<?= DS_EMAIL; ?>" placeholder="Email ....">
                                <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                <span class="help-block" id="<?= DS_EMAIL; ?>-info"></span>
                            </div>

                            <?php
                            $planosAtivos = PlanoService::montaComboPlanosAtivos();
                            ?>
                            <div class="beautypress-select">
                                <div class="input-group form-group <?= CO_PLANO; ?>_parent">
                                    <select name="<?= CO_PLANO; ?>" id="<?= CO_PLANO; ?>"
                                            class="form-control ob">

                                        <?php
                                        foreach ($planosAtivos as $nuMeses => $plano) {
                                            echo '<option value="' . $nuMeses . '">' . $plano . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <span class="help-block" id="<?= CO_PLANO; ?>-info"></span>
                                </div>
                            </div>

                            <div class="beautypress-select">
                                <div class="input-group form-group <?= TP_PAGAMENTO; ?>_parent">
                                    <select name="<?= TP_PAGAMENTO; ?>" id="<?= TP_PAGAMENTO; ?>"
                                            class="form-control ob">
                                        <option value="">Forma de Pagamento</option>
                                        <option value="<?= TipoPagamentoEnum::CARTAO_CREDITO; ?>">
                                            <?= TipoPagamentoEnum::getDescricaoValor(TipoPagamentoEnum::CARTAO_CREDITO); ?>
                                        </option>
                                        <option value="<?= TipoPagamentoEnum::PIX; ?>">
                                            <?= TipoPagamentoEnum::getDescricaoValor(TipoPagamentoEnum::PIX); ?>
                                        </option>
                                        <option value="<?= TipoPagamentoEnum::BOLETO; ?>">
                                            <?= TipoPagamentoEnum::getDescricaoValor(TipoPagamentoEnum::BOLETO); ?>
                                        </option>
                                    </select>
                                    <span class="help-block" id="<?= TP_PAGAMENTO; ?>-info"></span>
                                </div>
                            </div>

                            <div class="input-group margin-p numCartao_parent">
                                <input type="text" name="numCartao"
                                       class="form-control cartao_credito credito"
                                       id="numCartao" placeholder="Número do Cartão">
                                <div class="input-group-addon"><i class="fa fa-credit-card-alt"></i></div>
                                <span class="help-block" id="numCartao-info"></span>
                            </div>

                            <div class="beautypress-spilit-container margin-p">
                                <div class="input-group validadeCartao_parent">
                                    <input type="text" name="validadeCartao"
                                           class="form-control validade_cartao credito"
                                           id="validadeCartao" placeholder="Validade do Cartão">
                                    <div class="input-group-addon"><i class="fa fa-calendar-check-o"></i></div>
                                    <span class="help-block" id="validadeCartao-info"></span>
                                </div>
                                <div class="input-group cvvCartao_parent">
                                    <input type="text" name="cvvCartao" class="form-control cvv credito"
                                           id="cvvCartao" placeholder="CVV do cartão">
                                    <div class="input-group-addon"><i class="fa fa-code"></i></div>
                                    <span class="help-block" id="cvvCartao-info"></span>
                                </div>
                            </div>

                            <div class="beautypress-select">
                                <div class="input-group">
                                    <select name="qntParcelas" id="qntParcelas"
                                            class="form-control credito">
                                        <option value="">Número de Parcelas</option>
                                    </select>
                                </div>
                            </div>

                            <div class="input-group margin-p">
                                <input type="text" name="creditCardHolderName"
                                       class="form-control nome credito"
                                       id="creditCardHolderName" placeholder="Nome no Cartão">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            </div>

                            <div class="beautypress-spilit-container">
                                <div class="input-group creditCardHolderCPF_parent">
                                    <input type="text" name="creditCardHolderCPF"
                                           class="form-control cpf credito"
                                           id="creditCardHolderCPF" placeholder="CPF do dono do Cartão">
                                    <div class="input-group-addon"><i class="fa fa-address-card"></i></div>
                                    <span class="help-block" id="creditCardHolderCPF-info"></span>
                                </div>
                                <div class="input-group creditCardHolderBirthDate_parent">
                                    <input type="text" name="creditCardHolderBirthDate"
                                           class="form-control data credito"
                                           a id="creditCardHolderBirthDate" placeholder="Nascimento do dono">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <span class="help-block" id="creditCardHolderBirthDate-info"></span>
                                </div>
                            </div>


                            <div class="input-group margin-p <?= NU_CEP; ?>_parent">
                                <input type="text" name="<?= NU_CEP; ?>" class="form-control cep credito"
                                       id="<?= NU_CEP; ?>" placeholder="CEP do dono do Cartão">
                                <div class="input-group-addon"><i class="fa fa-map"></i></div>
                                <span class="help-block" id="<?= NU_CEP; ?>-info"></span>
                            </div>

                            <div class="input-group margin-p">
                                <input type="text" name="<?= DS_ENDERECO; ?>" class="form-control credito"
                                       id="<?= DS_ENDERECO; ?>" placeholder="Endereço do dono do Cartão">
                                <div class="input-group-addon"><i class="fa fa-hospital-o"></i></div>
                            </div>

                            <div class="input-group margin-p">
                                <input type="text" name="<?= DS_COMPLEMENTO; ?>" class="form-control credito"
                                       id="<?= DS_COMPLEMENTO; ?>" placeholder="Complemento do dono do Cartão">
                                <div class="input-group-addon"><i class="fa fa-compass"></i></div>
                            </div>

                            <div class="input-group margin-p">
                                <input type="text" name="<?= DS_BAIRRO; ?>" class="form-control credito"
                                       id="<?= DS_BAIRRO; ?>" placeholder="Bairro do dono do Cartão">
                                <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                            </div>

                            <div class="input-group margin-p">
                                <input type="text" name="<?= NO_CIDADE; ?>" class="form-control credito"
                                       id="<?= NO_CIDADE; ?>" placeholder="Cidade do dono do Cartão">
                                <div class="input-group-addon"><i class="fa fa-map-signs"></i></div>
                            </div>

                            <div class="beautypress-select">
                                <div class="input-group">
                                    <select name="<?= SG_UF; ?>" required id="<?= SG_UF; ?>"
                                            class="form-control credito">
                                        <option value="">Estado do dono do Cartão</option>
                                        <?php
                                        $estados = EnderecoService::montaComboEstadosDescricao();
                                        foreach ($estados as $sg_uf => $estado) {
                                            echo '<option value="' . $sg_uf . '">' . $estado . '</option> ';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <input type="hidden" name="bandeiraCartao" id="bandeiraCartao"/>
                            <input type="hidden" name="hash" id="hash"/>
                            <input type="hidden" name="tokenCartao" id="tokenCartao"/>
                            <input type="hidden" name="installmentValue" id="installmentValue"/>

                            <div class="beautypress-btn-wraper margin-p" style="text-align: right; margin-right: -10px">
                                <button type="submit" style="cursor: pointer!important;"
                                        class="xs-btn round-btn box-shadow-btn bg-color-green">
                                    Quero Reservar meu lugar
                                    <span></span></button>

                                <img src="https://ccaug.com.br/library/images/loading.gif" class="img-load pull-right"
                                     alt="load" style="margin: 18px 0 0 10px; display: none;"/>
                            </div>
                        </div><!-- .beautypress-service-and-date END -->
                    </form><!-- #beautypress-booking-form END -->
                </div>
            </div>
        </div>
    </div>
</section>


<!-- SCRIPT PAGSEGURO -->
<script type="text/javascript"
        src="<?= JS_PAGSEGURO; ?>"></script>