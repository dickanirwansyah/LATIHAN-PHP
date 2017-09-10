<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>LATIHAN PHP AJAX</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css"/>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
         $("#nama").multiselect({
           nonSelectedText: 'Select Framework',
           enableFiltering:true,
           enableCaseInsensitiveFiltering:true,
           buttonWidth:'400px'
         });

         $("#framework_form").on('submit', function(event){
           event.preventDefault();
           var form_data = $(this).serialize();
           $.ajax({
              url : "insert.php",
              method : "POST",
              data : form_data,
              success : function(data){
                $("#nama option:selected").each(function(){
                  $(this).prop('selected', false);
                });
                $("#nama").multiselect('refresh');
                alert(data);
              }
           });
         });
      });
    </script>
  </head>
  <body>
      <div class="container">
        <div class="container-fluide">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="page-header">
                <h3 class="alert alert-info">LATIHAN AJAX PART 1</h3>
            </div>
            <div class="page-header">
              <form class="form-horizontal" id="framework_form">
                  <div class="form-group">
                    <label>Select Framework with ajax</label>
                    <select name="nama[]" id="nama" multiple class="form-control">
                      <option value="Laravel Framework">Laravel Framework</option>
                      <option value="Slim Framework">Slim Framework</option>
                      <option value="Codeigniter Framework">Codeigniter Framework</option>
                      <option value="YII Framework">YII Framework</option>
                      <option value="Phalcon Framework">Phalcon Framework</option>
                      <option value="Zend Framework">Zend Framework</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary">
                      <span class="glyphicon glyphicon-ok-sign"></span>
                      Submit
                    </button>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
  </body>
</html>
