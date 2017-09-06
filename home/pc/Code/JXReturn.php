<?php
function JXReturn_Json($Code = 0, $Data = null){
	$Result = array('Code' => $Code);
	if($Data !== null) $Result['Data'] = $Data;
	exit(json_encode($Result));
}
?>