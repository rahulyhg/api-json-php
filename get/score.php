<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


</head>

<body>
  <table class="table">
    <thead class="thead-dark">
      <tr>
	
        <th scope="col">TEAM</th>
        <th scope="col">P</th>
        <th scope="col">W</th>
        <th scope="col">D</th>
        <th scope="col">L</th>
        <th scope="col">Pts</th>
      </tr>
    </thead>
    <tbody>
		<?php
			$uri = 'http://api.football-data.org/v2/competitions/2021/standings';
			$reqPrefs['http']['method'] = 'GET';
			$reqPrefs['http']['header'] = 'X-Auth-Token: 9cbd013965a74aef92e31036f373b979';
			$stream_context = stream_context_create($reqPrefs);
			$data = file_get_contents($uri, false, $stream_context);
			$json_arr = json_decode($data,true); ?>
			<tr>
			<?php foreach($json_arr['standings'][0]['table'] as $standings){?>
			
				<?php $position=$standings['position'];?>
				<td><?php print ($position);?></td>
			</tr>
			<?php }?>
			
			<tr>
			<?php
			foreach($json_arr['standings'][0]['table'] as $standings) {?>
			
				<?php $team=$standings['team']['name']; ?>
				<td><?php print ($team)?></td>		
			</tr>
			<?php }?>
			
    </tbody>
  </table>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>