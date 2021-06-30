<html>
<body>
    <?php
    $Name = $_GET['branch_name'];
    $pincode = $_GET['pincode'];
    $site = "https://api.postalpincode.in/pincode/";
    $url = $site . $pincode;
    $cSession = curl_init();
    curl_setopt($cSession, CURLOPT_URL, $url);
    curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
    $res = curl_exec($cSession);
    $data = json_decode($res, true);
    $values = 0; 
    $values = count($data['0']['PostOffice']['0']);
    $value = count($data['0']['PostOffice']);
    ?>
    <table>
        <?php
        for($x=0; $x<$value; $x++)
        {
            if($Name==$data['0']['PostOffice'][$x]['Name'])
            {   
                ?>
                <tr>
                <td><B>Post Office:</B></td>
                <td>
                    <?php
                    print_r($data['0']['PostOffice'][$x]['Name']);
                    ?>
                </td>
                <tr>
                <td><B>Post Office Type:</B></td>
                <td>
                    <?php
                    print_r($data['0']['PostOffice'][$x]['BranchType']);
                    ?>
                </td><tr>
                <td><B>District:</B></td>
                <td>
                    <?php
                    print_r($data['0']['PostOffice'][$x]['District']);
                    ?>
                </td><tr>
                <td><B>Division:</B></td>
                <td>
                    <?php
                    print_r($data['0']['PostOffice'][$x]['Division']);
                    ?>
                </td><tr>
                <td><B>Tehsil/Taluk:</B></td>
                <td>
                    <?php
                    print_r($data['0']['PostOffice'][$x]['Region']);
                    ?>
                </td><tr>
                <td><B>State:</B></td>
                <td>
                    <?php
                    print_r($data['0']['PostOffice'][$x]['State']);
                    ?>
                </td><tr>
                <td><B>Pincode:</B></td>
                <td>
                    <?php
                    print_r($pincode);
                    ?>
                </td><tr>
                <?php
            }
        }
        ?>
    </table>
</body>
</html>