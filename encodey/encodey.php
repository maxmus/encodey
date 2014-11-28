<?php
function encodey($str,$a ) {
$strlen = strlen( $str );
$siz = sizeof($a);
$res = "";
$rest = "";
$t= "";
$sugl = array();
$pozsugl = array();
for( $i = 0; $i < $strlen; $i++ ) {
    $char = substr( $str, $i, 1 );
     $t = false;
	for($j=0; $j < $siz;$j++) {
		if($a[$j] === $char) {
		    $t = true;
		    if($j+1 === $siz) {
		        $res.= $a[0];
		        break;
		    }
		    else  {
		        $res .= $a[$j+1];
		        break;
		    }
		}
	}
	if(!$t) {
	   $res.=$char;
	   array_push($sugl, $char);
	   array_push($pozsugl, $i);
	}
}
    $sugl = shifty($sugl);
	return changeChar($res,$pozsugl, $sugl);
	}

	function shifty($c) {
	  $siz = sizeof($c);
      $tmp = $c[0];
	  for ($i = 1; $i < $siz; $i++)
            $c[$i - 1] = $c[$i];
      $c[$siz - 1] = $tmp;
      return $c;
	}

	function changeChar($str, $pozsugl, $sugl) {
	    $strlen = strlen( $str );
	    $siz= sizeof($pozsugl);
	    $rez = "";
	    for($i = 0; $i <= $strlen; $i++) {
	         $char = substr( $str, $i, 1 );
	         for($j=0; $j<$siz;$j++) {
	             if($i === $pozsugl[$j]) {
	                $char=$sugl[$j];
	                break;
					}
	         }
	        $rez.=$char;
	    }
	    return $rez;
	}
	
	function printing($f) {
	     $siz= sizeof($f);
	     $t="";
	     for($k=0; $k <$siz; $k++)
	        $t.=$f[$k];
	    echo $t;
	        
	}
	

?>