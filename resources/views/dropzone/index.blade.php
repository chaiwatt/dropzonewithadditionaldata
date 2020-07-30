<!DOCTYPE html>
<html>
  <head>
    <title>Drag and Drop file upload with Dropzone in Laravel by Chaiwatt</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/dropzone/dropzone.min.css')}}">
    <script src="{{asset('assets/plugins/dropzone/dropzone.min.js')}}" type="text/javascript"></script>

  </head>
  <body>

    <div class='content'>
        <form action="{{route('dropzone.upload')}}"  class='dropzone'>
        </form> 
            <div class="form-group">
              <label for="yourname" class="control-label col-md-3">your name</label>
              <input type="text" value="chaiwatt" class="form-control" id="yourname" name="yourname" placeholder="yourname">
          </div>
      </div> 

    <!-- Script -->
    <script>
        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone(".dropzone",{ 
            maxFilesize: 3,  // 3 mb
            acceptedFiles: ".jpeg,.jpg,.png",
        });
        myDropzone.on("sending", function(file, xhr, formData) {
            formData.append("_token", CSRF_TOKEN);
            formData.append("yourname", document.getElementById('yourname').value);
        }); 
    </script>

  </body>
</html>