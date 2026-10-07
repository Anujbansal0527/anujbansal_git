  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/jquery-ui-1.10.4.min.js"></script>
  <script src="js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
  <!-- bootstrap -->
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="js/owl.carousel.js"></script>
  <!-- custom select -->
  <script src="js/jquery.customSelect.min.js"></script>
  <!--custome script for all page-->
  <script src="js/scripts.js"></script>
  <!-- custom script for this page-->
  <script src="js/jquery.placeholder.min.js"></script>
  <script src="js/jquery.slimscroll.min.js"></script>
  <script src="assets/ckeditor/ckeditor.js"></script>
  <script src="assets/ckeditor/ckeditor-setup.js"></script>
  <!-- ck editor -->
  <script>
    // CK Editor Extra Plugin 'Column'
    CKEDITOR.plugins.add("columns", {
      init: function(editor) {
        editor.ui.addButton("Columns", {
          label: "Insert Columns",
          command: "insertColumns",
          toolbar: "insert",
          icon: "https://path/to/icon.png",
        });

        editor.addCommand("insertColumns", {
          exec: function(editor) {
            editor.insertHtml(
              '<div class="row">' +
              '  <div class="column" style="width: 50%;">Column 1 content here...</div>' +
              '  <div class="column" style="width: 50%;">Column 2 content here...</div>' +
              "</div>"
            );
          },
        });
      },
    });

    // Call

    CKEDITOR.replace("editor1", {
      extraPlugins: "uploadimage,image",
      filebrowserUploadUrl: "upload.php?type=Files",
      filebrowserImageUploadUrl: "upload.php?type=Images",
    });
  </script>