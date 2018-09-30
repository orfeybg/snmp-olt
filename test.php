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
<<<<<<< HEAD

<?php include 'mystyle.css'; ?>

</style>
</head>

<body>
<form>
  <input type="button" value="Върни се назад!" onclick="history.back()">
</form>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Потърси по име на ону-то">

<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>

<script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>

=======
</style>
</head>
<body>
>>>>>>> 83d006ff00822b0f3c045d78240874f187b6c82b

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

<<<<<<< HEAD
$Timeticks = $session->walk("iso.3.6.1.2.1.2.2.1.9", TRUE);

$sysuptime[0] = $session->walk("SNMPv2-MIB::sysUpTime.0", TRUE);
$sysuptime[1] = preg_replace("Timeticks:","",$sysuptime[0]);
echo 'System Uptime: Timeticks -'.$sysuptime[1].'<br>';

		asort($ifDescr);
=======
>>>>>>> 83d006ff00822b0f3c045d78240874f187b6c82b
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
<<<<<<< HEAD
	foreach ($Timeticks as $key => $value) {
        $iface[$key]['Timeticks']=$value;
        $value=explode(' ', $value);
        $value=end($value);
        $value=trim($value);
//	$value = str_replace("Timeticks:","",$value[0]);
//	$value = str_replace("", "", $value);
	$iface[$key]['Timeticks']=$value;
        }
=======
>>>>>>> 83d006ff00822b0f3c045d78240874f187b6c82b
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

<<<<<<< HEAD





	echo "$time1.<h2></h2>";
	echo "<table id='myTable'>";
	echo "<th onclick='sortTable(0)'>Интерфейс</th>";
	echo "<th onclick='sortTable(1)'>Потребител</th>";
        echo "<th onclick='sortTable(2)'>Статус</th>";
        echo "<th onclick='sortTable(3)'>Онлайн</th>";
        echo "<th onclick='sortTable(4)'>MAC адрес</th>";
        echo "<th onclick='sortTable(5)'>Сила сигнал</th>";
        echo "<th onclick='sortTable(6)'>Температура</th>";
        echo "<th onclick='sortTable(7)'>Разстояние в метри</th><br/>\n";
	foreach ($iface as $key){
	$date=date("Y-m-d H:i:s");
//        $IfId=$equipment_id.'_'.$key['IfId'];
//	$Timeticks=$equipment_id.'  '.$key['IfId'];
        $IfDescr=$key['IfDescr'];
        $ifAlias=$key['ifAlias'];
        $IfSpeed=$key['IfSpeed'];
	$Timeticks=$key['Timeticks'];
=======
	echo "$time1.<h2></h2>";
	echo '<table>';
	foreach ($iface as $key){
	$date=date("Y-m-d H:i:s");
        $IfId=$equipment_id.'_'.$key['IfId'];
        $IfDescr=$key['IfDescr'];
        $ifAlias=$key['ifAlias'];
        $IfSpeed=$key['IfSpeed'];
>>>>>>> 83d006ff00822b0f3c045d78240874f187b6c82b
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
<<<<<<< HEAD
        echo '<td>'.$IfDescr.'</td>';
        echo '<td>'.$ifAlias.'</td>';
//        echo '<td>IfSpeed: '.$IfSpeed.'</td>';
//        echo '<td>IfAdminStatus: '.$IfAdminStatus.'</td>';
		$statusColor	= stripos( $IfOperStatus, 'up' ) === false ? 'red' : 'green';
        echo '<td style="background-color:'.$statusColor.'">&nbsp;&nbsp;&nbsp;&nbsp;</td>';
//        echo '<td>IfInErrors: '.$IfInErrors.'</td>';
//        echo '<td>IfOutErrors: '.$IfOutErrors.'</td>';
//	echo '</br>';
	echo '<td>'.$Timeticks.'</td>';
=======
        echo '<td>Интерфейс: '.$IfDescr.'</td>';
        echo '<td>Адрес: '.$ifAlias.'</td>';
//        echo '<td>IfSpeed: '.$IfSpeed.'</td>';
//        echo '<td>IfAdminStatus: '.$IfAdminStatus.'</td>';
        echo '<td>Състояние: '.$IfOperStatus.'</td>';
//        echo '<td>IfInErrors: '.$IfInErrors.'</td>';
//        echo '<td>IfOutErrors: '.$IfOutErrors.'</td>';
//	echo '</br>';
>>>>>>> 83d006ff00822b0f3c045d78240874f187b6c82b
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
<<<<<<< HEAD
=======

>>>>>>> 83d006ff00822b0f3c045d78240874f187b6c82b
	echo '</tr>';

}

	echo '</table>';



?>

</body>
</html>

