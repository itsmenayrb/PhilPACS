<?php

    require 'Config.php';

    class Attendance extends Config
    {
      public function __construct() {

		      $this->conn = new Config();

	   }


      public function import($file){

            try{

                if(!empty($file)){
                  $file = fopen($file, 'r');
                while ($row = fgetcsv($file)) {
                    $value = "'" . implode("','", $row) ."','unread'";

                    $stmt = $this->conn->runQuery("INSERT INTO attendancetbl(lastName, firstName, Edate, EMTimein, EMTimeout, EATimein, EATimeout, status)
                    VALUES (". $value .")");
                        $stmt->execute();

              }
              ?>
              <script type="text/javascript">
                alert("Successful upload");
              </script>
              <?php
            }
            else {
              ?>
              <script type="text/javascript">
                alert("Make sure that the file is not empty");
              </script>
              <?php
            }

        }catch (PDOException $e) {
      			echo "Connection Error: " . $e->getMessage();
      		}
        }


    public function viewEmployeeDetails(){

            try{

              function hoursandmins($time, $format = '%02d:%02d')
                    {
                        if ($time < 1) {
                            return;
                        }
                        $hours = floor($time / 60);
                        $minutes = ($time % 60);
                        return sprintf($format, $hours, $minutes);
                    }

              $sql = "SELECT * FROM totalhourstbl";
              $result = $this->conn->runQuery($sql);
              $numRows = $result->execute();
              echo "<tbody>";
              if ($numRows > 0) {

                 while ($rows = $result->fetch(PDO::FETCH_ASSOC)) {
                    $lastName = $rows['lastName'];
              echo "
                    <tr>

                      <td>". $rows['firstName'] ."</td>
                      <td>". $rows['lastName'] ."</td>
                      <td>". $rows['dateFrom'] ."</td>
                      <td>". $rows['dateTo'] ."</td>
                      <td>". hoursandmins($rows['totalHours'], '%02d Hours, %02d Minutes') ."</td>
                      <td>
                      <button type= 'button' class ='btn btn-primary viewEmployeeModalBtn' data-lastName='<?=$lastName ?>' data-toggle ='modal' data-target='#viewEmployeeDetail'>
                      <i class ='fa fa-eye'></i></button>
                          </td>
                      ";
                          // code...
                  }
                }
                  echo "
                      </tr>
                      </tbody>
                  ";
                }
          catch (PDOException $e) {
      			echo "Connection Error: " . $e->getMessage();
      		}
      }
      public function viewAllAttendance(){

        try {
          function hoursandmins($time, $format = '%02d:%02d')
                {
                    if ($time < 1) {
                        return;
                    }
                    $hours = floor($time / 60);
                    $minutes = ($time % 60);
                    return sprintf($format, $hours, $minutes);
                }

            $sql = "SELECT * FROM attendancetbl";
            $result = $this->conn->runQuery($sql);
            $numRows = $result->execute();
            echo "<tbody>";
            if ($numRows > 0) {
               while ($rows = $result->fetch(PDO::FETCH_ASSOC)) {
                 $data[] = $rows;
                 $starttime1 = $rows['EMTimein'];
                  $stoptime1 = $rows['EMTimeout'];
                  $diff1 = (strtotime($stoptime1) - strtotime($starttime1));
                  $total1 = $diff1/60;

                  $starttime2 = $rows['EATimein'];
                   $stoptime2 = $rows['EATimeout'];
                   $diff2 = (strtotime($stoptime2) - strtotime($starttime2));
                   $total2 = $diff2/60;
                   $totalhours = ($total2/60) + $total1/60;
                   $totalminutes = ($total2%60) + $total1%60;

                  echo "
                        <tr>
                            <td>". $rows['firstName'] ."</td>
                            <td>". $rows['lastName'] ."</td>
                            <td>". $rows['Edate'] ."</td>
                            <td>". $rows['EMTimein'] ."</td>
                            <td>". $rows['EMTimeout'] ."</td>
                            <td>". $rows['EATimein'] ."</td>
                            <td>". $rows['EATimeout'] ."</td>
                            <td>". hoursandmins($rows['totalMinutes'], '%02d Hours, %02d Minutes') ."</td>
                            ";
                        }
                    }
                 echo "
                   </tr>
               </tbody>";
             } catch (PDOException $e) {
         			echo "Connection Error: " . $e->getMessage();
         		}
         }


      public function viewEmployeeAttendance(){

        try {
              function hoursandmins($time, $format = '%02d:%02d')
                    {
                        if ($time < 1) {
                            return;
                        }
                        $hours = floor($time / 60);
                        $minutes = ($time % 60);
                        return sprintf($format, $hours, $minutes);
                    }

            $sql = "SELECT * FROM attendancetbl WHERE status = 'unread'";
            $result = $this->conn->runQuery($sql);
            $numRows = $result->execute();
            echo "<tbody>";
            if ($numRows > 0) {
               while ($rows = $result->fetch(PDO::FETCH_ASSOC)) {
                    $data[] = $rows;
                    $lastName =$rows['lastName'];
                    $Edate = $rows['Edate'];

                    $starttime1 = $rows['EMTimein'];
                     $stoptime1 = $rows['EMTimeout'];
                     $diff1 = (strtotime($stoptime1) - strtotime($starttime1));
                     $total1 = $diff1/60;

                     $starttime2 = $rows['EATimein'];
                      $stoptime2 = $rows['EATimeout'];
                      $diff2 = (strtotime($stoptime2) - strtotime($starttime2));
                      $total2 = $diff2/60;
                      $totalhours = $total1/60 + $total2/60;
                      $totalminutes = floor($total1%60 + ($total2%60));
                      $total = "";


                    if ($totalminutes >= 60) {
                      $totalhours1 = $totalhours ++;
                    $totalminutes1 = $totalminutes - 60;

                    }
                    else {
                      $totalhours1 = $totalhours;
                      $totalminutes1 = $totalminutes;
                    }
                    $total  = ($totalhours1*60);

                        $stmt = $this->conn->runQuery("UPDATE attendancetbl SET totalMinutes = '$total' WHERE lastName = '$lastName' AND Edate = '$Edate'");
                            $stmt->execute();

                  echo "
                        <tr>
                            <td>". $rows['firstName'] ."</td>
                            <td>". $rows['lastName'] ."</td>
                            <td>". $rows['Edate'] ."</td>
                            <td>". $rows['EMTimein'] ."</td>
                            <td>". $rows['EMTimeout'] ."</td>
                            <td>". $rows['EATimein'] ."</td>
                            <td>". $rows['EATimeout'] ."</td>
                            <td>". hoursandmins($total, '%02d Hours, %02d Minutes') ."</td>
                            ";
                        }
                    }
                 echo "
                   </tr>
               </tbody>";
             } catch (PDOException $e) {
         			echo "Connection Error: " . $e->getMessage();
         		}
         }
         public function generateAll($dateFrom,$dateTo){

            try {

              $sql = "SELECT DISTINCT SUM(totalMinutes) AS totalMinutes, lastName, firstName, status FROM attendancetbl WHERE status = 'unread' GROUP BY lastName";
              $result = $this->conn->runQuery($sql);
              $numRows = $result->execute();

              if ($numRows > 0) {
                while ($rows = $result->fetch(PDO::FETCH_ASSOC)) {

                  $firstName = $rows['firstName'];
                  $lastName = $rows['lastName'];
                  $totalHours =  $rows['totalMinutes'];

                  $stmt = $this->conn->runQuery("INSERT INTO totalhourstbl(firstName, lastName, dateFrom, dateTo, totalHours)
                  VALUES (:firstName, :lastName, :dateFrom, :dateTo, :totalHours)");

                  $stmt->bindparam(":firstName", $firstName);
                  $stmt->bindparam(":lastName", $lastName);
                  $stmt->bindparam(":dateFrom", $dateFrom);
                  $stmt->bindparam(":dateTo", $dateTo);
                  $stmt->bindparam(":totalHours", $totalHours);
                  $stmt->execute();
                  $status = 'read';

                  $stmt = $this->conn->runQuery("UPDATE attendancetbl SET status = '$status'");
                      $stmt->execute();
                }
              }else {
              ?>
              <script type="text/javascript">
                alert("Sorry no attendance to generate");
              </script>
              <?php
            }
            } catch (PDOException $e) {
             echo "Connection Error: " . $e->getMessage();
          }
      }
          public function EmployeeAttendance($lastName){

            try {

              function hoursandmins($time, $format = '%02d:%02d')
                    {
                        if ($time < 1) {
                            return;
                        }
                        $hours = floor($time / 60);
                        $minutes = ($time % 60);
                        return sprintf($format, $hours, $minutes);
                    }

                $sql = "SELECT * FROM attendancetbl WHERE lastName =:lastName";
                $result = $this->conn->runQuery($sql);
                $result->execute(array(":lastName"=>$lastName));
                 while ($rows = $result->fetch(PDO::FETCH_ASSOC));

                 } catch (PDOException $e) {
                  echo "Connection Error: " . $e->getMessage();
                }
              }
}
