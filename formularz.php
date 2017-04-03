<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="Stylesheet" type="text/css" href="form.css" />
        <title>Twoje Serce</title>


    </head>
        <?php

$plec = $wiek = $zwiazek = $czy_chorowal=$leki=$sport=$praca=$papierosy=$alkohol=$kawa=$fast_food=$cukrzyca=$stres=$sen=$objawy="";

$emptyField = $success = FALSE;

              ?>

			<!-- Formularz -->
          <div id="banner">
              <span>Zadbaj o swoje serce</span>
          </div>
          <section class="container">
              <form encetype="text/plain" action="thanks.php" method="POST">
            <p>Podaj płeć:</p>
            <input type="radio" name="plec" value="kobieta"   /> Kobieta
            <input type="radio" name="plec" value="mezczyzna"   /> Mężczyzna

            <p>Podaj swój wiek</p>
            <input type="text" name="wiek" /> <br />

            <p>Podaj swoja wagę [kg]</p>
            <input type="text" name="waga" /> <br />

            <p>Podaj swój wzrost [cm]</p>
            <input type="text" name="wzrost" /> <br />

            <p>Czy jesteś w stałym związku?</p>
            <input type="radio" name="zwiazek" value="tak_zwiazek" />Tak<br />
            <input type="radio" name="zwiazek" value="nie_zwiazek" />Nie<br />

            <!-- Lista rozwijalna z zaznaczoną opcją domyślną -->
            <p>Z jakiego województwa pochodzisz?</p>
            <select name="wojewodztwo">
                <option selected="selected" value="pomorskie">pomorskie</option>
                    <option value="warminsko-mazurskie">warmińsko-mazurskie</option>
                    <option value="mazowieckie">mazowieckie</option>
                    <option value="zachodnio-pomorskie">zachodnio-pomorskie</option>
                    <option value="wielkopolskie">wielkopolskie</option>
                    <option value="kujawsko-pomorskie">kujawsko-pomorskie</option>
                    <option value="lubelskie">lubelskie</option>
                    <option value="lubuskie">lubuskie</option>
                    <option value="dolnoslaskie">dolnośląskie</option>
                    <option value="malopolskie">małopolskie</option>
                    <option value="opolskie">opolskie</option>
                    <option value="lodzkie">łódzkie</option>
                    <option value="swietokrzyskie">świętokrzyskie</option>
                    <option value="podkarpackie">podkarpackie</option>
                    <option value="podlaskie">podlaskie</option>
                    <option value="slaskie">śląskie</option>
            </select>

            <p>Czy ktoś w Twojej rodzinie chorował/choruje na choroby sercowo-naczyniowe?</p>
            <input type="radio" name="czy_chorowal" value="tak_chorowal" />Tak<br />
            <input type="radio" name="czy_chorowal" value="nie_chorowal" />Nie<br />
            <input type="radio" name="czy_chorowal" value="nie_wiem_czy_chorowal" />Nie wiem<br />

            <p>Czy zażywasz leki nasercowe?</p>
            <input type="radio" name="leki" value="tak_leki" />Tak<br />
            <input type="radio" name="leki" value="nie_leki" />Nie<br />

            <p>Jak często uprawiasz sport?</p>
            <input type="radio" name="sport" value="codziennie_sport" />Codziennie<br />
            <input type="radio" name="sport" value="kilka_razy_w_tyg_sport" />Kilka razy w tygodniu<br />
            <input type="radio" name="sport" value="kilka_razy_w_mies_sport" />Kilka razy w miesiącu<br />
            <input type="radio" name="sport" value="nie_uprawiam_sport" />Nie uprawiam<br />

            <p>Rodzaj wykonywanej pracy</p>
            <input type="radio" name="praca" value="fizyczna" />Fizyczna<br />
            <input type="radio" name="praca" value="umyslowa" />Umysłowa<br />
            <input type="radio" name="praca" value="student/uczen" />Student/uczeń<br />
            <input type="radio" name="praca" value="nie_pracuje" />Nie pracuję<br />

            <p>Jak często palisz papierosy?</p>
            <input type="radio" name="papierosy" value="kilka_razy_dziennie_pap" />Kilka razy dziennie<br />
            <input type="radio" name="papierosy" value="raz_dziennie_pap" />Raz dziennie<br />
            <input type="radio" name="papierosy" value="kilka_raz_w_tyg_pap" />Kilka razy w tygodniu<br />
            <input type="radio" name="papierosy" value="okazyjnie_pap" />Okazyjnie<br />
            <input type="radio" name="papierosy" value="nie_pap" />Nie palę<br />

            <p>Jak często spożywasz alkohol?</p>
            <input type="radio" name="alkohol" value="codziennie_alk" />Codziennie<br />
            <input type="radio" name="alkohol" value="kilka_raz_w_tyg_alk" />Kilka razy w tygodniu<br />
            <input type="radio" name="alkohol" value="kilka_raz_w_mies_alk" />Kilka razy w miesiącu<br />
            <input type="radio" name="alkohol" value="nie_alk" />Nie dotyczy<br />

            <p>Jak często pijesz kawę?</p>
            <input type="radio" name="kawa" value="kilka razy dziennie" />Kilka razy dziennie<br />
            <input type="radio" name="kawa" value="raz dziennie" />Raz dziennie<br />
            <input type="radio" name="kawa" value="kilka raz w tyg" />Kilka razy w tygodniu<br />
            <input type="radio" name="kawa" value="nie" />Nie piję<br />

            <p>Jak często spożywasz jedzenie typu fast-food?</p>
            <input type="radio" name="fast_food" value="codziennie_fast" />Codziennie<br />
            <input type="radio" name="fast_food" value="kilka_raz_w_tyg_fast" />Kilka razy w tygodniu<br />
            <input type="radio" name="fast_food" value="kilka_raz_mies_fast" />Kilka razy w miesiącu<br />
            <input type="radio" name="fast_food" value="nie_fast" />Nie dotyczy<br />


            <p>Czy Ty lub kto w Twojej rodzinie choruje na cukrzycę?</p>
            <input type="radio" name="cukrzyca" value="tak_cukrzyca" />Tak<br />
            <input type="radio" name="cukrzyca" value="nie_cukrzyca" />Nie<br />
            <input type="radio" name="cukrzyca" value="nie_wiem_cukrzyca" />Nie wiem<br />

            <p>Jak często znajdujesz się w sytuacjach stresowych?</p>
            <input type="radio" name="stres" value="codziennie_stres" />Codziennie<br />
            <input type="radio" name="stres" value="kilka_raz_tyg_stres" />Kilka razy w tygodniu<br />
            <input type="radio" name="stres" value="kilka_raz_mies_stres" />Kilka razy w miesiącu<br />
            <input type="radio" name="stres" value="nie_stres" />Nie stresuję się<br />

            <p>Czy miewasz problemy ze snem?</p>
            <input type="radio" name="sen" value="tak_sen" />Tak<br />
            <input type="radio" name="sen" value="rzadko_sen" />Rzadko<br />
            <input type="radio" name="sen" value="nie_sen" />Nie<br />

            <p>Czy wiesz jakie są najczęstsze objawy zawału serca?</p>
            <input type="radio" name="objawy" value="tak_objawy" />Tak<br />
            <input type="radio" name="objawy" value="nie_obajwy" />Nie<br />

            </section>
            <p></p>
            <center>
                <input class="button" name="submit" type="submit" value="Wyślij"/></center>

            <!-- Copyright -->
                <div id="copyright">
                    Design by: Anita i Tomek
                </div>
            </form>
            



    <body>

    </body>
</html>
			