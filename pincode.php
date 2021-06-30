<html>
   <head>
       <title>Pincode Details</title>
   </head>
   <body>
   <form action="" method="POST">
       <table>
          <td>
              <tr>Pincode: </tr>
              <tr>
                 <input name="pincode" type="text"> 
              </tr>
          </td>
          <td>
              <tr><input type="submit" name="submit" value="Submit"></tr>
          </td>
       </table>
   </form>
   <?php
        if(isset($_POST['submit']))
        {
            $pincode = $_POST['pincode'];
            $site = "https://api.postalpincode.in/pincode/";
            $url = $site . $pincode;
            $cSession = curl_init();
            curl_setopt($cSession, CURLOPT_URL, $url);
            curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
            $res = curl_exec($cSession);
            $data = json_decode($res, true);
            $values = 0; 
            $values = count($data['0']['PostOffice']);
            ?>
            <table>
               <tr>
                   <th>Branch Name</th>
                   <th>Branch Type</th>
                   <th>Details</th>
               </tr>
               <tr>
                    <br>
                    <td>
                    <?php
                    for($x=0; $x < $values; $x++)
                    {
                        print_r($data['0']['PostOffice'][$x]['Name']);
                        echo "<br/ >";
                    }
                    ?>
                    </td>
                    <td>
                    <?php
                    for($x=0; $x < $values; $x++)
                    {
                        print_r($data['0']['PostOffice'][$x]['BranchType']);
                        echo "<br/ >";
                    }
                    ?>
                    </td>
                    <td>
                       <?php
                            for($x=0; $x < $values; $x++)
                            {
                                ?>
                               <a href="<?php echo "details.php"; ?>?branch_name=<?php print_r($data['0']['PostOffice'][$x]['Name']);?>&pincode=<?php echo $pincode; ?>">
                               <?php
                               echo "#";    
                               echo "<br/ >";
                            }
                        ?>
                        </a>
                    </td>
                    
                </tr>
            </table>        
            <?php
        }
       ?>
   </body>
</html>
