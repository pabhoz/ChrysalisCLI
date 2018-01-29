<?php

$host = $_GET["host"];
$dbname = $_GET["dbname"];
$dbuser = $_GET["user"];
$dbpass = $_GET["pass"];

$output = $_GET["output"];

require "./src/Chrysalis.php";
$chrysalis = new Chrysalis($host, $dbname, $dbuser, $dbpass);

$chrysalis->abstractDb(true);

$additionalMethod = "    public function getMyVars(){\n return get_object_vars(".'$this'.");\n    }\n";

$o = $chrysalis->generateAllClasses("$output/",["extends"=>"BModel", "parent_construct" => true, "additionalMethods"=>[$additionalMethod]]);
echo $o;