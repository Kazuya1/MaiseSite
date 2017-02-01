<?php

function headinfo($title) {
    echo '<!doctype html>'."\n".
         '<html>'."\n".
         '<head>'."\n".
         '  <link href="styles.css" rel="stylesheet">'."\n".
         '  <title>MAISE | '.$title.'</title>'."\n".
         '  <meta name="description" content="MAISE physics simulation.">'."\n".
         '  <meta name="keywords" content="physics, materials, MAISE">'."\n".
         '</head>'."\n".
         '<body>'."\n";
}

function showBanner($title) {
	echo '  <div class="banner">'."\n".
         '    <div style="background-color:black;width=100%;">'."\n".
         '      <img src="/~sgallag3/maise/media/logo.png">'."\n".
         '    <p>'."\n".
	 '	<span class="tabs"><a href="">Home</a></span>'."\n".
         '      <span class="tabs"><a href="AboutMAISE.htm">About MAISE</a></span>'."\n".
         '      <span class="tabs"><a href="EvolutionarySearch.htm">Evolutionary Search</a></span>'."\n".
         '      <span class="tabs"><a href="periodic-table.html">Neural Nets</a></span>'."\n".
         '      <span class="tabs"><a href="StructureAnalysis.htm">Structure Analysis</a></span>'."\n".
         '    </p>'."\n".
         '    </div>'."\n".
         '    <div id="title" class="box">'."\n".
		 '      <h1><big>'.$title.'</big></h1>'."\n".
		 '    </div>'."\n".
         '  </div>'."\n";
}

function showBody($arg) {
	echo '  <div class="content">'."\n".
         '    <div id="middle" class="box">'."\n".
         "$arg\n".
         '    </div>'."\n".
         '  </div>'."\n";
}

function showFooter() {
	echo '  <div class="footer">'."\n".
		 '    <p><small>&copy Aleksy Kolmogorov, 2016</small></p>'."\n".
		 '  </div>'."\n";
}

function close() {
	echo '</body>'."\n".
	'</html>';
}

function connectdb() {
    $dbhandle=sqlite_open('maise.db', 0666, $error);
        echo 'error!';
    if (!$dbhandle) {
        echo 'error!';
        die ($error);
    } else {
        echo "Opened database successfully\n";
    }
    return $dbhandle;
}

function Redirect($url, $permanent = false) {
    if (headers_sent() === false)
    {
    	header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
    }
    exit();
}
?>