<?php
mysql_connect(
"0.0.0.0",
"damionlowers"
);
mysql_select_db("world");
$all=$_REQUEST['all'];
if($all=='true'and $_REQUEST['format']=='xml'){
$LOOKUP=null;
}
else{
$LOOKUP = $_REQUEST['lookup'];
}
$results = mysql_query("SELECT * FROM countries WHERE name LIKE '%$LOOKUP%';");
if($all!='true'){
  while ($row = mysql_fetch_array($results)) {
    ?>
    <li> <?php echo $qrow["name"]; ?>, ruled by <?php echo $row["head_of_state"]; ?> </li>
    <?php
  
}
}
else{
    $string='<?xml version="1.0" encoding="utf-8"?> <ul> <countrydata>';
    while ($row = mysql_fetch_array($results)) {
        
        $string.='<li>';
        $string.='<country>';
        $string.='<name>';
        $string.=$row["name"];
        $string.='</name>';
        $string.='<ruler>';
        $string.=$row["head_of_state"];
        $string.='</ruler>';
        $string.='</country>';
        $string.='</li>';
}
$string.='</countrydata></ul>';
$xmlString = utf8_encode($string);
 $xml=new SimpleXMLElement($xmlString);
 echo $xml -> asXML();
echo $string;
}
?>