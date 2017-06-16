<!-- jQuery -->
<script src="{{ url('./vendors/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ url('./vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ url('./vendors/fastclick/lib/fastclick.js') }}"></script>
<!-- NProgress -->
<script src="{{ url('./vendors/nprogress/nprogress.js') }}"></script>
<!-- bootstrap-progressbar -->
<script src="{{ url('./vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{ url('./vendors/moment/min/moment.min.js') }}"></script>
<script src="{{ url('./vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- bootstrap-wysiwyg -->
<script src="{{ url('./vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js') }}"></script>
<script src="{{ url('./vendors/jquery.hotkeys/jquery.hotkeys.js') }}"></script>
<script src="{{ url('./vendors/google-code-prettify/src/prettify.js') }}"></script>
<!-- jQuery Tags Input -->
<script src="{{ url('./vendors/jquery.tagsinput/src/jquery.tagsinput.js') }}"></script>
<!-- Switchery -->
<script src="{{ url('./vendors/switchery/dist/switchery.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ url('./vendors/select2/dist/js/select2.full.min.js') }}"></script>
<!-- Parsley -->
<script src="{{ url('./vendors/parsleyjs/dist/parsley.min.js') }}"></script>
<!-- Autosize -->
<script src="{{ url('./vendors/autosize/dist/autosize.min.js') }}"></script>
<!-- jQuery autocomplete -->
<script src="{{ url('./vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js') }}"></script>
<!-- starrr -->
<script src="{{ url('./vendors/starrr/dist/starrr.js') }}"></script>
<!-- Custom Theme Scripts -->
<script src="{{ url('./build/js/custom.min.js') }}"></script>
<!-- Datatables -->
  <script src="{{ url('./vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ url('./vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
  <script src="{{ url('./vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ url('./vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
  <script src="{{ url('./vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
  <script src="{{ url('./vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ url('./vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>


  <script src="{{ url('./vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
  <script src="{{ url('./vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ url('./vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
  <script src="{{ url('./vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
  <script src="{{ url('./vendors/jszip/dist/jszip.min.js') }}"></script>
  <script src="{{ url('./vendors/pdfmake/build/pdfmake.min.js') }}"></script>
  <script src="{{ url('./vendors/pdfmake/build/vfs_fonts.js') }}"></script>

    <script src="{{ url('./vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ url('./semantic/semantic.js') }}" charset="utf-8"></script>
    <!-- markup -->
    <!-- dependencies (Summernote depends on Bootstrap & jQuery) -->

    <script src="{{ url('http://cdn.tinymce.com/4/tinymce.min.js') }}"></script>

  <script>
    var editor_config = {
      path_absolute : "/",
      selector: "textarea.my-editor",
      height:550,
      plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern",
        "preview",
        "codesample",
        "textcolor colorpicker",
        "emoticons",
        "legacyoutput",
        "visualchars",
        "contextmenu"
      ],
      contextmenu: "link image inserttable | cell row column deletetable",
      toolbar: "ltr rtl | visualchars | emoticons | forecolor backcolor | codesample | preview | insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
      relative_urls: false,
      file_browser_callback : function(field_name, url, type, win) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
        if (type == 'image') {
          cmsURL = cmsURL + "&type=Images";
        } else {
          cmsURL = cmsURL + "&type=Files";
        }

        tinyMCE.activeEditor.windowManager.open({
          file : cmsURL,
          title : 'Filemanager',
          width : x * 0.8,
          height : y * 0.8,
          resizable : "yes",
          close_previous : "no"
        });
      }
    };

    tinymce.init(editor_config);

  </script>
