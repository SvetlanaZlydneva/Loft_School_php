<?php
echo '<div style="width: 200px;margin: 0 auto">
        <img src="../app/errors/404.png" alt="404" style="width: 100%; height: auto">
      </div>
      <div style="text-align: center">
        <h2>line:'. $e->getLine().'</h2>
        <h2>'. $e->getMessage().'</h2>
        <h2>File:'. $e->getFile().'</h2>
        <h2>'. $e->getTraceAsString().'</h2>
      </div>
      ';
