<?php

include("../config.php");


$sql = "SELECT * FROM register WHERE patientUsername='111' ";
                  $result = mysqli_query($db,$sql);
                   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                  $count = mysqli_num_rows($result);  
                   $UN = $row['pdtID'];
                  
                   echo"<script>alert('$UN')</script>";

                  
                //   if (mysqli_num_rows($result) > 0) {
                    

                //     while($row = mysqli_fetch_assoc($result)) {
                //         $UN = $row['Username'];
                  
                //         echo"<script>alert('$UN')</script>";
      
                //     }
                //}

                    






?>
