<?php
get_header();
$sImageUrl = get_template_directory_uri().'/img/background.jpg';
echo '<header class="masthead" style="background-image: url('.$sImageUrl.')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Achillies Gym</h1>
              <span class="subheading">Mjesto na kojem možete odraditi siguran i ugodan trening te na taj način ostati aktivni i jačati svoj imunitet u borbi protiv virusa.</span>
            </div>
          </div>
        </div>
      </div>
</header>';
?>

<?php
echo '<h2 class="zanimljivosti">Zanimljivosti!</h2>
<div class="zastonaskartice">
  <div class="card">
    <img class="card-img-top" src="http://localhost/achilles_gym/slika1.png" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title">5 ways to relieve stress</h5>
        <p class="card-text">The past year has confronted us with many situations we may not have even thought about. We faced a pandemic…</p>
    </div>
  </div>

  <div class="card">
    <img class="card-img-top" src="http://localhost/achilles_gym/slika2.jpg" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title">How to follow through on resolution to exercise?</h5>
        <p class="card-text">At the end of each year, we make a summary of the personal achievements that marked our year. As the…</p>
    </div>
  </div>

  <div class="card">
    <img class="card-img-top" src="http://localhost/achilles_gym/slika3.jpg" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title">Fitness Christmas</h5>
        <p class="card-text">This year was special and specific in many fields. We wished for a year of change, and if we can…</p>
    </div>
  </div>

  <div class="card">
    <img class="card-img-top" src="http://localhost/achilles_gym/slika4.jpg" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title">Notice on online trainings</h5>
        <p class="card-text">Dear members, our online trainings end on Friday, December 18, 2020, but that doesn’t mean you can stop training! All…</p>
    </div>
  </div>
</div>

<div class="coronadiv">
  <img src="http://localhost/achilles_gym/corona.png" />
  <p>Dobro došli u ACHILLES GYM mjesto na kojem možete odraditi siguran i ugodan trening te na taj način ostati aktivni i jačati svoj imunitet u borbi protiv virusa.</p>
  <p>Što ACHILLES GYM čini za vaš siguran trening?</p>
</div>

<h2 class="zanimljivosti">KOJI JE TVOJ CILJ?</h2>
<div class="cilj">
  <div class="kartica">
    <img src="http://localhost/achilles_gym/vaga.png" />
    <h3>MRŠAVLJENJE</h3>
    <p>Riješi se viška kilograma uz naš</p>
    <p>vrhunski program. Izgubi nezadovoljstvo</p>
    <p>i zadobi osmijeh na licu.</p>
  </div>

  <div class="kartica">
    <img src="http://localhost/achilles_gym/apple.png" />
    <h3>POSTATI FIT</h3>
    <p>Popravi svoj izgled i postani fit, nakon</p>
    <p>čega ćeš se osjećati bolje, pun</p>
    <p>samopouzdanja i energije.</p>
  </div>

  <div class="kartica">
    <img src="http://localhost/achilles_gym/meditation.png" />
    <h3>RJEŠITI SE STRESA</h3>
    <p>Lista pozitivne veze tjelovježbe i</p>
    <p>psihičkog zdravlja je neiscrpna. Stoga</p>
    <p>valja se samo odvažiti i krenuti.</p>
  </div>
  
</div>

';
?>

<?php
get_footer();
?>
