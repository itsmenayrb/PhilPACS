<?php
/**
 * This page will responsible for communicating with the Database
 */
require_once 'Config.php';

class Attendance extends Config {

	public function __construct() {

		$this->conn = new Config();

	}

	public function populateAttendance($firstName, $lastName, $hashedFile) {
		try {
			$stmt = $this->conn->runQuery("SELECT * FROM attendancetbl WHERE firstName=:firstName AND lastName=:lastName AND hashedFile=:hashedFile ORDER BY Edate");
			$stmt->execute(array(":firstName" => $firstName, ":lastName" => $lastName, ":hashedFile" => $hashedFile));

			?>
			<div class='table-responsive'>
                <table class='table table-sm card-table table-vcenter table-hover table-bordered table-hover text-nowrap datatable' id="personalAttendanceTable">
                    <thead>
                        <tr>
                        	<th>Date</th>
                        	<th colspan="2" class="text-center">Full Name</th>
							<th colspan="2" class="text-center">AM</th>
							<th colspan="2" class="text-center">PM</th>
                        </tr>
                        <tr>
                        	<th></th>
                        	<th>Last Name</th>
                        	<th>First Name</th>
                        	<th>Time In</th>
                        	<th>Time Out</th>
                        	<th>Time In</th>
                        	<th>Time Out</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php
							while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
								$date = strtotime($row['Edate']);
								$date = date('F j, Y', $date);
								?>
	                            <tr>
	                            	<?php if ($this->isWeekend($date) == true) { ?>
	                            		<td></td>
	                            	<?php } else { ?>
	                            		<td><?=$date;?></td>
	                            	<?php } ?>
	                            	<td><?=$row['lastName'];?></td>
	                            	<td><?=$row['firstName'];?></td>
	                            	<td><?=$row['EMTimein'];?></td>
	                            	<td><?=$row['EMTimeout'];?></td>
	                            	<td><?=$row['EATimein'];?></td>
	                            	<td><?=$row['EATimeout'];?></td>
	                            </tr>
	                            <?php
	                        }
	                    ?>
                    </tbody>
                </table>
            </div>
            <script type="text/javascript">
            	require(['datatables', 'jquery'], function(datatable, $) {
                	$('#personalAttendanceTable').DataTable();
            	});
            </script>
				<?php
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}
	}

	public function isWeekend($date) {
		return (date('N', strtotime($date)) >= 6);
	}
}