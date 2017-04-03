<!DOCTYPE html>

<html>
        <head>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <link rel="Stylesheet" type="text/css" href="form.css" />
                <title>Twoje Serce</title>

</head>
                <?php
                function start(){
                        ?>
                            <form encetype="text/plain" action="formularz.php"  method="POST">
                                <body class="start">
                                        <div >
                                              <h2>Czy dbasz o swoje serce?</h2>
                                        </div>
                                        <section class="container">
                                            <p>Witaj!</p>
                                            <p>Jesteśmy studentami 3 roku Inżynierii Biomedycznej na Politechnice Gdańskiej.
                                            W ramach realizacji projektu studenckiego potrzebujemy zebrać jak największą ilość danych dotyczących czynników zawału serca.</p>
                                            <p>Serdecznie zapraszamy do wypełnienia krótkiej ankiety!</p>
                                        </section>
                                                                    <section class="down">
                                        <center><input class="button" type="submit" value="DALEJ" onClick="formularz()" /></center></br></br>
										<center><a href="wiedza.html" class = "button">WYNIKI</a></center>

                                </section>

                                    <!-- Copyright -->
                                        <div id="copyright">
                                            Design by: Anita i Tomek
                                        </div>

                                </body>


                            </form>
                <?php
                }
                ?>
<?php 
start();
?>
</html>