<script language="JavaScript" type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
<script language="JavaScript" type="text/javascript" src="js/bootstrap.min.js"></script>
<div class="slideshow_block">
    <div class="djcss_slides">
        <!-- Carousel -->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="7"></li>

            </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="images/motto.jpg" alt="Shool Motto">
                        <!-- <div class="carousel-caption d-none d-md-block">
                            <h5>DJCSS - BIOLOGY LAB</h5>
                            <p>Form IV students, On their final touches doing practical <br>in Biology laboratory </p>
                        </div> -->
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/mahafali_1.jpg" alt="Mahafali">
                        <!-- <div class="carousel-caption d-none d-md-block">
                            <h5>DJCSS - BIOLOGY LAB</h5>
                            <p>Form IV students, On their final touches doing practical <br>in Biology laboratory </p>
                        </div> -->
                    </div>          
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/parade.jpg" alt="Parade">
                        <!-- <div class="carousel-caption d-none d-md-block">
                            <h5>DJCSS - BIOLOGY LAB</h5>
                            <p>Form IV students, On their final touches doing practical <br>in Biology laboratory </p>
                        </div> -->
                    </div>   
      
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/paredi_2.jpg" alt="Paredi">
                        <!-- <div class="carousel-caption d-none d-md-block">
                            <h5>DJCSS - BIOLOGY LAB</h5>
                            <p>Form IV students, On their final touches doing practical <br>in Biology laboratory </p>
                        </div> -->
                    </div> 
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/deputy_quote.jpg" alt="Deputy Head Master">
                        <!-- <div class="carousel-caption d-none d-md-block">
                            <h5>DJCSS - BIOLOGY LAB</h5>
                            <p>Form IV students, On their final touches doing practical <br>in Biology laboratory </p>
                        </div> -->
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/staff.jpg" alt="Walimu">
                        <!-- <div class="carousel-caption d-none d-md-block">
                            <h5>DJCSS - BIOLOGY LAB</h5>
                            <p>Form IV students, On their final touches doing practical <br>in Biology laboratory </p>
                        </div> -->
                    </div>    
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/football.jpg" alt="Form two club">
                        <!-- <div class="carousel-caption d-none d-md-block">
                            <h5>DJCSS - BIOLOGY LAB</h5>
                            <p>Form IV students, On their final touches doing practical <br>in Biology laboratory </p>
                        </div> -->
                    </div>      
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/line.jpg" alt="Assemble">
                        <!-- <div class="carousel-caption d-none d-md-block">
                            <h5>DJCSS - BIOLOGY LAB</h5>
                            <p>Form IV students, On their final touches doing practical <br>in Biology laboratory </p>
                        </div> -->
                    </div>  
                </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="wiki">     
        <div class="card" style="width: 100%; border:none">
            <div class="card-body">
                <h5>Karibu DJCSS</h5>
                <img class="img-center" src="images/head.jpg" width="140px" height="150px" alt="Head Master" style="border-radius:50%;"><br>
                <span class="title card-title"><b>BHOKE C. JOSEPH - MKUU WA SHULE</b></span>
                <p class="card-text">Tumefurahishwa na uamuzi wako wa kufanya masomo ya sekondari katika Shule ya sekondari Dr. John Chacha (DJCSS). Mnakaribishwa sana katika shule yetu bora ambayo inatoa ufundishaji na kuongeza thamani, utafiti na huduma ya jamii. Tovuti hii inaelezea mipango dhahiri ya masomo ambayo tunatoa, na shughuli zote zinazofanywa kama sehemu ya ujumbe wa shule na Maono... </p>
                <a href="index.php?id=head" class="btn btn-primary">Soma zaidi</a>
            </div>
        </div>
    </div>
</div>

<script language="JavaScript" type="text/javascript">
        $('.carousel').carousel({
        interval: 5000
    }).on('slide.bs.carousel', function (e) {
        var nextH = $(e.relatedTarget).height();
        console.log(nextH)
        console.log( $(this).find('.active.item').parent() )
        $(this).find('.active.item').parent().animate({
            height: nextH
        }, 500);
    });
        </script>


    <div class="main-body-container">
        <div class="first">
            <!-- <a href="#p1"><img height="5" src="images/profile1.jpg" alt="" class="staff-img"></a> -->
            <h5>KUHUSU DJCSS</h5>
            <!-- <h6>DIRECTOR-HUDSON MAHARE</h6> -->
            <hr>
            <p>Shule ya sekondari ya Dr. John Chacha, ilianzishwa mwaka 2017. Imesajiliwa kwa namba S5007 na usajili wa
                baraza la mitihani ya taifa la Tanzania ni S.5601. Shule hii ni matunda ya shule ya Destiny English
                Medium Primary school. Zote zinamilikiwa na shirika la kikristo la Hope Community Development.
                Shule inatoa malezi bora na elimu bora kwa watoto pia ufaulu mzuri. Mwaka 2019 na 2020 kidato cha pili
                walifaulu wote na kushika nafasi ya PILI mwaka 2019 na nafasi ya KWANZA mwaka 2020 kati ya Shule 34. Mwaka 2019 kidato cha NNE walifaulu wote na ikawa ya PILI kiwilaya, ya NNE kimkoa kati ya shule 21, na ya 138 kati ya shule 1011 kitaifa. Mwaka 2020 kidato cha NNE walifaulu wote na ikawa ya pili kiwilaya, ya TATU kimkoa kati ya shule 31, na ya 58 kati ya shule 986 kitaifa. Kiujumla shule inafanya vizuri.</p>
            <h5>Ujumbe wa shule (Mission)</h5>
            <hr>
            <p>Ni kuibua/ kuandaa viongozi kwa njia ya upendo wa Mungu kupitia Elimu, Teknolojia, malezi ya watoto, Afya
                na mafunzo ya uongozi.</p>

            <h5>Maono ya Shule</h5>
            <hr>
            <p>Kuwa kituo kinachoongoza kwa ubora kitaaluma, Kiimani na maadili ndani na nje ya nchi.</p>

            <h5>Kauli Mbiu</h5>
            <hr>
            Kujifunza ili kuongoza.
        </div>