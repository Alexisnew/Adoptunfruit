<article>
<div class="Tableau1">
	<p class="legende">
		<span class="img">Description</span>
		<span class="prix">Prix</span>
		<span class="aj">Ajouter</span>
	</p>
	</div>

<?php $ads = $DB-> query1('SELECT * FROM ads');?> 
<?php foreach ( $ads as $ad) :?>
	

<div class="Tableau">
<p class="legende">
	
	<span  class="pict">	<img src=" <?= $ad->name;?>.jpg"><?=$ad->name?></span>
	<span class="price"> <?= number_format( $ad->price,2,',',' '); ?> € </span>
	<span class="add"><a  href="addpanier.php?id=<?= $ad->id;?>"><img src="images/panier.png"></a></span>
	</p>
<?php  endforeach; ?>

</article>


<section>  
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
 
<script type="text/javascript">
   $(function(){
      setInterval(function(){
         $(".slideshow ul").animate({marginLeft:-158},800,function(){
            $(this).css({marginLeft:0}).find("li:last").after($(this).find("li:first"));
         })
      }, 3500);
   });
</script>




<div class="slideshow">
	<ul>
	<?php $ads = $DB-> query1('SELECT * FROM ads');?>
	<?php foreach ( $ads as $ad) :?>
		<li><img src="<?= $ad->name;?>.jpg" alt="" width="138" height="118"><a  href="addpanier.php?id=<?= $ad->id;?>"> <?=$ad->name?></a></li>
	<?php endforeach ; ?>
	</ul>
</div>







