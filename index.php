<?php

$host = $_GET["host"];
$dbname = $_GET["dbname"];
$dbuser = $_GET["user"];
$dbpass = $_GET["pass"];

$output = $_GET["output"];
$abstractTables = $_GET["at"];

require "./src/Chrysalis.php";
$chrysalis = new Chrysalis($host, $dbname, $dbuser, $dbpass);

$chrysalis->abstractDb(true);
if($abstractTables){
    $additionalMethod = "    public function getMyVars(){\n return get_object_vars(".'$this'.");\n    }\n";

    $o = $chrysalis->generateAllClasses("$output/",["extends"=>"\Fox\FoxModel", "parent_construct" => true, "additionalMethods"=>[$additionalMethod]]);
    echo $o;
}