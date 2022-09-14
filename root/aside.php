


<div class="aside">

<div class="flex-shrink-0 p-3 bg-white" style="width: 280px;">
    <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
      <svg class="bi pe-none me-2" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
      <span class="fs-5 fw-semibold">Folders</span>
    </a>
    <ul class="list-unstyled ps-0">
      <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
        
        Folders 

        </button>
        <div class="collapse show" id="home-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <?php 
            FolderList('../root');
            function FolderList($path){
              if (is_dir ($path)){
                if ($handle = opendir ($path)){
                  echo '<ul>';
                  $files = [];
                  while (false !== ($entry = readdir($handle))){
                    if ($entry != '.' && $entry != '..' ){
                      array_push($files, $entry);
                    }
                  }
                  for ($i=0; $i<count($files);$i++){
                    $newPath = $path . '/' . $files[$i];
                    $newPathinfo = pathinfo($newPath);
                    if (!is_dir($newPath)){
                      if (($newPathinfo['extension'] !== 'php') &&
                          ($newPathinfo['extension'] !== 'md') &&
                          ($newPathinfo['extension'] !== 'DS_Store')){
                      echo '<li>' .$files[$i]. '</li>';
                      }
                    }
                    
                    if (is_dir($newPath)){
                    echo '<li>' .$files[$i]. '</li>';
                    FolderList($newPath);
                    }
                  }
                  echo '</ul>';
                }
              }
            }
            ?>



          </ul>
        </div>
      </li>



        </div>
      </li>
    </ul>
  </div>
</div>