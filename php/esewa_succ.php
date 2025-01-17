<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$conn = mysqli_connect('localhost:3306', 'root', '', 's_project');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_REQUEST['oid']) && isset($_REQUEST['amt']) && isset($_REQUEST['refId'])) {
    $sql = "SELECT * FROM fine WHERE invoice = '" . $_REQUEST['oid'] . "'";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $order = mysqli_fetch_assoc($result);
            $url = "https://uat.esewa.com.np/epay/transrec";
            
            $data = [
                'amt' => $order['amount'],
                'rid' => $_REQUEST['refId'],
                'pid' => $order['invoice'],
                'scd' => 'epay_payment'
            ];

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($curl);
            $response_code = get_xml_node_value('response_code', $response);

            if (trim($response_code) == 'Success') {
                $sql = "UPDATE fine SET status='Complete' WHERE fine_id='" . $order['fine_id'] . "'";
                mysqli_query($conn, $sql);
                
                // Redirect to req.php with the borrow_id as a query parameter
                header('Location: req.php?borrow_id=' . $order['borrow_id']);
                exit;
            }
        }
    }
}

function get_xml_node_value($node, $xml) {
    if ($xml == false) {
        return false;
    }
    $found = preg_match('#<' . $node . '(?:\s+[^>]+)?>(.*?)' . '</' . $node . '>#s', $xml, $matches);
    if ($found != false) {
        return $matches[1]; 
    }
    return false;
}