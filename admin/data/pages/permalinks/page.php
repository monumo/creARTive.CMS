<?php
?>
<p>
Lista delle pagine presenti nel sito:
</p>
<ul class="list-group">
<?php
function scan_directory_recursively($directory, $filter=FALSE)
{
     if(substr($directory,-1) == '/')
     {
         $directory = substr($directory,0,-1);
     }
     if(!file_exists($directory) || !is_dir($directory))
     {
         return FALSE;
     }elseif(is_readable($directory))
     {
         $directory_tree = array();
         $directory_list = opendir($directory);
         while (FALSE !== ($file = readdir($directory_list)))
         {
             if($file != '.' && $file != '..')
             {
                 $path = $directory.'/'.$file;
                 if(is_readable($path))
                 {
                     $subdirectories = explode('/',$path);
                     if(is_dir($path))
                     {
                         scan_directory_recursively($path, $filter);
                     } elseif (is_file($path))
                     {
                         $extension = end(explode('.',end($subdirectories)));
                         if($filter === FALSE || $filter == $extension)
                         {
                             $element = explode('.',end($subdirectories));
                             print '<li class="list-group-item">' . PHP_EOL;
                             print ' <div class="row">'  . PHP_EOL;
                             print '  <div class="col-xs-2">'. PHP_EOL;
                             print '    <a href="?p=' . $element[0] . '" target="_blank">' . strtoupper($element[0]) . '</a>' . PHP_EOL;
                             print '  </div>'. PHP_EOL;
                             print '  <div class="col-xs-2">'. PHP_EOL;
                             //print '    <a href="?p=' . $element[0] . '" target="_blank">' . strtoupper($element[0]) . '</a>' . PHP_EOL;
                             print '  </div>'. PHP_EOL;
                             print ' </div>'  . PHP_EOL;
                             print '</li>' . PHP_EOL;
                         }
                     }
                 }
             }
         }
         closedir($directory_list);
         return $directory_tree;
     } else {
         return FALSE;
     }
 }
 // ------------------------------------------------------------
$dir = 'data/sites/' . $siteNamePath;
$fileselection = scan_directory_recursively("$dir");
?>
</ul>
