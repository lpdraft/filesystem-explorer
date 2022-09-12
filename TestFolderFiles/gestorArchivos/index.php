<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FileSystem</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="./jquery/jquery-3.6.1.min.js"></script>
    <script src="https://kit.fontawesome.com/5fe3336987.js" crossorigin="anonymous"></script>

    <style>
        h2{
            text-align: center;
        }
       
    </style>
</head>

<body>
    <br>
    <div class="container">
        <h2> List Folder PHP-JQuery</h2>
        <br>
        <div class="divRight">
        <button type="button" name="create_folder" id="create_folder" class="btn btn-success" data-bs-toggle="modal" data-bs-target='#folderModal'>Create</button>
        </div>

        <div class="table-responsive" id="folder_table"></div>
    </div>   
</body>
</html>

<div id="folderModal" class="modal fade" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><span id="change_title">Create Folder</span></h5>
                </div>

                <div class="modal-body">
                    <p>Enter Folder Name
                    <input type="text" name="folder_name" id="folder_name" class="form-control">
                    </p>
                    <br>
                    <input type="hidden" name="action" id="action">
                    <input type="hidden" name="old_name" id="old_name">
                    <input type="button" name="folder_button" id="folder_button" class="btn btn-info" value="Create">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
</div>

<div id="uploadModal" class="modal fade" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><span id="change_title">Upload File</span></h5>
                </div>

                <div class="modal-body">
                    <form action="" method="POST" id="upload_form" enctype="multipart/form-data">
                    <p>Select File
                    <input type="file" name="upload_file"></p>
                    <br>
                    <input type="hidden" name="hidden_folder_name" id="hidden_folder_name">
                    <input type="submit" name="upload_button" class="btn btn-info" value="Upload">

                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
</div>

<div id="filelistModal" class="modal fade" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><span id="change_title">File List</span></h5>
                </div>

                <div class="modal-body" id="file_list">
                    <!-- Se inyecta los files aqui en row -->
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
</div>


 <script>
        $(document).ready(function(){

            load_folder_list();

            function load_folder_list(){
                var action = "fetch";
                $.ajax({
                    url:"action.php",
                    method:"POST",
                    // Finde data..which data wished to be sent (variable action (value=fetch) sent via method post)
                    data:{action:action},
                    success:function(data){
                        // Received data and make table rows with data
                        $('#folder_table').html(data);
                    }
                })
            }

            $(document).on('click','#create_folder', function(){
                $('#action').val('create');
                $('#folder_name').val('');
                $('#folder_button').val('Create');
                $('#old_name').val('');
                $('#change_title').text('Create Folder');
                $('#folderModal').modal('show');
            });

            // New Folder
            $(document).on('click', '#folder_button', function(){
                // Son variables sin valor
                var folder_name = $('#folder_name').val();
                // Hidden value to action variable
                var action = $('#action').val();
                var old_name = $('#old_name').val();
                if(folder_name != ''){
                    // Send request to ajax to show the php file
                    $.ajax({
                        url:'action.php',
                        method:'POST',
                        data:{folder_name:folder_name, old_name:old_name, action:action},
                        success:function(data){
                            $('#folderModal').modal('hide');
                            // Update page
                            load_folder_list();
                            alert(data);
                        }
                    })
                } else{
                    alert('Please, enter folder name!')
                }

            });

            $(document).on('click','.update', function(){
                var folder_name = $(this).data('name');
                // Nuevo nombre
                $('#old_name').val(folder_name);
                $('#folder_name').val(folder_name);
                $('#action').val('change');
                $('#folder_button').val('Update');

                // Change modal title
                $('#change_title').text('Change Folder Name');
                $('#folderModal').modal('show');
            });


            $(document).on('click', '.upload', function(){
                var folder_name = $(this).data('name');
                $('#hidden_folder_name').val(folder_name);
                $('#uploadModal').modal('show');
            });

            $('#upload_form').on('submit', function(){
                $.ajax({
                    url:"upload.php",
                    method:'POST',
                    data: new FormData(this),
                    contentType:false,
                    cache:false,
                    processData:false,
                    success: function(data){
                        load_folder_list();
                        alert(data)
                    }
                });
            });

            $(document).on('click', '.view_files', function(){
                // Get folder name bt the dat attribut name
                var folder_name = $(this).data('name');
                var action = 'fetch_files';
                $.ajax({
                    url:'action.php',
                    method:'POST',
                    // Values sent to server
                    data:{action:action, folder_name:folder_name},
                    success:function(data){
                        // Insert in body
                        $('#file_list').html(data);
                        $('#filelistModal').modal('show');
                    }
                });
            });

            $(document).on('click', '.remove_file', function(){
                var path = $(this).attr('id');
                var action = 'remove_file';
                if(confirm('Are you sure you want to remove it?')){
                    $.ajax({
                        url:'action.php',
                        method:'POST',
                        data:{path:path, action:action},
                        success:function(data){
                            alert(data);
                            $('#filelistModal').modal('hide');
                            load_folder_list();
                        }
                    })

                }else{
                    return false;
                }
            })

            $(document).on('click', '.delete', function(){
                var folder_name = $(this).data('name');
                var action = 'delete';
                if(confirm('Are you sure you want to remove it?')){
                    $.ajax({
                        url:'action.php',
                        method:'POST',
                        data:{folder_name:folder_name, action:action},
                        success:function(data){
                            load_folder_list();
                            alert(data);
                        }
                    });
                }
            });

            //Change File Name
            $(document).on('blur','.change_file_name', function(){
                var folder_name = $(this).data('folder_name');
                var old_file_name = $(this).data('file_name');
                var new_file_name = $(this).text();
                var action = 'change_file_name';

                $.ajax({
                    url: "action.php",
                    method:'POST',
                    data:{folder_name:folder_name, old_file_name:old_file_name, new_file_name:new_file_name, action:action},
                    success:function(data){
                        alert(data); 
                    }
                });
            });

        });
    </script>