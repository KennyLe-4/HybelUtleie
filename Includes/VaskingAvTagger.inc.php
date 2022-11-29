<?php
function vaskingAvTagger($vask)
{
  $vask = trim($vask); // Trim()-funksjonen fjerner mellomrom og andre forhåndsdefinerte tegn fra begge sider av en streng.
  $vask = strip_tags($vask); // Strip_tags()- funksjonen fjerner HTML, XML og PHP tags. 
  $vask = htmlentities($vask); // HTMLentites()- funksjonen konverterer alle bokstaver til HTML entities. 
  $vask = stripslashes($vask); // Stripslashes()-funksjonen fjerner omvendte skråstreker lagt til av addslashes()-funksjonen.
  return $vask;
}
?>

