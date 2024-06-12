<?php
$folder_name='Ajay';
function createuser($folder_name)
{
  $path = '/var/www/html/CorpU/Applicants/' . $folder_name;
  $mode = 0777;

  // check if directory already exists
  if (file_exists($path)) {
    return "Error: Directory already exists: " . $path;
  }

  // create directory
  if (mkdir($path, $mode, true)) {
    return "Folder created: " . $path;
  } else {
    return "Error: Failed to create directory: " . $path;
  }
}
?>