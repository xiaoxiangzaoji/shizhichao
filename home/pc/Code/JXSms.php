<?php
$JXSms_Key = 'Example';
function JXSms_Send($Phone = null, $Content = null){
	if(is_string($Phone) && is_string($Content)){
		if($Handle = curl_init('https://sms.yunpian.com/v2/sms/single_send.json')){
			if(curl_setopt($Handle, CURLOPT_SSL_VERIFYPEER, false)){
				if(curl_setopt($Handle, CURLOPT_FOLLOWLOCATION, true)){
					if(curl_setopt($Handle, CURLOPT_RETURNTRANSFER, true)){
						if(curl_setopt($Handle, CURLOPT_POST, true)){
							if(curl_setopt($Handle, CURLOPT_HTTPHEADER, array(
								'Accept:text/plain;charset=utf-8',
								'Content-Type:application/x-www-form-urlencoded',
								'charset=utf-8'
							))){
								global $JXSms_Key;
								if(curl_setopt($Handle, CURLOPT_POSTFIELDS, http_build_query(array(
									'mobile' => $Phone,
									'text' => $Content,
									'apikey' => $JXSms_Key
								)))){
									if($Status = curl_exec($Handle)){
										if(curl_getinfo($Handle, CURLINFO_HTTP_CODE) === 200){
											$Status = json_decode($Status, true);
											if(isset($Status['code']) && $Status['code'] === 0){
												curl_close($Handle);
												return(true);
											}
										}
									}
								}
							}
						}
					}
				}
			}
			curl_close($Handle);
		}
	}
	return(false);
}
?>