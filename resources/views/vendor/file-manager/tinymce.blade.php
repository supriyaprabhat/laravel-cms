@if(Auth::check())
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __("backend.fileManager") }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.15.2/css/all.css">
    <link href="{{ asset('public/assets/file-manager/css/file-manager.css') }}" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12" id="fm-main-block">
            <div id="fm"></div>
        </div>
    </div>
</div>

<!-- File manager -->
<script src="{{ asset('public/assets/file-manager/js/file-manager.js') }}"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // set fm height
    document.getElementById('fm-main-block').setAttribute('style', 'height:' + window.innerHeight + 'px');

    const FileBrowserDialogue = {
      init: function() {
        // Here goes your code for setting your custom things onLoad.
      },
      mySubmit: function (URL) {
        // pass selected file path to TinyMCE
        parent.tinymce.activeEditor.windowManager.getParams().setUrl(URL);
        // close popup window
        parent.tinymce.activeEditor.windowManager.close();
      }
    };

    // Add callback to file manager
    fm.$store.commit('fm/setFileCallBack', function(fileUrl) {
      FileBrowserDialogue.mySubmit(fileUrl);
    });
  });
</script>
</body>
</html>
@endif
