<form action="upload_image.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
    <div class="form-group">
        <div class="col-md-12">
            <div align="center"><a href="#" class="btn btn-default" id="image_alt"><span class="glyphicon glyphicon-ok"></span> &nbspSeleziona immagini</a></div>
            <input id="image" name="files[]" type="file" multiple="multiple" required="required" style="margin-left:50%;" class="btn btn-default">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-4 control-label" for="btn_add_img"></label>
        <div class="col-md-12">
            <div align="center">
                <button id="btn_add_img" name="btn_add_img" class="btn btn-primary">Carica</button>
            </div>
        </div>
    </div>
</form>