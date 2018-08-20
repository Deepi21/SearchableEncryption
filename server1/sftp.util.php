<?php

if(isset($_GET["test"])) {
	file_put_contents("/var/www/html/server1/testing1.data", "123123");
	download_ssh2file("/var/www/html/server1/testing1.data", "/var/www/html/server1/testing2.data");
}

function download_ssh2file($source_filepath, $dest_filepath) {
        $server = '139.59.15.153';
        $port = '22';
        $username = 'deepika';
        $passwd = 'juneja';


        $connection = ssh2_connect($server, $port);
        if (ssh2_auth_password($connection, $username, $passwd)) {
        $sftp = ssh2_sftp($connection);
        $source_filedata = file_get_contents("ssh2.sftp://".intval($sftp)."/{$source_filepath}");
        file_put_contents("ssh2.sftp://".intval($sftp)."/{$dest_filepath}", $source_filedata);
        unset($connection);
        return true;
        } else {
        //echo "Unable to authenticate with server"."n";
        }
        unset($connection);
        return false;
	}
	
	function upload_ssh2file($source_filepath, $dest_filepath) {
        $server = '139.59.15.153';
        $port = '22';
        $username = 'deepika';
        $passwd = 'juneja';


        $connection = ssh2_connect($server, $port);
        if (ssh2_auth_password($connection, $username, $passwd)) {
        $sftp = ssh2_sftp($connection);
        $source_filedata = file_get_contents("ssh2.sftp://".intval($sftp)."/{$source_filepath}");
        file_put_contents("ssh2.sftp://".intval($sftp)."/{$dest_filepath}", $source_filedata);
        unset($connection);
        return true;
        } else {
        //echo "Unable to authenticate with server"."n";
        }
        unset($connection);
        return false;
	}
	?>
