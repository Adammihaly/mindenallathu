<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/csomagvaltasStyle.css">
    <script src="https://kit.fontawesome.com/20993e564e.js" crossorigin="anonymous"></script>
    <script defer src="../js/csomagvaltasScript.js"></script>
    <script defer src="../js/navbar.js"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>Document</title>
</head>
<body>
    <nav>
        <div class="logo">Mindenallat.hu</div>
        <div class="nav_item">
            <ul>
                <li id="kezelopult_nav"><i class="fa-solid fa-shapes"></i>Kezelőpult</li>
                <li id="hirdetes_feleadasa_nav"><i class="fa-solid fa-file-circle-plus"></i>Hirdetés feladása</li>
                <li id="profil_modositasa_nav"><i class="fa-solid fa-user"></i>Profil módosítása</li>
                <li id="csomagvalasztas_nav"><i class="fa-solid fa-bag-shopping"></i>Csomagválasztás</li>
                <li id="hirdetesek_kezelese_nav"><i class="fa-solid fa-file-signature"></i>Hirdetések kezelése</li>
                <li id="sugokozpont_nav"><i class="fa-solid fa-star"></i>Súgóközpont</li>
                <li id="kijelentkezes_nav" class="logout"><i class="fa-solid fa-arrow-right-from-bracket"></i> Kijelentkezés</li>
            </ul>
        </div>
    </nav>

    <nav id="felugroablak">    
        <div class="profil_mobil">
            <div class="nev_kep">
                <img class="profilkep">
                Lorem Ipsum
            </div>
        </div>
        <hr>
        <div class="nav_item">
            <ul>
                <li id="kezelopult_nav"><i class="fa-solid fa-shapes"></i>Kezelőpult</li>
                <li id="hirdetes_feleadasa_nav"><i class="fa-solid fa-file-circle-plus"></i>Hirdetés feladása</li>
                <li id="profil_modositasa_nav"><i class="fa-solid fa-user"></i>Profil módosítása</li>
                <li id="csomagvalasztas_nav"><i class="fa-solid fa-bag-shopping"></i>Csomagválasztás</li>
                <li id="hirdetesek_kezelese_nav"><i class="fa-solid fa-file-signature"></i>Hirdetések kezelése</li>
                <li id="sugokozpont_nav"><i class="fa-solid fa-star"></i>Súgóközpont</li>
                <li id="kijelentkezes_nav"><i class="fa-solid fa-arrow-right-from-bracket"></i>Kijelentkezés</li>
            </ul>
        </div>
    </nav>

    <div class="wrapper">
        <nav class="mobilnezet">
            <div class="baloldal">
                <div class="notif"><i class="fa-solid fa-bars" id="Hamburger" onclick="mobilnavigacio()"></i></div>
                <p>Mindenallat.hu</p>
            </div>
            <div class="jobboldal">
                <div class="notif"><i class="fa-solid fa-bell"></i></div>
            </div>
        </nav>
        
        <main>
            <header>
                <div class="profil">
                    <img class="profilkep"></img>
                    <p>Lorem Ipsum</p>
                </div>
                <div class="notif"><i class="fa-solid fa-bell"></i></div>
            </header>
            <section class="main_content">
                <p class="cim">Csomagváltás</p>
                <!--SIMPLE SESSION-->
                <div class="simpleSession">
                    <div class="baloldal"></div>
                    <div class="jobboldal">
                        <section class="simplepremium">
                            <button class="sk_s gomb" id="ss_simpleGomb">SIMPLE</button>
                            <button class="sk_p gomb" id="ss_premiumGomb">PREMIUM</button>
                        </section>
                        <section class="elonyokWrapper">
                            <ul>
                                <li>
                                    <div class="pipa"></div>
                                    <div class="textWrapper">
                                        <p class="cimek">Hirdetések közzététele</p>
                                        <p class="leiras">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="pipa"></div>
                                    <div class="textWrapper">
                                        <p class="cimek">Hirdetések közzététele</p>
                                        <p class="leiras">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="pipa"></div>
                                    <div class="textWrapper">
                                        <p class="cimek">Hirdetések közzététele</p>
                                        <p class="leiras">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="pipa"></div>
                                    <div class="textWrapper">
                                        <p class="cimek">Hirdetések közzététele</p>
                                        <p class="leiras">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    </div>
                                </li>
                            </ul>
                        </section>

                        <button class="ss_valtasGomb">Váltás prémiumra</button>
                    </div>
                </div>

                <!--PREMIUM SESSION-->
                <div class="premiumSession">
                    <div class="baloldal"></div>
                    <div class="jobboldal">
                        <section class="simplepremium">
                            <button class="pk_s gomb" id="ps_simpleGomb">SIMPLE</button>
                            <button class="pk_p gomb" id="ps_premiumGomb">PREMIUM</button>
                        </section>
                        <section class="elonyokWrapper">
                            <ul>
                                <li>
                                    <div class="pipa"></div>
                                    <div class="textWrapper">
                                        <p class="cimek">Hirdetések közzététele</p>
                                        <p class="leiras">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="pipa"></div>
                                    <div class="textWrapper">
                                        <p class="cimek">Hirdetések közzététele</p>
                                        <p class="leiras">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="pipa"></div>
                                    <div class="textWrapper">
                                        <p class="cimek">Hirdetések közzététele</p>
                                        <p class="leiras">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="pipa"></div>
                                    <div class="textWrapper">
                                        <p class="cimek">Hirdetések közzététele</p>
                                        <p class="leiras">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    </div>
                                </li>
                                <li class="ar">
                                    <span>20 000 Ft</span><label>/havonta</label>
                                </li>
                            </ul>
                        </section>

                        <button class="ps_valtasGomb">Csatlakozás a prémiumhoz</button>
                    </div>
                </div>

                <!--MOBIL SIMPLE-->
                <div class="mobilSimple">
                    <div class="mobilSimpleKep"></div>
                    <div class="valasztasWrapper">
                        <section class="simplepremium">
                            <button class="sk_s gomb" id="ss_simpleGomb_mobil">SIMPLE</button>
                            <button class="sk_p gomb" id="ss_premiumGomb_mobil">PREMIUM</button>
                        </section>
                        <section class="elonyokWrapper">
                            <ul>
                                <li>
                                    <div class="pipa"></div>
                                    <div class="textWrapper">
                                        <p class="cimek">Hirdetések közzététele</p>
                                        <p class="leiras">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="pipa"></div>
                                    <div class="textWrapper">
                                        <p class="cimek">Hirdetések közzététele</p>
                                        <p class="leiras">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="pipa"></div>
                                    <div class="textWrapper">
                                        <p class="cimek">Hirdetések közzététele</p>
                                        <p class="leiras">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="pipa"></div>
                                    <div class="textWrapper">
                                        <p class="cimek">Hirdetések közzététele</p>
                                        <p class="leiras">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    </div>
                                </li>
                            </ul>
                        </section>

                        <button class="ss_valtasGomb_mobil">Váltás prémiumra</button>
                    </div>
                </div>

                <!--MOBIL PREMIUM-->
                <div class="mobilPremium">
                    <div class="mobilPremiumKep"></div>
                    <div class="valasztasWrapper">
                        <section class="simplepremium">
                            <button class="pk_s gomb" id="ps_simpleGomb_mobil">SIMPLE</button>
                            <button class="pk_p gomb" id="ps_premiumGomb_mobil">PREMIUM</button>
                        </section>
                        <section class="elonyokWrapper">
                            <ul>
                                <li>
                                    <div class="pipa"></div>
                                    <div class="textWrapper">
                                        <p class="cimek">Hirdetések közzététele</p>
                                        <p class="leiras">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="pipa"></div>
                                    <div class="textWrapper">
                                        <p class="cimek">Hirdetések közzététele</p>
                                        <p class="leiras">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="pipa"></div>
                                    <div class="textWrapper">
                                        <p class="cimek">Hirdetések közzététele</p>
                                        <p class="leiras">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="pipa"></div>
                                    <div class="textWrapper">
                                        <p class="cimek">Hirdetések közzététele</p>
                                        <p class="leiras">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    </div>
                                </li>
                                <li class="ar">
                                    <span>20 000 Ft</span><label>/havonta</label>
                                </li>
                            </ul>
                        </section>
                        <button class="ps_valtasGomb_mobil">Váltás prémiumra</button>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>
</html>