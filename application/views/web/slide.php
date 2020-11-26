<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="margin-top:50px;">
  <!-- Indicators -->
  <ol class="carousel-indicators">
  	<?php
	$i = 0;
	foreach ($v_slide->result() as $baris)
	{
		if ($i == 0){
			echo'
			<li data-target="#carousel-example-generic" data-slide-to="'.$i.'" class="active"></li>
			';
		}else{
			echo'
			<li data-target="#carousel-example-generic" data-slide-to="'.$i.'"></li>
			';
		}
		$i++;
	}
	?>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
  <?php
  	$j = 0;
	foreach ($v_slide->result() as $baris)
	{

		if ($j == 0){
		echo'
		<div class="item active">
		  <img src="'.$baris->foto.'" alt="..." style="height:400px;width:100%;">
		  <div class="carousel-caption">
			'.$baris->judul.'
		  </div>
		</div>';
		}else{
		echo'
		<div class="item">
		  <img src="'.$baris->foto.'" alt="..." style="height:400px;width:100%;">
		  <div class="carousel-caption">
			'.$baris->judul.'
		  </div>
		</div>';
		}
		$j++;
	}
  ?>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
	<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	<span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
	<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	<span class="sr-only">Next</span>
  </a>
</div>
