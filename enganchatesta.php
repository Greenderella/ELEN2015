<?php
$branch = "gh-pages";
$repo = "ELEN2015";

$srcDir = $repo . "-" . $branch;
$fileName = $branch . ".zip";

function rename_r($src,$dst) {
	$dir = opendir($src);
	@mkdir($dst);
	while(false !== ( $file = readdir($dir)) ) {
		if (( $file != '.' ) && ( $file != '..' )) {
			if ( is_dir($src . '/' . $file) )
				rename_r($src . '/' . $file, $dst . '/' . $file);
			else
				rename($src . '/' . $file,$dst . '/' . $file);
		} 
	} 
	closedir($dir); 
	rmdir($src);
}

copy( "https://github.com/Greenderella/ELEN2015/archive/" . $fileName, $fileName );
$zipArchive = new ZipArchive();
$result = $zipArchive->open($fileName);
if ($result === TRUE) {
    $zipArchive ->extractTo( getcwd() );
    $zipArchive ->close();
	
	recurse_rename( $srcDir, "." );
	unlink( $fileName );
}
?>