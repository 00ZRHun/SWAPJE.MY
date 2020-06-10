<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
    <script>
        /* $(document).ready(function(){
            $('#uploadForm').ajaxForm({
                target:'#imagesPreview',
                beforeSubmit:function(){
                    $('#uploadStatus').html('<img src="uploading.png"/>');
                },
                success:function(){
                    $('#images').val('');
                    $('#uploadStatus').html('');
                },
                error:function(){
                    $('#uploadStatus').html('Images upload failed, please try again.');
                }
            });
        }); */
    </script>

    <style>
        ul, ol, li {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        
        .container{padding: 20px;}
        .upload-div{margin-bottom: 25px;}
        .gallery{width:100%; float:left; margin-top:30px;}
        .gallery ul{margin:0; padding:0; list-style-type:none;}
        .gallery ul li{padding:7px; border:2px solid #ccc; float:left; margin:10px 7px; background:none; width:auto; height:auto;}
        .gallery img{width:250px;}


    </style>

</head>
<body>
    <div class="container">
        <div class="upload-div">
            <!-- images upload form -->
            <form method="post" id="uploadForm" enctype="multipart/form-data">
                <label>Choose Images</label>
                <input type="file" name="images[]" id="images" multiple >
                <input type="submit" name="submit" value="UPLOAD"/>
            </form>
        
            <!-- display upload status -->
            <div id="uploadStatus"></div>
        </div>

        <div class="gallery">
            <!-- gallery view of uploaded images --> 
            <div class="gallery" id="imagesPreview"></div>
        </div>
    </div>
</body>
</html>