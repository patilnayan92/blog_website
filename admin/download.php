<?php include"../includes/database.php";

$satrtdate = date('Y-m-d',strtotime($_POST['startdate']));
$enddate = date('Y-m-d',strtotime($_POST['enddate']));

#$satrtdate = date('d-m-Y h:i:s A',$_POST['startdate']);
#$enddate = date('d-m-Y h:i:s A',$_POST['enddate']);

$query = "SELECT * FROM enquirydetails WHERE (date(enquirydate) BETWEEN  '$satrtdate' AND '$enddate')";
$res=mysqli_query($connection,$query);
if(count($res) > 0){
    $delimiter = ",";
    $filename = "report_" . date('Y-m-d') . ".csv";
    
    //create a file pointer
    $f = fopen('php://memory', 'w');
    
    //set column headers
    $fields = array('Name', 'Email', 'Phone','Apartment Name','BHK Type','Budget','Message','Url','UTM Source','UTM Medium','UTM Campaign','User Ip','Date');
    fputcsv($f, $fields, $delimiter);
    
    //output each row of the data, format line as csv and write to file pointer
    while($row = mysqli_fetch_array($res)){
        #$condate=date('d-m-Y',strtotime($row['enquirydate']));
        $lineData = array($row['clientname'], $row['email'], $row['phone'],$row['apartname'], $row['bhktype'], $row['budget'], $row['message'],$row['url'],$row['utm_source'],$row['utm_medium'],$row['utm_campaign'],$row['userip'],$row['enquirydate']);
        fputcsv($f, $lineData, $delimiter);
    }
    
    //move back to beginning of file
    fseek($f, 0);
    
    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    
    //output all remaining data on a file pointer
    fpassthru($f);
}
else{
    echo "no record found";
}
exit;

?>

