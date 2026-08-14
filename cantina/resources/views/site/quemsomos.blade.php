<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <link>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="{{ asset('imgs/sistema/pk_siga.png') }}" rel="shortcut icon" /></link>
        <style>
        </style>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <nav class="bg-gray-800 py-4">
            <div class="container mx-auto flex justify-between items-center">
                <div style="padding:10px;">
                    <!-- Logo ou título -->
                    <a href="{{ asset('/site/curriculum/eddie/construcao') }}" class="text-white text-md font-bold">
                        <center><img width='50px;' src="{{ asset('imgs/sistema/pk_siga_branco.png') }}"/>
                            {{ config('app.pkcia') }}
                        </center>
                    </a>
                </div>

                <div>
                    <!-- Links do menu -->
                    <ul class="flex space-x-4">
                        <li><a href="{{ asset('/site/curriculum/eddie/construcao') }}" class="text-white" style="padding-right:20px;">
                                <b class="font40 text-white"><strong>Serviços</strong></b>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    @section('content')

        <center>
        <div style="padding-top:3%;">
            <section class="borda1" style='width:70%; overflow-y: auto;'>

                <nav class="py-4" style="padding-right:12%;">
                    <a href="javascript:history.back()">
                        <button class="retorna bg-green-500 hover:bg-red-500 text-white font-bold py-2 px-4 rounded" >&times;</button>
                    </a>
                </nav>

                <img style="width:50px; padding-bottom:30px;" src="{{ asset('imgs/sistema/pk_siga.png') }}" id="pk"/></img>

                <div style="border:0.5px; solid #ccc;">
                    <div>
                        <h1 style='font-size:12px;'><b2 id="um" class="um toggle-button">TRIBUTÁRIO / PERÍCIA FORENSE</b1></h1>
                    </div>
                    <div style="padding-bottom:40px;">
                        <article id="content" data-target="content1" class="py-4" style="padding-right:12%; padding-left:12%;">
                            <div style="position: relative; overflow: hidden; padding-bottom: 20px;"> <a href="{{ asset('/site/curriculum/eddie') }}">
                                    <img width="13%" class="w-50 md:w-75 lg:w-100 borda3" style="border-radius:50%; float: left; margin-right: 20px; margin-bottom: 10px; object-fit: cover;"
                                    src="{{ asset('/imgs/sistema/ej/eddie.png') }}">
                                </a>
                                <p style="text-align: justify;">
                                    Combinando expertise em direito tributário e tecnologia da informação com especialidade na **Perícia Forense**, a atuação como <f-cor1><a href="{{ route('apoio') }}">Analista Desenvolvedor Técnico Jurídico</a></f-cor1>,
                                    oferecendo assessoria jurídica administrativa e judicial a pessoas físicas, jurídicas e órgãos governamentais.
                                </p>
                                <p style="text-align: justify;">
                                    A atuação abrange desde a análise de dados para **recuperação fiscal** até a aplicação da **Perícia Forense Digital** na investigação de **crimes cibernéticos**.
                                    Nesse contexto, o **Direito Tributário Penal** é uma área crucial, focada nos crimes contra a ordem tributária, como sonegação e fraude, visando a coibição de ilícitos fiscais e a garantia da justiça tributária.
                                </p>
                                <p style="text-align: justify;">
                                    Com a crescente incidência de fraudes e a importância da **proteção de dados (LGPD)**, o Computratum.Ius - PKCia reúne profissionalismo e qualificação para
                                    compartilhar informações e experiências nesse <f-cor1><a href="{{ asset('/site/curriculum/eddie') }}">cenário dinâmia</a></f-cor1>.
                                </p>
                                <div style="clear: both;"></div>
                            </div>
                        </article>
                    </div>

                    <div>
                        <h1 style='font-size:12px;'><b2 id="dois" class="um toggle-button">DIREITO-CONTENCIOSO</b2></h1>
                    </div>
                    <div style="padding-bottom:40px;">
                        <article id="content" data-target="content1" style="padding-right:12%; padding-left:12%;">
                            <div style="position: relative; overflow: hidden; padding-bottom: 20px;"> <a href="{{ asset('/site/curriculum/edsonbsilva') }}">
                                    <img width="13%" class="w-50 md:w-75 lg:w-100 borda3" style="border-radius:50%; float: left; margin-right: 20px; margin-bottom: 10px; object-fit: cover;"
                                    src="{{ asset('/imgs/sistema/ebs/edson.png') }}">
                                </a>
                                <p style="text-align: justify;">
                                    Advogado especializado em Direito Contencioso Penal, atua na defesa técnica de clientes em investigações criminais
                                    e ações penais, com foco na garantia dos direitos fundamentais e na aplicação rigorosa do devido processo legal.
                                    Com sólida experiência em litígios penais, acompanhamento desde a fase investigativa até os tribunais superiores,
                                    oferecendo estratégias jurídicas personalizadas e eficientes na condução de casos complexos, sempre pautado
                                    pela ética, agilidade e comprometimento com a justiça.
                                </p>
                                <p style="text-align: justify;">
                                    O Direito Contencioso abrange diversas áreas do ordenamento jurídico, entre elas:
                                    Cível: disputas entre pessoas físicas ou jurídicas, envolvendo contratos, indenizações, propriedade, família, entre outros;
                                    Trabalhista: conflitos entre empregados e empregadores, como demissões, verbas rescisórias, férias e horas extras;
                                    Criminal: investigações e processos penais, com foco na defesa de acusados e na apuração de responsabilidades;
                                </p>
                                <p style="text-align: justify;">
                                    Administrativo: litígios entre cidadãos e o poder público, como concursos, licenças, sanções e tributos;
                                    Consumerista: defesa dos direitos dos consumidores frente a fornecedores de produtos e serviços.
                                </p>
                                <div style="clear: both;"></div>
                            </div>
                        </article>
                    </div>

                    <div>
                        <h1 style='font-size:12px;'><b2 id="dois" class="tres toggle-button">DIREITO-IMOBILIÁRIO</b2></h1>
                    </div>
                    <div style="padding-bottom:40px;">
                        <article id="content" data-target="content1" style="padding-right:12%; padding-left:12%;">
                            <div style="position: relative; overflow: hidden; padding-bottom: 20px;"> <a href="{{ asset('/site/curriculum/jm') }}">
                                    <img width="13%" class="w-50 md:w-75 lg:w-100 borda3" style="border-radius:50%; float: left; margin-right: 20px; margin-bottom: 10px; object-fit: cover;"
                                    src="{{ asset('/imgs/sistema/jm/jm.png') }}">
                                </a>
                                <p style="text-align: justify;">
                                    Advogado especializado em Direito Imobiliário, com ampla experiência na assessoria jurídica de negócios
                                    envolvendo bens imóveis, tanto na esfera consultiva quanto contenciosa. Atua na elaboração, análise e negociação
                                    de contratos de compra e venda, locação, permuta e financiamento, além de processos judiciais relacionados à posse,
                                    propriedade, usucapião e regularização fundiária. Com foco na segurança jurídica e no planejamento patrimonial,
                                    oferece soluções personalizadas para pessoas físicas, empresas e incorporadoras, sempre com atenção às normas
                                    urbanísticas, registrais e tributárias.
                                </p>
                                <p style="text-align: justify;">
                                    O Direito Imobiliário abrange uma variedade de temas relevantes, como:
                                    Contratos imobiliários: compra e venda, locação, doação, comodato e garantias reais;
                                    Registro de imóveis: matrícula, averbações, regularização e escritura pública;
                                    Direitos reais: propriedade, posse, usufruto, servidão, laje, entre outros;
                                    Usucapião: judicial e extrajudicial;
                                </p>
                                <p style="text-align: justify;">
                                    Condomínios: relações entre condôminos, administração e convenções;
                                    Tributação: ITBI, IPTU e obrigações acessórias;
                                    Desapropriação e direito urbanístico: regularização de áreas e intervenções do poder público;
                                    Contencioso imobiliário: ações possessórias, reintegrações, despejos e revisões contratuais.
                                </p>
                                <div style="clear: both;"></div>
                            </div>
                        </article>
                    </div>

                    <center class='reg'>Computratum.Ius PKCia.com.br &nbsp;{{ \App\Classes\Datas::dataHora() }}</center>
                </div>
            </section>
        </div>
        </center>

        <!----------------------------- Modal --------------------------------->

        <script>
            //var article = document.querySelector("#content1");
            const article = document.querySelectorAll("#content");
            const content1      = article[0];
            const content2      = article[1];
            const content3      = article[2];
            // Selecionar todos os botões que controlam o conteúdo
            const articles  = document.querySelectorAll('.toggle-button');
            const btn1      = articles[0];
            const btn2      = articles[1];
            const btn3      = articles[2];

            var var1 ='TRIBUTARIO ↑ PERÍCIA FORENSE'
            var var1a='TRIBUTARIO - PERÍCIA FORENSE'
            var var2  ='DIREITO - CONTENCIOSO'
            var var2a ='DIREITO ↑ CONTENCIOSO'
            var var3  ='DIREITO - IMOBILIÁRIO'
            var var3a ='DIREITO ↑ IMOBILIÁRIO'

            articles.forEach(button => {
                btn1.addEventListener('click', () => {
                   /* const Id = btn1.dataset.target;
                    abreContent(btn1, Id);*/
                    if (content1.className == "open") {
                        content1.className = "";
                        btn1.innerHTML  = var1a // Mostrar mais
                    } else {
                        content1.className = "open";
                        btn1.innerHTML  = var1 // Mostrar
                    }
                    console.log('Valor de article:', article);
                });

                btn2.addEventListener('click', () => {
                    if (content2.className == "open") {
                        content2.className = "";
                        btn2.innerHTML  = var2
                    } else {
                        content2.className = "open";
                        btn2.innerHTML  = var2a
                    }
                    console.log('Valor de article:', article);
                });

                btn3.addEventListener('click', () => {
                    // const Id = btn3.dataset.target;
                    // abreContent(btn3, Id);
                    if (content3.className == "open") {
                        content3.className = "";
                        btn3.innerHTML  = var3
                    } else {
                        content3.className = "open";
                        btn3.innerHTML  = var3a
                    }
                });
            });

        </script>

</html>
