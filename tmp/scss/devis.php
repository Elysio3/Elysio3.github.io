<html lang="en"><head>
    <title>Cedric Payet Broderie - Accueil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="images/favicon.ico" />

    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/flexslider.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700" rel="stylesheet">


  <script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/38/7/intl/fr_ALL/common.js"></script><script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/38/7/intl/fr_ALL/util.js"></script></head>
  <body data-spy="scroll" data-target="#pb-navbar" data-offset="200">


    <nav class="navbar navbar-expand-lg site-navbar navbar-light bg-light scrolled awake" id="pb-navbar">

      <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>


        <a class="navbar-brand" href="index.html" ><img src="images/ced.png" height=50 width=90></a>
        <div class="navbar-collapse justify-content-md-center collapse" id="navbarsExample09" style="">
          <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link active"onclick="location.href='index.html';">Accueil</a></li>
            <li class="nav-item"><a class="nav-link" onclick="location.href='broderie.html';">Broderie</a></li>
            <li class="nav-item"><a onclick="location.href='serigraphie.html';" class="nav-link" href="">Sérigraphie</a></li>
            <li class="nav-item"><a onclick="location.href='flocage.html';" class="nav-link" href="">Flocage</a></li>
            <li class="nav-item"><a onclick="location.href='catalogue.html';" class="nav-link" href="">Catalogues</a></li>
            <li class="nav-item"><a onclick="location.href='index.html#section-portfolio;" class="nav-link" href="">Portfolio</a></li>
            <li class="nav-item"><a onclick="location.href='acturealisations.html';" class="nav-link" href="">Actu</a></li>
          <li class="nav-item"><a onclick="location.href='select-type.html';" class="nav-link" href="">Devis</a></li>                                          </ul>
                                        </div>
                                      </div>
                                    </nav>


<?php
$clothes = $_POST['clothes'];
?>

    <section class="site-section bg-light" id="section-contact">
      <div class="container">
        <div class="row"   class="col-md-12 mb-12"  >
          <div class="col-md-12 mb-12">
            <div class="section-heading text-center">
      <hr>
              <h2>Demande de <strong>devis </strong> en ligne</h2>

            </div>
          </div>

          <div class="col-md-7 mb-5 mb-md-0">



            <form action="<?php echo "psendMail.php?ct=".$clothes?>" method="POST" enctype="multipart/form-data" class="site-form">



              <h3 class="mb-5">Personnalisation</h3>

              <h3 class="mb-5">Quantités & Tailles</h3>

<!-- OPTION 1-->
              <div class="form-group">


<!--FIN OPTION 1-->




<!-- OPTION 2-->
Qté Homme :
<input type="number" id="nbHomme" name="nbHomme" min="0" max="300" required>
<hr>
Qté Femme :
<input type="number" id="nbFemme" name="nbFemme"min="0" max="300" required>
<hr>
Qté Enfant :
<input type="number" id="nbEnfant" name="nbEnfant" min="0" max="300" required>
<hr>


                          <!--
                <FORM>
                <SELECT name="nom" size="1">
                <OPTION>Broderie
                <OPTION>Sérigraphie
                <OPTION>Flocage
                </SELECT>

              </FORM>-->




<!--FIN OPTION 2-->


<!-- OPTION 3-->


              </div>



              Type de col :
                <input type=text name ="manches" id="manches" list=browsers5 size="30" required>
              <datalist id=browsers5 >
              <option> Col rond
                <option> Col en V
              </datalist>

<div>
  <hr>
              Type de manches :
                <input type=text name ="manches" id="manches" list=browsers6 size="30" required>
              <datalist id=browsers6 >
                <option> Longues
                <option> Courtes
                <option> Sans manches
              </datalist>
</div>
              <hr>


              <h3 class="mb-5">Le transfert</h3>

              <label for="nbColors">Nombre de couleurs (1 - 3):</label>
                  <input type="number" id="nbColors" name="nbColors"
                         min="1" max="3" required>

      |     
                         <input type="checkbox" id="scales" name="scales" onchange="document.getElementById('nbColors').disabled = !this.checked;" >
                         <label for="scales">Se fier aux couleurs du fichier</label>

<hr style=" background-color:#11ffee00;
     color:#11ffee00;
     border:1px;
     width:100px;
     height:10px;">
              (Pour plus de couleurs, veuillez le mentionner dans la partie "Informations Supplémentaires")

<hr>










      <div class="form-group">
    Technique 1 :
(A remplir) 

  <minForm>
  <SELECT name="tech1" size="1" required>
  <OPTION>Broderie
  <OPTION>Sérigraphie
  <OPTION>Flocage

  </SELECT>
  </minForm>


  Emplacement 1 :
    <input type=text name ="emplacement1" id="emplacement1" list=browsers size="30" required>
  <datalist id=browsers >
  <option> Coeur
  <option> Torse (superman)
  <option> Omoplate
  <option> Manche gauche
  <option> Manche droite
  <option> Bas gauche (face)
  <option> Bas droite (face)
  <option> Bas centre (face)
  <option> Bas gauche (dos)
  <option> Bas droite (dos)
  <option> Bas centre (dos)
  <option> Autres (préciser en commentaire)
  </datalist>

  <hr>





  <div class="form-group">
  Technique 2 :
(Facultatif)
  <minForm>
  <SELECT name="tech2" size="1">
  <OPTION>Broderie
  <OPTION>Sérigraphie
  <OPTION>Flocage

  </SELECT>
  </minForm>


    Emplacement 2 :
      <input type=text name ="emplacement2" id="emplacement2" list=browsers size="30" required>
    <datalist id=browsers >
    <option> Coeur
    <option> Torse (superman)
    <option> Omoplate
    <option> Manche gauche
    <option> Manche droite
    <option> Bas gauche (face)
    <option> Bas droite (face)
    <option> Bas centre (face)
    <option> Bas gauche (dos)
    <option> Bas droite (dos)
    <option> Bas centre (dos)
    <option> Autres (préciser en commentaire)
    </datalist>





</div>
              </div>
<hr>


              Uploader un logo :

                <input type="file" id="file" name="file" accept="image/jpg, image/jpeg, image/png, Illustrator File/ai" required>



              <hr>





  <h3 class="mb-5">Informations</h3>

                <div class="form-group">
                  <input type="raison_sociale" name="raison_sociale" class="form-control px-3 py-4" placeholder="Raison Sociale (Facultatif)">
                </div>
              <div class="form-group">
                <input type="nom" name="nom" class="form-control px-3 py-4" placeholder="Nom - Prénom" required >
              </div>
              <div class="form-group">
                <input type="adress" name="address" class="form-control px-3 py-4" placeholder="Adresse"required>
              </div>
              <div class="form-group">
                <input type="cp" name="cp" class="form-control px-3 py-4" placeholder="Code Postal"required>
              </div>
              <div class="form-group">
                <input type="ville" name="ville" class="form-control px-3 py-4" placeholder="Ville"required>
              </div>
              <div class="form-group">
                <input type="email" name="email" class="form-control px-3 py-4" placeholder="Email" required>
              </div>
              <div class="form-group">
                <input type="phoneNumber" name="phoneNumber" class="form-control px-3 py-4" placeholder="Numéro de téléphone" required >
              </div>
              <div class="form-group mb-5">
                Informations Supplémentaires484
                <textarea name="text" class="form-control px-3 py-4" cols="30" rows="10" placeholder="Informations Supplémentaires" required> </textarea>
              </div>


<style>
hr2{

    border:         none;
    border-left:    1px solid hsla(200, 10%, 50%,100);
    height:         100vh;
    width:          1px;
}
</style>
              <div class="form-group">
                <input type="submit" class="btn btn-primary  px-4 py-3" value="Envoyer mon devis">
                <hr2>
                <input type="submit" class="btn btn-secondary  px-4 py-3" formaction="psendReturn.php" value="Continuer ma demande">

              </div>




          </div>
          <div class="col-md-5 pl-md-5">
            <h3 class="mb-5">Vêtement</h3>

            <!--
            <div class="form-group">
Sexe :
<FORM>
<SELECT name="nom" size="1">
<OPTION>Homme
<OPTION>Femme
<OPTION>Non précisé

</SELECT>
</FORM>

</div>

-->
            <img type="submit" name ="vetement" value="azfaezfe" width="200" height="300" src=<?echo "clothes/".$clothes.".jpg" ?> >

            </form>

            <h3 class="mb-5">Informations de contact</h3>
            <ul class="site-contact-details">
              <li>
                <span class="text-uppercase">Email</span>
                cedricpayetbroderie@gmail.com
              </li>
              <li>
                <span class="text-uppercase">Téléphone</span>
                +33 6 51 51 37 81
              </li>
              <li>
                <span class="text-uppercase">Adresse</span>
                112 Route de Launaguet<br>
                31200 Toulouse  <br>
                Occitanie, France
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>


    <footer class="site-footer">
      <div class="container">
        <div class="row mb-3">
          <div class="col-md-12 text-center">
            <p>
              <a href="#" class="social-item"><span class="icon-facebook2"></span></a>

              <a href="#" class="social-item"><span class="icon-instagram2"></span></a>

            </p>
          </div>
        </div>
        <div class="row">
            <p class="col-12 text-center">
            Copyright © <script>document.write(new Date().getFullYear());</script> All rights reserved | Cédric Payet Broderie | Fait avec <i class="icon-heart" aria-hidden="true"></i> par <a href="jawad-baadoud.alwaysdata.net" target="_blank" class="text-primary">Jawad BAADOUD</a>
            </p>
        </div>
      </div>
    </footer>




    <script src="js/vendor/jquery.min.js"></script>
    <script src="js/vendor/popper.min.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>

    <script src="js/vendor/jquery.easing.1.3.js"></script>
    <script src="js/vendor/jquery.stellar.min.js"></script>
    <script src="js/vendor/jquery.waypoints.min.js"></script>

    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
    <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
    <script src="js/custom.js"></script>

    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&amp;sensor=false"></script>
    <script src="js/google-map.js"></script>


</body></html>
