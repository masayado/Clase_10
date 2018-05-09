<?php include('header.php');?>

<?php
$csv = array_map('str_getcsv', file('https://raw.githubusercontent.com/masayado/Clase_10/master/data/Series-netflix.csv'));
      array_walk($csv, function(&$a) use ($csv) {
      $a = array_combine($csv[0], $a);
      });
      array_shift($csv);
?>

<main role="main" class="container">
<h1 class="mb-4">Lista de series disponibles en Netflix</h1>
<div class="row">

<?php for($t = 0; $t < count($csv); $t++){?>
    <div class="col-sm-4 py-3">
    <h4 class="border-top pt-3"><?php print($csv[$t]['serie'])?> (<?php print($csv[$t]['year'])?>)</h4>
    
    <figure style="height:120px; overflow:hidden;">
    
    <img src="
    <?php if ($csv[$t]['img'] == NULL){
        print ("img/gris.png");
    } else {
        print ($csv[$t]['img']);
    };?>" 

    class="img-fluid">
    </figure>

    <?php if ($csv[$t]['name'] == NULL){
        print '<h5><a href="'.($csv[$t]['url']).'">'.($csv[$t]['location']).'</a></h5>';
    } else {
        print '<h5><a href="'.($csv[$t]['url']).'">'.($csv[$t]['name']).'</a></h5>';
    }?>

    <p><center><?php print($csv[$t]['genero'])?></center> <b>Temporadas:</b> <?php print($csv[$t]['temporadas'])?><br><b>Episodios:</b> <?php print($csv[$t]['episodios'])?><br><b>Creador:</b> <?php print($csv[$t]['creador'])?></p>

    </div>
<?php };?>
</div>

</main>
<?php include('footer.php');?>