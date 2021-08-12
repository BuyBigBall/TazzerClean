<?php


// Get real path for our folder
$rootPath = realpath('/home/site/wwwroot');

// Initialize archive object
$zip = new ZipArchive();
$zip->open('site-file.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);

// Create recursive directory iterator
/** @var SplFileInfo[] $files */
$files = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($rootPath),
    RecursiveIteratorIterator::LEAVES_ONLY
);

foreach ($files as $name => $file)
{
<<<<<<< HEAD


    $a = $file;

if (strpos($a, 'me/site/wwwroot/uploads') !== false) {
continue;
}


=======
>>>>>>> 377b617ec08f3d095ea2dc01cbc76a77d02b28fa
    // Skip directories (they would be added automatically)
    if (!$file->isDir())
    {
        // Get real and relative path for current file
        $filePath = $file->getRealPath();
        $relativePath = substr($filePath, strlen($rootPath) + 1);

        // Add current file to archive
        $zip->addFile($filePath, $relativePath);
    }
}

// Zip archive will be created only after closing object
$zip->close();
die("--generated");
?>