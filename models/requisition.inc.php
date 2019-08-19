<?php

  require 'Config.php';

  class Request extends Config
  {
    public function __construct() {

        $this->conn = new Config();

   }

   public function RequestFrom($RequestType, $lastName, $TypeRequest, $DateFrom, $DateTo, $Reason){

     try {


       if ($RequestType == 'OverTime Request') {
         $TypeRequest = 'None';
         $TimeFrom =date("H:i", strtotime("$DateFrom"));
         $TimeTo =date("H:i", strtotime("$DateTo"));
         $DateFrom = date("Y-m-d $TimeFrom");
         $DateTo = date("Y-m-d $TimeTo");
       }
       $DateFrom = date("$DateFrom");
       $DateTo = date("$DateTo");

       $sql = "SELECT firstName, lastName FROM personaldetailstbl WHERE lastName = '$lastName'";
       $result = $this->conn->runQuery($sql);
       $numRows = $result->execute();
       $rows = $result->fetch(PDO::FETCH_ASSOC);

       $firstName = $rows['firstName'];

      $DateRequest = date("Y-m-d H:i:s");
       $status = 'pending';
       $stmt = $this->conn->runQuery("INSERT INTO requestformtbl(RequestType, firstName, lastName, Request, DateFrom, DateTo, Reason, DateRequest, status)
       VALUES (:RequestType, :firstName, :lastName, :TypeRequest, :DateFrom, :DateTo, :Reason, :DateRequest, :status)");

       $stmt->bindparam(":RequestType", $RequestType);
       $stmt->bindparam(":firstName", $firstName);
       $stmt->bindparam(":lastName", $lastName);
       $stmt->bindparam(":TypeRequest", $TypeRequest);
       $stmt->bindparam(":DateFrom", $DateFrom);
       $stmt->bindparam(":DateTo", $DateTo);
       $stmt->bindparam(":Reason", $Reason);
       $stmt->bindparam(":DateRequest", $DateRequest);
       $stmt->bindparam(":status", $status);
       $stmt->execute();
       return $stmt;
     }catch (PDOException $e) {
      echo "Connection Error: " . $e->getMessage();
   }

   }
   public function viewRequestForm(){
     try {

         $sql = "SELECT RequestType, lastName, Request, DateRequest, DateFrom, DateTo, Reason, requestID FROM requestformtbl WHERE status = 'pending'";
         $rows = $this->conn->runQuery($sql);
         $numRows = $rows->execute();
        $result = $rows->fetchAll(PDO::FETCH_ASSOC);

          } catch (PDOException $e) {
           echo "Connection Error: " . $e->getMessage();
         }
         if (! empty($result)) {
            return $result;
        }
      }
      public function ApprovedList($requestID){
        try {
          $stmt = $this->conn->runQuery("UPDATE requestformtbl SET status ='approved' WHERE requestID =:requestID");
          $stmt->bindparam(":requestID", $requestID);
          $stmt->execute();
          return $stmt;
        } catch (PDOException $e) {
         echo "Connection Error: " . $e->getMessage();
       }

      }
      public function DeclinedList($requestID){
        try {
          $stmt = $this->conn->runQuery("UPDATE requestformtbl SET status ='declined' WHERE requestID =:requestID");
          $stmt->bindparam(":requestID", $requestID);
          $stmt->execute();
          return $stmt;
        } catch (PDOException $e) {
         echo "Connection Error: " . $e->getMessage();
       }

      }

      public function readForm($requestID){

        try {

            $sql = "SELECT RequestType, firstName, lastName, Request,
             DateFrom, DateTo, Reason, requestID, status
             FROM requestformtbl WHERE requestID = '$requestID'";
            $result = $this->conn->runQuery($sql);
            $numRows = $result->execute();

            while($rows = $result->fetch(PDO::FETCH_ASSOC)){
              $requestID = $rows['requestID'];

              echo "
              <div class='card'>
                  <div class='card-body'>
                    <form class='m-t-40' method ='POST'>
                      <div class='tab-content tabcontent-border p-2'>
                          <div class='tab-pane active'role='tabpanel'>
                              <div class='p-3'>
                                  <div class='container'>
                                    </div>
                                      <div class='row'>
                                              <div class='col-md-4 col-xs-12'>
                                            <div class='form-group'>
                                              <label class='form-control-label'>RequestType</label>
                                              <input type='text' class='required form-control' value='". $rows['RequestType'] ."' name='RequestType' id='RequestType' placeholder='Request Type' disabled/>

                                            </div>
                                        </div>
                                          <div class='col-md-4 col-xs-12'>
                                              <div class='form-group'>
                                                   <label class='form-control-label'>First Name</label>
                                                   <input type='text' class='required form-control' value='". $rows['firstName'] ."' name='firstName' id='firstname' placeholder='First Name' disabled/>

                                              </div>
                                          </div>

                                          <div class='col-md-4 col-xs-12'>
                                              <div class='form-group'>
                                                   <label class='form-control-label'>Last Name</label>
                                                   <input type='text' class='form-control required' value='". $rows['lastName'] ."' name='lastName' id='lastname' disabled/>

                                              </div>
                                          </div>
                                      </div>

                                      <div class='row'>
                                          <div class='col-md-12 col-xs-12'>
                                              <div class='custom-control custom-radio'>
                                                <label class='form-control-label'>Request type</label>
                                                <input type='text' class='form-control' name='Request' value='". $rows['Request'] ."' id='Request' placeholder='Request' disabled/>

                                              </div>

                                          </div>

                                      </div>
                                      ";
                                      if ($rows['RequestType'] == 'OverTime Request') {
                                        $DateFrom =  date('h:i A', strtotime($rows['DateFrom']));
                                        $DateTo =  date('h:i A', strtotime($rows['DateTo']));

                                        echo "
                                        <div class='row'>
                                            <div class='col-md-6 col-xs-12'>
                                                <div class='form-group'>
                                                     <label class='form-control-label'>From</label>
                                                     <input type='text' class='required form-control' value='". $DateFrom ."' name='DateFrom' id='DataFrom' disabled/>

                                                </div>
                                            </div>
                                            <div class='col-md-6 col-xs-12'>
                                                <div class='form-group'>
                                                     <label class='form-control-label'>To</label>
                                                     <input type='text' class='required form-control' value='". $DateTo ."' name='DateTo' id='DataTo' disabled/>

                                                </div>
                                            </div>
                                        </div>
                                        ";

                                      }

                                      else{
                                        $DateFrom =  date('Y-m-d', strtotime($rows['DateFrom']));
                                        $DateTo =  date('Y-m-d', strtotime($rows['DateTo']));

                                      echo "
                                      <div class='row'>
                                          <div class='col-md-6 col-xs-12'>
                                              <div class='form-group'>
                                                   <label class='form-control-label'>Date From</label>
                                                   <input type='text' class='required form-control' value='". $DateFrom ."' name='DateFrom' id='DataFrom' disabled/>

                                              </div>
                                          </div>
                                          <div class='col-md-6 col-xs-12'>
                                              <div class='form-group'>
                                                   <label class='form-control-label'>Date To</label>
                                                   <input type='text' class='required form-control' value='". $DateTo ."' name='DateTo' id='DataTo' disabled/>

                                              </div>
                                          </div>
                                      </div>
                                      ";
                                    }
                                      echo "
                                      <div class='form-group'>
                                           <label class='form-control-label'>Reason</label>
                                           <textarea class='form-control require'rows='4' cols='50' placeholder='". $rows['Reason'] ."' name='Reason' id='Reason' disabled/></textarea>

                                      </div>
                                      <input type='text' name='requestID' id='requestid' value='". $requestID ."' hidden='true'/>

                                      <div class='text-right'>
                                      ";
                                      ?>
                                      <?php if ($rows['status'] == 'pending'): ?>
                                        <button class="btn btn-success" type="submit" id='approved'>Approved</button>
                                        <button class='btn btn-danger' type='submit' id='declined'>Declined</button>

                                      <?php endif; ?>
                                      <?php
                                      echo "
                                      </div>

                                  </div>
                              </div>
                          </div>
                    </form>
                  </div>
                </div>
              ";
            }
        } catch (PDOException $e) {
         echo "Connection Error: " . $e->getMessage();
       }
      }
      public function viewApprovedForm(){

        try {

          $status ='approved';
           $sql = "SELECT personaldetailstbl.photo AS profilePicture,
                                       personaldetailstbl.lastName, requestformtbl.lastName,
                                       requestformtbl.firstName, requestformtbl.Request,
                                       requestformtbl.DateRequest, requestformtbl.RequestType,
                                       requestformtbl.DateFrom, requestformtbl.DateTo, requestformtbl.Reason,
                                       requestformtbl.requestID
                                        FROM personaldetailstbl INNER JOIN requestformtbl
                                        ON requestformtbl.lastName = personaldetailstbl.lastName
                                      WHERE requestformtbl.status=:status";
           $result = $this->conn->runQuery($sql);
           $numRows = $result->execute(array(":status" => $status));
           echo "<tbody>";
           if ($numRows > 0) {
              while ($rows = $result->fetch(PDO::FETCH_ASSOC)) {
                $profilePicture = $rows['profilePicture'];
                $requestID = $rows['requestID'];
                $DateRequest =  date('Y-m-d h:i A', strtotime($rows['DateRequest']));

                if ($rows['RequestType'] == 'Absent Request') {
                  $DateFrom =  date('Y-m-d', strtotime($rows['DateFrom']));
                  $DateTo =  date('Y-m-d', strtotime($rows['DateTo']));
                }
                else {
                  $DateFrom =  date('h:i A', strtotime($rows['DateFrom']));
                  $DateTo =  date('h:i A', strtotime($rows['DateTo']));

                }

                       ?>
                       <tr class="requisition-link" data-toggle="modal" data-target="#viewModal" data-id="<?=$requestID;?>">
                       <td>
                             <span class="avatar d-block rounded" style="background-image: url(<?php if ($profilePicture !== "") { ?>'<?=$profilePicture?>' <?php ; } else { ?> ../assets/logo/image_placeholder.png <?php } ?>)"></span>
                      </td>
                      <?php
                      echo "
                           <td>". $rows['RequestType'] ."</td>
                           <td>". $rows['lastName'] ."</td>
                           <td>". $rows['Request'] ."</td>
                           <td>". $DateRequest ."</td>
                           <td>". $rows['Reason'] ."</td>
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
         public function viewDeclinedForm(){

           try {
              $status ='declined';
               $sql = "SELECT personaldetailstbl.photo AS profilePicture,
                                           personaldetailstbl.lastName, requestformtbl.lastName,
                                           requestformtbl.firstName, requestformtbl.Request,
                                           requestformtbl.DateRequest, requestformtbl.RequestType,
                                           requestformtbl.DateFrom, requestformtbl.DateTo, requestformtbl.Reason,
                                           requestformtbl.requestID
                                            FROM personaldetailstbl INNER JOIN requestformtbl
                                            ON requestformtbl.lastName = personaldetailstbl.lastName
                                          WHERE requestformtbl.status=:status";
               $result = $this->conn->runQuery($sql);
               $numRows = $result->execute(array(":status" => $status));
               echo "<tbody>";
               if ($numRows > 0) {
                  while ($rows = $result->fetch(PDO::FETCH_ASSOC)) {
                    $profilePicture = $rows['profilePicture'];
                    $requestID = $rows['requestID'];
                    $DateRequest =  date('Y-m-d h:i A', strtotime($rows['DateRequest']));
                    if ($rows['RequestType'] == 'Absent Request') {
                      $DateFrom =  date('Y-m-d', strtotime($rows['DateFrom']));
                      $DateTo =  date('Y-m-d', strtotime($rows['DateTo']));
                    }
                    else {
                      $DateFrom =  date('h:i A', strtotime($rows['DateFrom']));
                      $DateTo =  date('h:i A', strtotime($rows['DateTo']));

                    }       ?>
                           <tr class="requisition-link" data-toggle="modal" data-target="#viewModal" data-id="<?=$requestID;?>">
                           <td>
                               <span class="avatar d-block rounded" style="background-image: url(<?php if ($profilePicture !== "") { ?>'<?=$profilePicture?>' <?php ; } else { ?> ../assets/logo/image_placeholder.png <?php } ?>)"></span>
                          <?php
                          echo "
                           </td>

                               <td>". $rows['RequestType'] ."</td>
                               <td>". $rows['lastName'] ."</td>
                               <td>". $rows['Request'] ."</td>
                               <td>". $DateRequest ."</td>
                               <td>". $rows['Reason'] ."</td>
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
            public function employeelastName(){
              try
              {
                $sql = "SELECT lastName FROM personaldetailstbl";
                $result = $this->conn->runQuery($sql);
                $numRows = $result->execute();
                  while ($rows = $result->fetch(PDO::FETCH_ASSOC)) {

                    echo "
                           <option value='". $rows['lastName'] ."'>". $rows['lastName']."</option>
                    ";
                  }
              } catch (PDOException $e) {
               echo "Connection Error: " . $e->getMessage();
             }
            }
            public function Approved($requestID){
              try {

              } catch (PDOException $e) {
               echo "Connection Error: " . $e->getMessage();
             }

            }
            public function Declined($requestID){
              try {

              } catch (PDOException $e) {
               echo "Connection Error: " . $e->getMessage();
             }

            }


 }
