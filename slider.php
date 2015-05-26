<?php require'header.php' ; ?>

</head>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
 
<script type="text/javascript">
   $(function(){
      setInterval(function(){
         $(".slideshow ul").animate({marginLeft:-350},800,function(){
            $(this).css({marginLeft:0}).find("li:last").after($(this).find("li:first"));
         })
      }, 3500);
   });
</script>




<div class="slideshow">
	<ul>
	<?php $ads = $DB-> query1('SELECT * FROM ads');?>
	<?php foreach ( $ads as $ad) :?>
		<li><img src="<?= $ad->name;?>.jpg" alt="" width="350" height="200"> <?=$ad->name?></li>
	<?php endforeach ; ?>
	</ul>
</div>



