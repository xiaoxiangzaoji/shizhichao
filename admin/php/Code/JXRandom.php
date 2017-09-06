<?php
function JXRandom_Text($Char = null, $Length = null){
	if(is_string($Char) && is_integer($Length)){
		if(($Size = strlen($Char)) && $Length > 0){
			-- $Size;
			$Result = array();
			for($Index = 0; $Index < $Length; ++ $Index) $Result[$Index] = substr($Char, rand(0, $Size), 1);
			return(implode($Result));
		}
	}
	return(false);
}
?>