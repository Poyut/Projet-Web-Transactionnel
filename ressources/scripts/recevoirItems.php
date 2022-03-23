<?php
include_once "donnees/ItemDAO.php";

$listeNomItem = ItemDAO::listerNomItems();

foreach($listeNomItem as $nom)
{
  $a[] = $nom['name'];
}

// get the q parameter from URL
$q = $_REQUEST["q"];

$suggestion = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
  $q = strtolower($q);
  $len=strlen($q);
  foreach($a as $name) {
    if (stristr($q, substr($name, 0, $len))) {
      if ($suggestion === "") {
        $suggestion = $name;
      } else {
        $suggestion .= ", $name";
      }
    }
  }
}

// Output "no suggestion" if no suggestion was found or output correct values
echo $suggestion === "" ? "aucune suggestion" : $suggestion;
?>