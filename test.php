<html>
<head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
<body>

<?php

$time1= date("Y-m-d H:i:s");
$ip='ip addres';
$ro='public';
$session = new SNMP(SNMP::VERSION_2C, $ip, $ro);
$ifDescr = $session->walk(".1.3.6.1.2.1.2.2.1.2", TRUE);

$ifAlias = $session->walk("IF-MIB::ifAlias", TRUE);

$ifSpeed = $session->walk(".1.3.6.1.2.1.2.2.1.5", TRUE);

$ifAdminStatus = $session->walk(".1.3.6.1.2.1.2.2.1.7", TRUE);

$ifOperStatus = $session->walk(".1.3.6.1.2.1.2.2.1.8", TRUE);

$ifInErrors = $session->walk(".1.3.6.1.2.1.2.2.1.14", TRUE);

$ifOutErrors = $session->walk(".1.3.6.1.2.1.2.2.1.20", TRUE);

$ONUMAC = $session->walk("1.3.6.1.4.1.3320.101.10.1.1.3", TRUE);

$ONURxLevel = $session->walk("1.3.6.1.4.1.3320.101.10.5.1.5", TRUE);

$ONUTemp = $session->walk("1.3.6.1.4.1.3320.101.10.5.1.2", TRUE);

$ONUDist = $session->walk("1.3.6.1.4.1.3320.101.10.1.1.27", TRUE);

$ONUVendor = $session->walk("1.3.6.1.4.1.3320.101.10.1.1.1", TRUE);

$ONUModel = $session->walk("1.3.6.1.4.1.3320.101.10.1.1.2", TRUE);

        foreach ($ifDescr as $key => $value) {
        $iface[$key]['IfId']=$key;
        $value=explode(' ', $value);
        $value=end($value);
        $value=trim($value);
        $value = str_replace("\"", "", $value);
        $iface[$key]['IfDescr']=$value;
        }
        foreach ($ifAlias as $key => $value) {
        $iface[$key]['IfId']=$key;
        $value=explode(' ', $value);
        $value=end($value);
        $value=trim($value);
        $value = str_replace("\"", "", $value);
        $iface[$key]['ifAlias']=$value;
        }
	foreach ($ifSpeed as $key => $value) {
        $value=explode(':', $value);
        $value=end($value);
        $value=trim($value);
        $iface[$key]['IfSpeed']=$value;
        }
        foreach ($ifAdminStatus as $key => $value) {
        $value=explode(':', $value);
        $value=end($value);
        $value=trim($value);
        $iface[$key]['IfAdminStatus']=$value;
        }
        foreach ($ifOperStatus as $key => $value) {
        $value=explode(':', $value);
        $value=end($value);
        $value=trim($value);
        $iface[$key]['IfOperStatus']=$value;
        }
        foreach ($ifInErrors as $key => $value) {
        $value=explode(':', $value);
        $value=end($value);
        $value=trim($value);
        $iface[$key]['IfInErrors']=$value;
        }
        foreach ($ifOutErrors as $key => $value) {
        $value=explode(':', $value);
        $value=end($value);
        $value=trim($value);
        $iface[$key]['IfOutErrors']=$value;
        }
        foreach ($ONUMAC as $key => $value) {
        $value=explode(':', $value);
        $value=end($value);
        $value=trim($value);
        $value = str_replace (" ", ":", $value);
        $iface[$key]['ONUMAC']=$value;
        }
        foreach ($ONURxLevel as $key => $value) {
        $value=explode(':', $value);
        $value=end($value);
        $value=trim($value);
        $iface[$key]['ONURxLevel']=$value;
        }
        foreach ($ONUTemp as $key => $value) {
        $value=explode(':', $value);
        $value=end($value);
        $value=trim($value);
        $value = $value/256;
        $value = round($value, 2);
        $iface[$key]['ONUTemp']=$value;
        }
        foreach ($ONUDist as $key => $value) {
        $value=explode(':', $value);
        $value=end($value);
        $value=trim($value);
        $iface[$key]['ONUDist']=$value;
        }
        foreach ($ONUVendor as $key => $value) {
        $value=explode(':', $value);
        $value=end($value);
        $value=trim($value);
        $value = str_replace("\"", "", $value);
        $iface[$key]['ONUVendor']=$value;
        }
        foreach ($ONUModel as $key => $value) {
        $value=explode(':', $value);
        $value=end($value);
        $value=trim($value);
        $value = str_replace("\"", "", $value);
        $iface[$key]['ONUModel']=$value;
        }

	echo "$time1.<h2></h2>";
	echo '<table>';
	foreach ($iface as $key){
	$date=date("Y-m-d H:i:s");
        $IfId=$equipment_id.'_'.$key['IfId'];
        $IfDescr=$key['IfDescr'];
        $ifAlias=$key['ifAlias'];
        $IfSpeed=$key['IfSpeed'];
        $IfAdminStatus=$key['IfAdminStatus'];
        $IfOperStatus=$key['IfOperStatus'];
        $IfInErrors=$key['IfInErrors'];
        $IfOutErrors=$key['IfOutErrors'];
        if(isset( $key['ONUMAC'])){
        $ONUMAC=$key['ONUMAC'];}else{$ONUMAC=NULL;}
        if(isset( $key['ONURxLevel'])){
        $ONURxLevel=$key['ONURxLevel']/10;}else{$ONURxLevel=NULL;}
        if(isset( $key['ONUTemp'])){
        $ONUTemp=$key['ONUTemp'];}else{$ONUTemp=NULL;}
        if(isset( $key['ONUDist'])){
        $ONUDist=$key['ONUDist'];}else{$ONUDist=NULL;}
//      if(isset( $key['ONUVendor'])){
//      $ONUVendor=$key['ONUVendor'];}else{$ONUVendor=NULL;}
//      if(isset( $key['ONUModel'])){
//      $ONUModel=$key['ONUModel'];}else{$ONUModel=NULL;}
//      $ONUVendorModel=$ONUVendor.'/'.$ONUModel;
//	echo '<td>IfId: '.$IfId.'</td>';
        echo '<td>Интерфейс: '.$IfDescr.'</td>';
        echo '<td>Адрес: '.$ifAlias.'</td>';
//        echo '<td>IfSpeed: '.$IfSpeed.'</td>';
//        echo '<td>IfAdminStatus: '.$IfAdminStatus.'</td>';
        echo '<td>Състояние: '.$IfOperStatus.'</td>';
//        echo '<td>IfInErrors: '.$IfInErrors.'</td>';
//        echo '<td>IfOutErrors: '.$IfOutErrors.'</td>';
//	echo '</br>';
        $epon=stripos($IfDescr, 'pon');
        $eponslash=stripos($IfDescr, '/');
        $eponcolon=stripos($IfDescr, ':');
        if($epon !== false and $eponslash!== false and $eponcolon !== false){
        echo '<td>MAC: '.$ONUMAC.'</td>';
        echo '<td>Сигнал: '.$ONURxLevel.'</td>';
        echo '<td>Температура: '.$ONUTemp.'</td>';
        echo '<td>Растояние: '.$ONUDist.'</td>';}
//        echo '<td>ONUVendor: '.$ONUVendor.'</td>';
//        echo '<td>ONUModel: '.$ONUModel.'</td>'; }
//	echo '</br>';

	echo '</tr>';

}

	echo '</table>';



?>

</body>
</html>

