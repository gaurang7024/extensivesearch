<?php

    function cleanString($str)
    {
        $str = preg_replace('/\d+/u', '', $str);
        $str = preg_replace('/[^A-Za-z0-9_\-]/', '', $str);
        $str = str_replace('_', ' ', $str);
        $str = str_replace('-', ' ', $str);
        $str = trim(strtolower($str));
        $output = preg_replace('!\s+!', ' ', $str);
        echo $output . "\n";
       echo $str;
        return $output;
    }

?>

<?php
include "dbkeymgr.php";

$final = cleanString("Zack_Knight_x_Jasmin_Walia_-_Bom_Diggy_Official_Music_Video-lEgTtQFMjWw");
// $final = cleanString("03 - Azadi - DownloadMing.S");

    $connection = mysqli_connect($db_url,$db_user,$db_pass,$db_name);
    if($connection)
    {
        $sql = "SELECT * FROM song WHERE MATCH (songname) AGAINST ('$final' IN NATURAL LANGUAGE MODE) LIMIT 1";
        echo $sql;
        $result = mysqli_query($connection,$sql);
            while($new = mysqli_fetch_array($result))
            {
                print_r($new);
            }
    }
    else
    {
        echo "Try again later";
    }
?>