<?php
	require_once 'functions.php';
	    
	/*
    $db=connectdb();
    
    if(isset($_GET["id"]))
        $result = sqlite_exec($db,"SELECT id FROM main where id='$_GET["id"]'");
    else
        $result =  sqlite_exec($db,"SELECT id FROM main where id='1'");
    $arr=$result->fetchArray(); 
    */
    //*
    $arr = array(
            0 => 0,
            1 => "Home",
            2 => '<p>M.A.I.S.E. (Model for Ab Initio Structure Evolution) is a computational tool for physics and materials science researchers.</p><p>The purpose of this site is to give a theoretical explanation of how M.A.I.S.E. functions as well as provide assistance and technical support for its use.</p><h2>Main Functions</h2><ul><li><img src="media/easuccess.jpg" alt="Img" height="260" width="380"><p>MAISE'."'".'s evolutionary search has been utilized for identification of novel stable structures in both particles and crystals.</p><span><a href="evolutionarysearch.html" class="more">Evolutionary Search</a></span></li><li><img src="media/nnefficiency.jpg" alt="Img" height="260" width="380"><p>The MAISE package integrates Neural Networks for calculations of structure stability with unprecedented efficiency.</p><span><a href="neuralnetworks.html" class="more">Neural Networks</a></span></li></ul>',
            3 => '      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse nec turpis facilisis, molestie justo at, hendrerit est. Sed quis volutpat arcu. Phasellus nunc est, porta id tortor in, pulvinar dictum magna. Praesent maximus urna ut nibh ultricies, et finibus dolor lobortis. Nulla at ullamcorper enim. Nulla molestie odio eros, quis tempus velit venenatis quis. Vestibulum sagittis consectetur aliquet. Mauris bibendum sed nisl nec pulvinar. Nulla neque nisi, tincidunt id lacus accumsan, varius finibus erat. Etiam id quam ac turpis euismod sollicitudin vitae vel lectus.</p>'."\n".
                 '      <p>Donec facilisis ornare eros ac scelerisque. Proin eget ultrices orci. Maecenas finibus, magna a sollicitudin pulvinar, augue est bibendum turpis, porta accumsan purus turpis nec dolor. Nullam at lobortis ante, vitae consectetur sem. Pellentesque egestas tempor nunc a tincidunt. Mauris condimentum tristique interdum. Praesent et ipsum mauris. In laoreet diam sit amet massa aliquet semper.</p>'."\n".
                 '      <p>Proin congue, ante eu imperdiet tempus, velit risus scelerisque urna, sed condimentum felis nibh in velit. Nam facilisis aliquet ipsum sit amet ultricies. Maecenas quis metus volutpat, bibendum tellus nec, suscipit massa. Vivamus eu ullamcorper odio. Mauris dignissim enim eget condimentum condimentum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum convallis eu diam vestibulum imperdiet. Pellentesque nibh ipsum, scelerisque in efficitur ac, finibus ac justo. In lobortis aliquam blandit. Etiam sollicitudin est augue, vitae euismod elit cursus auctor. Aenean dapibus leo et mauris cursus sagittis. Praesent bibendum eros dui, eu consequat lectus tincidunt nec. Etiam sem odio, facilisis vel augue at, posuere elementum odio.</p>'."\n".
                 '      <p>Etiam ut euismod leo, eu fringilla nisi. Donec mattis laoreet facilisis. Fusce eget enim gravida, ornare diam id, congue lectus. Etiam accumsan feugiat massa vitae blandit. Duis erat nisl, viverra eget ullamcorper sed, luctus eget nisl. Nulla vitae pharetra massa, vel fermentum lectus. Quisque id ultricies justo. Curabitur eget pretium ligula, ut cursus diam.</p>'."\n".
                 '      <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Proin ante odio, dapibus at gravida a, tempus ut ex. Morbi eget turpis cursus, iaculis erat sit amet, egestas arcu. Pellentesque laoreet metus sit amet nulla tempor bibendum. Proin dignissim condimentum erat, nec mattis magna accumsan ut. Nam interdum libero sed ultrices facilisis. Vivamus id blandit ligula. Nam id ipsum fermentum, cursus justo sit amet, consequat purus. Donec dapibus magna in ligula sagittis elementum et eu arcu. Nulla in commodo turpis, porttitor rutrum odio.</p>',
           );
    //*/
    headinfo($arr[1]);
    showBanner($arr[1]);
    showBody($arr[2]);
    showFooter();
	close();
    
    sqlite_close($db);
    
?>
