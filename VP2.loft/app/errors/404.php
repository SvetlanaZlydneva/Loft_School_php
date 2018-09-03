<?php
echo 'line:' . $e->getLine() . "<br>";
echo 'File:' . $e->getFile() . "<br>";
echo $e->getMessage() . "<br>";
echo $e->getTraceAsString();
