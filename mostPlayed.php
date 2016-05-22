<!DOCTYPE html>
<html lang="en-US">

<?php require 'header.php'; ?>

	<body>
		<?php require 'navbar.html'; ?>
		<script>$("#mostPlayed").addClass("active");</script>

        <!-- start content -->
   
        <div id="section1">
            <h2 class="resizer" style="margin-bottom:-20px; padding-top:50px;">BEATS 1 TRACKER</h2>
            <br>
            <p class="resizer" style="text-align:center;">
    			By: EXZACKLY7
            </p>
    
        </div>
        <div id="section2">
            <h2 class="resizer" style="margin-bottom:padding-top:50px;">MOST PLAYED</h2>
            <br>
            <?php
				require_once("dbconn.php");

				$sql = "SELECT id, title, artist, album, artwork, playCount FROM Songs ORDER BY playCount DESC LIMIT 10";
				$resultArray = array();
				$result = executeSQL($conn, $sql);
				while($row = $result->fetch_array(MYSQL_ASSOC)) {
					$resultArray[] = $row;
				}
				echo '<table class="resizer"><tr><td width="37%">';
				echo '<img src="' . $resultArray[0]['artwork'] . '" alt="' . $resultArray[0]['title'] . '" height="250" width="250" align="right">' . "</td>";
				echo '<td width="63%"><p class="resizer" style="font-size:3vmin; text-align:left;">';
					echo $resultArray[0]['title'] . "<br><br>";
					echo $resultArray[0]['artist']. "<br><br>";
					echo $resultArray[0]['album'] . "<br><br>";
					echo "Played " . $resultArray[0]['playCount'] . " times" . "</td>";
				echo '</p></tr></table>';
			?>
			<br>
        </div>
        <div id="section3">
            <h2 class="resizer" style="margin-bottom:padding-top:50px;">OTHER TOP PLAYED</h2>
			<?php
				array_shift($resultArray);
				echo '<table class="resizer">';
				foreach ($resultArray as $row) {
					echo '<tr><td width="37%" style="padding-top:30px;"><img src="' . $row['artwork'] . '" alt="' . $row['title'] . '" height="250" width="250" align="right">' . "</td>";
					echo '<td width="63%"><p class="resizer" style="font-size:3vmin; text-align:left;">';
						echo $row['title'] . "<br><br>";
						echo $row['artist']. "<br><br>";
						echo $row['album'] . "<br><br>";
						echo "Played " . $row['playCount'] . " times" . "</td>";
						echo "</p></tr>";
				}
				echo '</table><br>';
			?>
        </div>
        <div id="section4">
            <p class="resizer" style="text-align:center;">
				Beats 1 Tracker<br>
				© Copyright 2016 EXZACKLY7. All Rights Reserved.
			</p>
        </div>
        
        <!-- end content -->

		</body>
</html>
