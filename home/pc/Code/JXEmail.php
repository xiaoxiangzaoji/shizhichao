<?php
$JXEmail_Host = '127.0.0.1';
$JXEmail_Port = 25;
$JXEmail_Domain = 'Example';
$JXEmail_Username = 'example@example.com';
$JXEmail_Password = '123456';
$JXEmail_Name = 'Example';
function JXEmail_Send($Address = null, $Name = null, $Subject = null, $Content = null){
	if(is_string($Address) && is_string($Name) && is_string($Subject) && is_string($Content)){
		global $JXEmail_Host;
		global $JXEmail_Port;
		if($Socket = fsockopen($JXEmail_Host, $JXEmail_Port)){
			if(($Status = fgets($Socket)) && substr($Status, 0, 3) == '220'){
				global $JXEmail_Domain;
				if(fwrite($Socket, 'HELO ' . $JXEmail_Domain . "\r\n") && ($Status = fgets($Socket)) && substr($Status, 0, 3) == '250'){
					if(fwrite($Socket, 'AUTH LOGIN' . "\r\n") && ($Status = fgets($Socket)) && substr($Status, 0, 3) == '334'){
						global $JXEmail_Username;
						if(fwrite($Socket, base64_encode($JXEmail_Username) . "\r\n") && ($Status = fgets($Socket)) && substr($Status, 0, 3) == '334'){
							global $JXEmail_Password;
							if(fwrite($Socket, base64_encode($JXEmail_Password) . "\r\n") && ($Status = fgets($Socket)) && substr($Status, 0, 3) == '235'){
								if(fwrite($Socket, 'MAIL FROM:<' . $JXEmail_Username . '>' . "\r\n") && ($Status = fgets($Socket)) && substr($Status, 0, 3) == '250'){
									if(fwrite($Socket, 'RCPT TO:<' . $Address . '>' . "\r\n") && ($Status = fgets($Socket)) && substr($Status, 0, 3) == '250'){
										if(fwrite($Socket, 'DATA' . "\r\n") && ($Status = fgets($Socket)) && substr($Status, 0, 3) == '354'){
											global $JXEmail_Name;
											if(fwrite($Socket, 'MIME-Version:1.0' . "\r\n" . 'Content-Type:text/html' . "\r\n" . 'From:' . $JXEmail_Name . '<' . $JXEmail_Username . '>' . "\r\n" . 'To:' . $Name . '<' . $Address . '>' . "\r\n" . 'Subject:' . $Subject . "\r\n\r\n" . $Content . "\r\n" . '.' . "\r\n") && ($Status = fgets($Socket)) && substr($Status, 0, 3) == '250'){
												if(fwrite($Socket, 'QUIT' . "\r\n") && ($Status = fgets($Socket)) && substr($Status, 0, 3) == '221'){
													fclose($Socket);
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
			}
			fclose($Socket);
		}
	}
	return(false);
}
?>