<?php 
	$data = file_get_contents('https://api.kawalcorona.com/indonesia');
	$indonesia = json_decode($data, true);
	$ind = $indonesia[0];

	$g_positif = file_get_contents('https://api.kawalcorona.com/positif');
	$d_positif = json_decode($g_positif, true);
	$positif = $d_positif;

	$g_sembuh = file_get_contents('https://api.kawalcorona.com/sembuh');
	$d_sembuh = json_decode($g_sembuh, true);
	$sembuh = $d_sembuh;

	$g_meninggal = file_get_contents('https://api.kawalcorona.com/meninggal');
	$d_meninggal = json_decode($g_meninggal, true);
	$meninggal = $d_meninggal;

	$data_prov = file_get_contents('https://api.kawalcorona.com/indonesia/provinsi');
	$d_prov = json_decode($data_prov, true);
	$provinsi = $d_prov;

	$data_g = file_get_contents('https://api.kawalcorona.com/');
	$d_g = json_decode($data_g, true);
	$global = $d_g;
?>

<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/png" href="img/favicon.png">
    <title>Monitor COVID 19</title>

    <style>
    	
    	body{
    		background-color: #eee;
    		font-family: 'Poppins', sans-serif;    		
    	}		

    	.my-custom-scrollbar {
			position: relative;
			height: 350px;
			overflow: auto;
			}
		.table-wrapper-scroll-y {
			display: block;
		}

    </style>

  </head>
  <body>

		<nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
			<div class="container">
				<a class="navbar-brand mx-auto" href="#">
					<img src="img/atp.png" width="230">
				</a>
		  </div>
		</nav>
		
		<div class="container" style="margin-top: 130px;">
			<div class="row">
				<div class="col text-center">
					<h1>Monitor Corona Virus</h1>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col text-center">
					<p style="font-size: 20px">Real Time Data Corona Virus in Indonesia and the World</p>
				</div>
			</div>
		</div>	   

		<div class="container">
			<div class="row" style="margin-top: 65px;">
				<div class="col-md-3 text-center">
					<div class="card text-white bg-secondary mb-3 mx-auto shadow" style="max-width: 18rem;">
					  <div class="card-header">Total Positive</div>
					  <div class="card-body">
						<img src="img/sad.svg" width="100">
				    	<p class="card-text mt-5" id="positif"><?= $positif['value']; ?> People</p>
					  </div>
					</div>
				</div>
				<div class="col-md-3 text-center">
					<div class="card text-white bg-danger mb-3 mx-auto shadow" style="max-width: 18rem;">
					  <div class="card-header">Total Deaths</div>
					  <div class="card-body">
					  	<img src="img/cry.svg" width="100">
				    	<p class="card-text mt-5" id="meninggal"><?= $meninggal['value']; ?> People</p>
					  </div>
					</div>
				</div>
				<div class="col-md-3 text-center">
					<div class="card text-white bg-success mb-3 mx-auto shadow" style="max-width: 18rem;">
					  <div class="card-header">Total Recovered</div>
					  <div class="card-body">
					  	<img src="img/happy.svg" width="100">
				    	<p class="card-text mt-5" id="sembuh"><?= $sembuh['value']; ?> People</p>
					  </div>
					</div>
				</div>
				
				<div class="col-md-3 text-center">
					<div class="card text-white bg-dark mb-3 mx-auto shadow" style="max-width: 18rem;">
					  <div class="card-header">Case in Indonesia</div>
					  <div class="card-body">					  	
						<img src="img/indonesia.svg" width="100">
					    <p class="card-text mt-4" id="indonesia"><?= $ind['positif'] ?> Positive, <?= $ind['sembuh'] ?> Recovered, <?= $ind['meninggal'] ?> Deaths</p>
					  </div>
					</div>				
				</div>
			</div>
		</div>

		<div class="container bg-white shadow mt-5">			
			<div class="table-responsive">
				<p class="mt-4">Data by Province :</p>
				<div class="table-wrapper-scroll-y my-custom-scrollbar mb-5">
			  		<table class="table table-bordered text-center mt-3" >
					  <thead>
					    <tr>
					      <th scope="col">No</th>
					      <th scope="col">Province</th>
					      <th scope="col">Positive</th>
					      <th scope="col">Recovered</th>
					      <th scope="col">Deaths</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php $i=1; foreach ($provinsi as $prov) : ?>
					    <tr>
					      <th scope="row"><?= $i++; ?></th>
					      <td><?= $prov['attributes']['Provinsi']; ?></td>
					      <td><?= $prov['attributes']['Kasus_Posi']; ?></td>
					      <td><?= $prov['attributes']['Kasus_Semb']; ?></td>
					      <td><?= $prov['attributes']['Kasus_Meni']; ?></td>
					    </tr>
						<?php endforeach; ?>
					  </tbody>
				</table>			
				</div>		
			</div>
		</div>		

		<div class="container bg-white shadow mt-5">			
			<div class="table-responsive">
				<p class="mt-4">Data by Global :</p>
				<div class="table-wrapper-scroll-y my-custom-scrollbar mb-5">
			  		<table class="table table-bordered text-center mt-3" >
					  <thead>
					    <tr>
					      <th scope="col">No</th>
					      <th scope="col">Country</th>
					      <th scope="col">Positive</th>
					      <th scope="col">Recovered</th>
					      <th scope="col">Deaths</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php $i=1; foreach ($global as $gbl) : ?>
					    <tr>
					      <th scope="row"><?= $i++; ?></th>
					      <td><?= $gbl['attributes']['Country_Region']; ?></td>
					      <td><?= $gbl['attributes']['Confirmed']; ?></td>
					      <td><?= $gbl['attributes']['Recovered']; ?></td>
					      <td><?= $gbl['attributes']['Deaths']; ?></td>
					    </tr>
						<?php endforeach; ?>
					  </tbody>
				</table>			
				</div>		
			</div>
		</div>

		<footer class="text-white bg-dark">
		    <div class="container">
		      <div class="row mt-5 pt-4 pb-4">
		        <div class="col-md-12 text-center">
		        	<p class="mb-1">API from :<a href="http://kawalcorona.com/api" class="btn btn-sm btn-outline-success ml-2">Kawal Korona</a></p> <br> 
		          <i class="fa fa-copyright"></i> Copyright 2020 - Build with <i class="fa fa-heart"></i> by Aldi Tegar Prakoso.
		        </div>
		      </div>
		    </div>
		</footer>



    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="script.js"></script>
  </body>
</html>