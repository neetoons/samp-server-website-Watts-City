<?php

$ip_servidor = "74.91.123.162";
$puerto_servidor = 2233;

function MostrarServer()
{
	$serverIP = "74.91.123.162";
	$serverPort = 2233;
	
	try
	{
			$rQuery = new QueryServer( $serverIP, $serverPort );
	
			$aInformation  = $rQuery->GetInfo( );
			$aServerRules  = $rQuery->GetRules( );
			$aBasicPlayer  = $rQuery->GetPlayers( );
			$aTotalPlayers = $rQuery->GetDetailedPlayers( );
	
			$rQuery->Close( );
	}
	catch (QueryServerException $pError)
	{
		   echo 'Servidor Offline';
	}
	
	if(isset($aInformation) && is_array($aInformation)){
	?>
		<b>General Information</b>
		<table width="400">
				<tr>
						<td>Nombre Servidor:</td>
						<td><?php echo htmlentities($aInformation['Hostname']); ?></td>
				</tr>
				<tr>
						<td>Modo de Juego:</td>
						<td><?php echo htmlentities($aInformation['Gamemode']); ?></td>
				</tr>
				<tr>
						<td>Jugadores:</td>
						<td><?php echo $aInformation['Players']; ?> / <?php echo $aInformation['MaxPlayers']; ?></td>
				</tr>
				<tr>
						<td>Mapa:</td>
						<td><?php echo htmlentities($aInformation['Map']); ?></td>
				</tr>
				<tr>
						<td>Clima:</td>
						<td><?php echo $aServerRules['weather']; ?></td>
				</tr>
				<tr>
						<td>Hora:</td>
						<td><?php echo $aServerRules['worldtime']; ?></td>
				</tr>
				<tr>
						<td>Version SA-MP:</td>
						<td><?php echo $aServerRules['version']; ?></td>
				</tr>
				<tr>
						<td>Contra:</td>
						<td><?php echo $aInformation['Password'] ? 'Si' : 'No'; ?></td>
				</tr>
		</table>
	
		<br />
		<b>Online Players</b>
		<?php
		if(!is_array($aTotalPlayers) || count($aTotalPlayers) == 0){
				echo '<br /><i>Sin Jugadores</i>';
		} else {
		?>
			<table width="400">
					<tr>
							<td><b>Id Jugador</b></td>
							<td><b>Nombre</b></td>
							<td><b>Puntos</b></td>
							<td><b>Latencia</b></td>
					</tr>
			<?php
			foreach($aTotalPlayers AS $id => $value){
			?>
					<tr>
							<td><?php echo $value['PlayerID']; ?></td>
							<td><?php echo htmlentities($value['Nickname']); ?></td>
							<td><?php echo $value['Score']; ?></td>
							<td><?php echo $value['Ping']; ?></td>
					</tr>
			<?php
			}
		
			echo '</table>';
		}
	}
}

?>