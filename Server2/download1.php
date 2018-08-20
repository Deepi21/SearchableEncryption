<?php

function get_file_data($uri) {
	
}

function call_func($fullfile,$extn)
{

	$filePointer=fopen($fullfile,'rb');
	if($extn=='txt' || $extn=='TXT')
		header('Content-type: application/txt');
	else if($extn=='docx' || $extn=='doc' || $extn=='DOC' || $extn=='DOCX')
		header('Content-type: application/msword');
	else if($extn=='jpg' || $extn=='jpeg' || $extn=='JPG' || $extn=='JPEG')
		header('Content-type: image/jpg');
	else if($extn=='gif' || $extn=='GIF')
		header('Content-type: image/gif');
	else if($extn=='png' || $extn=='PNG')
		header('Content-type: image/png');
	else if($extn=='xls' || $extn=='xlsx' || $extn=='XLS' || $extn=='XLSX')
		header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	else if($extn=='ppt' || $extn=='PPT' || $extn=='pptx' || $extn=='PPTX')
		header('Content-type: application/vnd.openxmlformats-officedocument.presentationml.presentation');
	else if($extn=='pdf' || $extn=='PDF')
		header('content-type: application/pdf');
	else
		header('Content-type: application/force-download');
	if(!fpassthru($filePointer)) echo "False is there";
}
?>
