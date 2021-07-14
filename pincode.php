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
            if(empty($_POST['pincode']))
            {
                echo "Please Enter the Pincode!!";
            }
            else
            {
                $pincode = $_POST['pincode'];
                if(strlen($pincode) == '6')
                {
                    $site = "https://api.postalpincode.in/pincode/";
                    $url = $site . $pincode;
                    $cSession = curl_init();
                    curl_setopt($cSession, CURLOPT_URL, $url);
                    curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
                    $res = curl_exec($cSession);
                    $data = json_decode($res, true);
                    if($data['0']['PostOffice'] !== null)
                    {
                        $values = 0; 
                        $values = count($data['0']['PostOffice']);
                        ?>
                        <table>
                           <tr>
                               <th>Branch Name</th>
                               <th>Branch Type</th>
                               <th>Details</th>
                               <br>
                            </tr>
                            <?php
                            for($x=0; $x < $values; $x++)
                            {
                            ?>
                                <tr>
                                    <td><?php print_r($data['0']['PostOffice'][$x]['Name']); ?></td>
                                    <td><?php print_r($data['0']['PostOffice'][$x]['BranchType']); ?></td>
                                    <td><a href="<?php echo "details.php"; ?>?branch_name=<?php print_r($data['0']['PostOffice'][$x]['Name']);?>&pincode=<?php echo $pincode; ?>"># <br></a></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>        
                        <?php
                    }
                    else
                    {
                        echo "Pincode is not correct";
                    }
                }
                else
                    {
                        echo"Please Enter only six digits!!";
                    }
            }
        }
       ?>
   </body>
</html>
