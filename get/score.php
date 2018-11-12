<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Premier League</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</head>

<body>
<div class="table-responsive">
  <table class="table table-striped">
	<caption>Premier League - Table</caption>
    <thead class="thead-dark">
		<tr>
			
			<th><abbr title="Position">Pos</abbr></th>
			<th>Team</th>
			<th><abbr title="Played">Pld</abbr></th>
			<th><abbr title="Won">W</abbr></th>
			<th><abbr title="Drawn">D</abbr></th>
			<th><abbr title="Lost">L</abbr></th>
			<th><abbr title="Pts">Pts</abbr></th>
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
				<td><?php print ($position); ?></td> 
				<?php $team=$standings['team']['name']; ?>
				<td><?php print ($team)?></td>		
				<?php $play=$standings['playedGames']; ?>
				<td><?php print ($play)?></td>	
				<?php $won=$standings['won']; ?>
				<td><?php print ($won)?></td>
				<?php $draw=$standings['draw']; ?>
				<td><?php print ($draw)?></td>		
				<?php $lost=$standings['lost']; ?>
				<td><?php print ($lost)?></td>
				<?php $points=$standings['points']; ?>
				<td><?php print ($points)?></td>		
			</tr>		
			<?php }?>
			
			

		

			
			
    
			
    </tbody>
  </table>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>