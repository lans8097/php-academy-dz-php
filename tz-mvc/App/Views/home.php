<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?=(!empty($page_title))?$page_title:$config['site_title']?></title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
    <link href="/plagins/bootstrap-fileinput/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
    <script src="/js/jquery-3.2.1.min.js"></script>




    <script src="/plagins/bootstrap-fileinput/js/plugins/canvas-to-blob.min.js" type="text/javascript"></script>
    <script src="/plagins/bootstrap-fileinput/js/plugins/sortable.min.js" type="text/javascript"></script>
    <script src="/plagins/bootstrap-fileinput/js/plugins/purify.min.js" type="text/javascript"></script>
    <script src="/plagins/bootstrap-fileinput/js/fileinput.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/plagins/bootstrap-fileinput/themes/fa/theme.js"></script>
    <script src="/plagins/bootstrap-fileinput/js/locales/ru.js"></script>
</head>
<body>
<div class="container">
    <div class="page-header">
        <h1><?=$config['site_name']?></h1>
        <p class="lead"><?=$config['site_description']?></p>
    </div>
</div>
<div class="container">
    <div class="row col-lg-8">
        <div class="well">
            <form class="form-horizontal">
                <fieldset>
                    <legend>Add Ticket</legend>
                    <div class="form-group">
                        <label for="inputName" class="col-lg-2 control-label">Name:</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="inputName" placeholder="Name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-2 control-label">Email:</label>
                        <div class="col-lg-10">
                            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="textArea" class="col-lg-2 control-label">Text:</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" name="text" rows="3" id="textArea"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                            <label class="col-lg-2 control-label">Images:</label>
                        <div class="col-lg-10">
                            <input id="images" name="images[]" type="file" class="file" multiple data-show-upload="false" data-show-caption="true" accept="image/png|jpeg">
                        </div>


                        <script type="text/javascript">
                            // initialize with defaults
                            $("#input-id").fileinput();

                            // with plugin options
                            $("#input-id").fileinput({'showUpload':false, 'previewFileType':'any'});
                        </script>
                    </div>




                    <div class="form-group">
                        <div class="col-lg-10">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </fieldset>
            </form>
            <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div></div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="well">

        </div>

        <div class="well">

        </div>

        <div class="well">

        </div>

        <div class="well">

        </div>
    </div>
</div>
</body>
</html>