<?php

  require 'Config.php';

  class Request extends Config
  {
    public function __construct() {

        $this->conn = new Config();

   }

   public function RequestFrom($RequestType, $lastName, $Request, $DateFrom, $DateTo, $Reason){

     try {


       if ($RequestType == 'OverTime Request') {
         $Request = 'None';
       }
       $sql = "SELECT firstName, lastName FROM totalhourstbl WHERE lastName = '$lastName'";
       $result = $this->conn->runQuery($sql);
       $numRows = $result->execute();
       $rows = $result->fetch(PDO::FETCH_ASSOC);

       $firstName = $rows['firstName'];

      $DateRequest = date("Y-m-d h:i:s");
       $status = 'pending';
       $stmt = $this->conn->runQuery("INSERT INTO requestformtbl(RequestType, firstName, lastName, Request, DateFrom, DateTo, Reason, DateRequest, status)
       VALUES (:RequestType, :firstName, :lastName, :Request, :DateFrom, :DateTo, :Reason, :DateRequest, :status)");

       $stmt->bindparam(":RequestType", $RequestType);
       $stmt->bindparam(":firstName", $firstName);
       $stmt->bindparam(":lastName", $lastName);
       $stmt->bindparam(":Request", $Request);
       $stmt->bindparam(":DateFrom", $DateFrom);
       $stmt->bindparam(":DateTo", $DateTo);
       $stmt->bindparam(":Reason", $Reason);
       $stmt->bindparam(":DateRequest", $DateRequest);
       $stmt->bindparam(":status", $status);
       $stmt->execute();
       ?>
        <script type="text/javascript">
          alert("Submitted to HR department");

        </script>
       <?php
       return 0;
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
          ?>
            <script type="text/javascript">
              alert("Successful Approved");
            </script>
          <?php

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

          ?>
            <script type="text/javascript">
              alert("Successful Declined");
            </script>
          <?php

        } catch (PDOException $e) {
         echo "Connection Error: " . $e->getMessage();
       }

      }

      public function readForm($requestID){

        try {

            $sql = "SELECT RequestType, firstName, lastName, Request,
             DateFrom, DateTo, Reason, requestID
             FROM requestformtbl WHERE requestID = '$requestID'";
            $result = $this->conn->runQuery($sql);
            $numRows = $result->execute();

            while($rows = $result->fetch(PDO::FETCH_ASSOC)){
              $requestID = $rows['requestID'];

              echo "
              <div class='card'>
                  <div class='card-body'>
                    <form method ='POST'>
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

                                      <div class='row'>
                                          <div class='col-md-6 col-xs-12'>
                                              <div class='form-group'>
                                                   <label class='form-control-label'>Date From</label>
                                                   <input type='date' class='required form-control' value='". $rows['DateFrom'] ."' name='DateFrom' id='DataFrom' placeholder='dd/mm/yyyy' disabled/>

                                              </div>
                                          </div>
                                          <div class='col-md-6 col-xs-12'>
                                              <div class='form-group'>
                                                   <label class='form-control-label'>Date To</label>
                                                   <input type='date' class='required form-control' value='". $rows['DateTo'] ."' name='DateTo' id='DataTo' placeholder='dd/mm/yyyy' disabled/>

                                              </div>
                                          </div>
                                      </div>

                                      <div class='form-group'>
                                           <label class='form-control-label'>Reason</label>
                                           <textarea class='required email form-control' placeholder='". $rows['Reason'] ."' name='Reason' id='Reason' disabled/></textarea>

                                      </div>
                                      <input type='text' name='requestID' id='requestID' value='". $requestID ."' hidden='true'/>


                                      <div class='text-right'>

                                      <button class='btn btn-primary' type='submit' name='Approved'>Approved</button>
                                      <button class='btn btn-danger' type='submit' name='Declined'>Declined</button>

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

            $sql = "SELECT * FROM requestformtbl WHERE status = 'approved'";
            $result = $this->conn->runQuery($sql);
            $numRows = $result->execute();
            echo "<tbody>";
            if ($numRows > 0) {
               while ($rows = $result->fetch(PDO::FETCH_ASSOC)) {
                  echo "
                        <tr>
                            <td>". $rows['RequestType'] ."</td>
                            <td>". $rows['lastName'] ."</td>
                            <td>". $rows['Request'] ."</td>
                            <td>". $rows['DateRequest'] ."</td>
                            <td>". $rows['DateFrom'] ."</td>
                            <td>". $rows['DateTo'] ."</td>
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

               $sql = "SELECT * FROM requestformtbl WHERE status = 'declined'";
               $result = $this->conn->runQuery($sql);
               $numRows = $result->execute();
               echo "<tbody>";
               if ($numRows > 0) {
                  while ($rows = $result->fetch(PDO::FETCH_ASSOC)) {
                     echo "
                           <tr>
                               <td>". $rows['RequestType'] ."</td>
                               <td>". $rows['lastName'] ."</td>
                               <td>". $rows['Request'] ."</td>
                               <td>". $rows['DateRequest'] ."</td>
                               <td>". $rows['DateFrom'] ."</td>
                               <td>". $rows['DateTo'] ."</td>
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
                $sql = "SELECT lastName FROM totalhourstbl";
                $result = $this->conn->runQuery($sql);
                $numRows = $result->execute();

                if ($numRows > 0) {
                  while ($rows = $result->fetch(PDO::FETCH_ASSOC)) {

                    echo "
                           <option value='". $rows['lastName'] ."'>". $rows['lastName'] ."</option>
                    ";
                  }
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
