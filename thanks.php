<!DOCTYPE html>

<html>
                <head>
                                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                                <link rel="Stylesheet" type="text/css" href="form.css" />

</head>

            <!--funkcja wysyłająca dane do bazy -->
            <?php
            function send_db()      {
                $komunikat='<br/><br/><center><font color="red" size="23"><b>Wypełnij wszystkie odpowiedzi</b></font></center><br/><br/>';
       if(empty($_POST['plec'])){echo $komunikat;}
       else if(empty($_POST['zwiazek'])){echo $komunikat;}
       else if(empty($_POST['wojewodztwo'])){echo $komunikat;}
       else if(empty($_POST['czy_chorowal'])){echo $komunikat;}
       else if(empty($_POST['leki'])){echo $komunikat;}
       else if(empty($_POST['sport'])){echo $komunikat;}
       else if(empty($_POST['praca'])){echo $komunikat;}
       else if(empty($_POST['papierosy'])){echo $komunikat;}
       else if(empty($_POST['alkohol'])){echo $komunikat;}
       else if(empty($_POST['kawa'])){echo $komunikat;}
       else if(empty($_POST['fast_food'])){echo $komunikat;}
       else if(empty($_POST['cukrzyca'])){echo $komunikat;}
       else if(empty($_POST['stres'])){echo $komunikat;}
       else if(empty($_POST['sen'])){echo $komunikat;}
       else if(empty($_POST['objawy'])){echo $komunikat;}
       else {
            //przypisanie zmiennym wartosci z formularza:
        $plec=$_POST['plec'];

        $wiek=$_POST['wiek'];

        $waga=$_POST['waga'];

        $wzrost=$_POST['wzrost'];

        $zwiazek=$_POST['zwiazek'];

        $wojewodztwo=$_POST['wojewodztwo'];

        $czy_chorowal=$_POST['czy_chorowal'];

        $leki=$_POST['leki'];

        $sport=$_POST['sport'];

        $praca=$_POST['praca'];

        $papierosy=$_POST['papierosy'];

        $alkohol=$_POST['alkohol'];

        $kawa=$_POST['kawa'];

        $fast_food=$_POST['fast_food'];

        $cukrzyca=$_POST['cukrzyca'];

        $stres=$_POST['stres'];

        $sen=$_POST['sen'];

        $objawy=$_POST['objawy'];
			//wyświetlenie informacji o ryzyku jeśli ankietowany znajduje się w grupie ryzyka
         if ($czy_chorowal == "tak_chorowal" && $sport == "nie_uprawiam_sport" &&  $papierosy == "kilka_razy_dziennie_pap" || $papierosy == "raz_dziennie_pap"
         && $alkohol == "codziennie_alk" || $alkohol == "kilka_raz_w_tyg_alk" && $kawa == "kilka razy dziennie" && $fast_food == "kilka_raz_w_tyg_fast" &&
         $stres == "codziennie_stres" || $stres == "kilka_raz_tyg_stres")     {
            echo "<p><font color='red'><h1> Znajdujesz się w grupie podwyższonego ryzyka zagrożenia chorobami sercowo-naczyniowymi</h1></font></p>";     }
            else
            echo   "<p>Trzymaj tak dalej! Jesteś na dobrej drodze do zdrowego serca!</p>";
		// połączenie się z bazą, zdefiniowanie polecenia i wysłanie go do bazy danych
         $db_user='xxxxxxxx';//user majacy dostep do bazy
        $db_password='yyyyyyyy';//haslo
        $database='twojeserce_cba_pl';//nazwa bazy danych
        $con = mysqli_connect('mysql.cba.pl',$db_user,$db_password,'twojeserce_cba_pl');//jesli pliki html i php beda na tym samym serwerze co baza to musisz wpisac 'localhost' w przeciwnym razie dostep do bazy czyli lokalizacje
        mysqli_select_db($con, $database) or die ("Nie udalo sie wybrac bazy danych");
        $query = "INSERT INTO raim (plec,wiek,waga,wzrost,zwiazek,wojewodztwo,czy_chorowal,leki,sport,praca,papierosy,alkohol,kawa,fast_food,cukrzyca,stres,sen,objawy) VALUES ('$plec','$wiek','$waga','$wzrost','$zwiazek','$wojewodztwo','$czy_chorowal','$leki','$sport','$praca','$papierosy','$alkohol','$kawa','$fast_food','$cukrzyca','$stres','$sen','$objawy')";
        mysqli_query($con,$query);


        }
       }
          ?>

	<!-- Funkcja wyświetlająca podziękowanie oraz wykresy ilustrujące zebrane dane -->
    <?php
        function thanks(){
                ?>
           <form encetype="text/plain" >
           <body class="start">
                <div >
                    <h2>Czy dbasz o swoje serce?</h2>
                </div>
                    <section class="container">
                        <p><h1>Dziękujemy za wypełnienie ankiety!</h1></p></br></br></br></br>
										
                        <?php echo send_db() ?>   </br></br></br>
						<center><a href="wiedza.html" class = "button">WYNIKI</a></center></br></br></br>
                        <p>Poniżej przedstawiamy analizę wyników ankietowanych:</br></br></p>

                    </section>
                    <p>
							
					
					
					
                        <?php
							//zaimportowanie biblioteki do rysowania wykresów
                            include './LabChartsPie.php';

							//połączenie się z bazą danych
                            $db_user='xxxxxxx';//user majacy dostep do bazy
                            $db_password='yyyyyyyyyyyyy';//haslo
                            $database='twojeserce_cba_pl';//nazwa bazy danych
                            $db = new mysqli('mysql.cba.pl',$db_user,$db_password,'twojeserce_cba_pl');
							
                            $zadanie1 = "SELECT AVG(wiek) as sred FROM raim";
                            $result1 = $db->query($zadanie1);

                                while ($r1 = $result1->fetch_assoc()) {
                                    echo "<p> Średnia wieku ankietowanych wynosi: ".round($r1["sred"])." lat</p>";
                                }
                                $result1->free();
								
							echo "<br/><p>Ilość ankietowanych znajdujących się w grupie podwyższonego ryzyka zagrożenia chorobami sercowo-naczyniowymi</p>";
							
							//zdefiniowanie zapytań do bazy danych
                            $zadanie5 = "SELECT COUNT(ID) as liczba FROM raim WHERE czy_chorowal='tak_chorowal'
                            AND sport = 'nie_uprawiam_sport' AND papierosy = 'kilka_razy_dziennie_pap' OR papierosy = 'raz_dziennie_pap'
                            AND kawa = 'kilka razy dziennie' OR kawa = 'raz_dziennie' AND stres = 'codziennie_stres' ";
                            $zadanie6 = "SELECT COUNT(ID) as razem FROM raim";
							//wysłanie zapytań do bazy danych
                            $result5 = $db->query($zadanie5);
                            $result6 = $db->query($zadanie6);
                            $LabChartsPie = new LabChartsPie();
                            while ($r6 = $result6->fetch_assoc() ) {
                               while( $r5 = $result5->fetch_assoc()){
							//dodanie danych do wykresu i ustawienie jego właściwości
                            $LabChartsPie->setData(array($r5["liczba"],$r6["razem"]-$r5["liczba"]));
                            $LabChartsPie->setTitle('');
                            $LabChartsPie->setSize('500x400');
                            $LabChartsPie->setColors('990000');
                            $LabChartsPie->setLabels ('grupa ryzyka|pozostali');
							//wyrysowanie wykresu
                            echo '<img src="'.$LabChartsPie->getChart().'"/></br>';
                            }
                            }

                            $zadanie2 = "SELECT COUNT(plec) as ilosc_kob FROM raim WHERE plec='kobieta'";
                            $zadanie3 = "SELECT COUNT(plec) as ilosc_mez FROM raim WHERE plec='mezczyzna'";
                            $result2 = $db->query($zadanie2);
                            $result3 = $db->query($zadanie3);
                            $LabChartsPie = new LabChartsPie();
                            while ($r2 = $result2->fetch_assoc() ) {
                               while( $r3 = $result3->fetch_assoc()){
                            $LabChartsPie->setData(array($r2["ilosc_kob"],$r3["ilosc_mez"]));
                            $LabChartsPie->setTitle('Liczebność ankietowanych według płci');
                            $LabChartsPie->setSize('500x400');
                            $LabChartsPie->setColors('990000');
                            $LabChartsPie->setLabels ('kobieta|mężczyzna');
                            echo '<img src="'.$LabChartsPie->getChart().'"/>';
                            }
                            }

                            $zadanie4 = "SELECT waga/((wzrost/100)*(wzrost/100)) as bmi FROM raim";
                            $result4 = $db->query($zadanie4);
                            $LabChartsPie = new LabChartsPie();
                            while ($r4 = $result4->fetch_assoc() ) {
                                for($i=0;$i<sizeof($r4);$i++){
                                if ($r4["bmi"]<18.49)
                                  $nied++;
                                  else if($r4["bmi"]>18.5&&$r4["bmi"]<24.99)
                                  $praw++;
                                  else if($r4["bmi"]>24.5&&$r4["bmi"]<29.99)
                                  $nad++;
                                  else if($r4["bmi"]>30)
                                  $otyl++;
                                  }
                            $LabChartsPie->setData(array($nied,$praw,$nad,$otyl));
                            $LabChartsPie->setTitle('Zróżnicowanie ze względu na BMI ankietowanych');
                            $LabChartsPie->setSize('500x400');
                            $LabChartsPie->setColors('990000');
                            $LabChartsPie->setLabels ('niedowaga|prawidlowa|nadwaga|otylosc');

                            }
                            echo '<img src="'.$LabChartsPie->getChart().'"/> </br>';

							 echo "<p> Jak często ankietowani sięgają po alkohol</p>";
                            $zadanie7 = "SELECT alkohol as alk_kob FROM raim WHERE plec='kobieta'";
                            $zadanie8 = "SELECT alkohol as alk_mez FROM raim WHERE plec='mezczyzna'";
                            $result7 = $db->query($zadanie7);
                            $result8 = $db->query($zadanie8);
                            $LabChartsPie1 = new $LabChartsPie();
							$LabChartsPie2 = new $LabChartsPie();
                            while ($r7 = $result7->fetch_assoc() ) {
                            
                                for($i=0;$i<sizeof($r7);$i++){
								//zliczenie ankietowanych w zależności od częstości uprawiania sportu
                                if($r7["alk_kob"]=="codziennie_alk")
                                  $kob_cod++;
                                  else if($r7["alk_kob"]=="kilka_raz_w_tyg_alk")
                                  $kob_tydz++;
                                  else if($r7["alk_kob"]=="raz_w_mies_alk")
                                  $kob_mies++;
                                  else if($$r7["alk_kob"]=="nie_alk")
                                  $kob_nie++;
                                  }
							}
							
							while ($r8 = $result8->fetch_assoc() ) {	  
                                   for($j=0;$j<sizeof($r8);$j++){
                                    if($r8["alk_mez"]=="codziennie_alk")
                                  $mez_cod++;
                                  else if($r8["alk_mez"]=="kilka_raz_w_tyg_alk")
                                  $mez_tydz++;
                                  else if($r8["alk_mez"]=="raz_w_mies_alk")
                                  $mez_mies++;
                                  else if($r8["alk_mez"]=="nie_alk")
                                  $mez_nie++;
                                  }
							$LabChartsPie1->setData(array($kob_cod,$kob_tydz,$kob_mies,$kob_nie));
                            $LabChartsPie1->setTitle('Kobiety');
                            $LabChartsPie1->setSize('500x400');
                            $LabChartsPie1->setColors('990000');
                            $LabChartsPie1->setLabels ('codziennie|kilka razy w tygodniu|kilka razy w miesiacu|nie dotyczy');
		
							$LabChartsPie2->setData(array($mez_cod,$mez_tydz,$mez_mies,$mez_nie));
                            $LabChartsPie2->setTitle('Mężczyźni');
                            $LabChartsPie2->setSize('500x400');
                            $LabChartsPie2->setColors('990000');
                            $LabChartsPie2->setLabels ('codziennie|kilka razy w tygodniu|kilka razy w miesiacu|nie dotyczy');
                            }
                            
								echo '<img src="'.$LabChartsPie1->getChart().'"/> ';
								echo '<img src="'.$LabChartsPie2->getChart().'"/> </br>';
								
								
							$zadanie9 = "SELECT cukrzyca FROM raim ";
                            $result9 = $db->query($zadanie9);
                            $LabChartsPie = new $LabChartsPie();
							while ($r9 = $result9->fetch_assoc() ) {
								for($i=0;$i<sizeof($r9);$i++){
                                  if($r9["cukrzyca"]=="tak_cukrzyca")
                                  $cuk_tak++;
                                  else if($r9["cukrzyca"]=="nie_cukrzyca")
                                  $cuk_nie++;
                                  else if($r9["cukrzyca"]=="nie_wiem_cukrzyca")
                                  $cuk_nie_wiem++;
							}
							 $LabChartsPie->setData(array($cuk_tak,$cuk_nie,$cuk_nie_wiem));
                            $LabChartsPie->setTitle('Problemy z cukrzycą w rodzinie');
                            $LabChartsPie->setSize('500x400');
                            $LabChartsPie->setColors('990000');
                            $LabChartsPie->setLabels ('Tak|Nie|Nie wiem');
							}
							echo "<br/><p>Ilość ankietowanych narażonych na stres z rozróżnieniem częstości uprawiania aktywności fizycznej</p>";
							$zadanie9 = "SELECT sport FROM raim WHERE stres = 'codziennie_stres' or stres = 'kilka_raz_tyg_stres' or stres='kilka_raz_mies_stres'";
                            $result9 = $db->query($zadanie9);
                               while( $r9 = $result9->fetch_assoc()){
								   for($j=0;$j<sizeof($r9);$j++){
                                    if($r9["sport"]=="codziennie_sport")
                                  $sp_cod++;
                                  else if($r9["sport"]=="kilka_razy_w_tyg_sport")
                                  $sp_tydz++;
                                  else if($r9["sport"]=="kilka_razy_w_mies_sport")
                                  $sp_mies++;
                                  else if($r9["sport"]=="nie_uprawiam_sport")
                                  $sp_nie++;
                                  }
								$data = "t:".$sp_cod.",".$sp_tydz.",".$sp_mies.",".$sp_nie;
								$etykiety = "0:|codziennie|kilka razy w tygodniu|kilka razy w miesiacu|nie dotyczy";
                            }
							$zrodloobrazka1="http://chart.apis.google.com/chart?cht=bhs&amp;chs=1000x300&chd=".$data."&chxt=y,x&chxl=".$etykiety;
							echo '<img src="'.$zrodloobrazka1.'"alt="" />';

							
							?>
                    </p>
                    <div id="copyright">
                        Design by: Anita i Tomek
                    <div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
                    </div>

            </body>
                <!-- Copyright -->
            </form>
    <?php
      }
    ?>
    <?php
thanks();
    ?>
</html>
