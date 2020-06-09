<!DOCTYPE html>
<html>
<head>
    <title>Capture webcam image with php and jquery - ItSolutionStuff.com</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <style type="text/css">
        #results { padding:20px; border:1px solid; background:#ccc; }
    </style>
</head>
<body>
  
<div class="container">
    <h1 class="text-center">Capture webcam image with php and jquery - ItSolutionStuff.com</h1>
   
    <form method="POST" action="storeImage.php">
        <div class="row">
            <div class="col-md-6">
                <div id="my_camera"></div>
                <br/>
                <input type=button value="Take Snapshot" onClick="take_snapshot()">
                <?php for($i=0; $i<60; $i++){ ?>
                    <!-- <input type="hidden" name="image" class="image-tag"> -->
                    <!-- <input type="text" name="image[<?=$i;?>]" class="image-tag[<?=$i;?>]"> -->
                    <input type="hidden" name="image[]" class="image-tag<?=$i;?>">
                <?php } ?>
            </div>
            
            <div class="col-md-12">Your captured image will appear here...</div>

            <?php for($i=0; $i<60; $i++){ ?>
                <div class="col-md-6">
                    <div id="results[<?=$i;?>]"></div>
                </div>
            <?php } ?>

            <div class="col-md-12 text-center">
                <br/>
                <button class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
</div>
  
<!-- Configure a few settings and attach camera -->
<script language="JavaScript">
    var i = 0;

    Webcam.set({
        width: 490,
        height: 390,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
  
    Webcam.attach( '#my_camera' );
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            // alert(".image-tag"+i);
            
            // var className = ".image-tag"+i;
            // $(className).val(data_uri);
            // $(".image-tag"+[i]).val(data_uri);

            // var className = ".image-tag["+i+"]";
            // var className = ".image-tag"+[i];
            var className = ".image-tag"+i;
            $(className).val(data_uri);
            // alert(className);
            
            // document.getElementById('results'+[i]).innerHTML = '<img src="'+data_uri+'"/>';
            document.getElementById('results['+i+']').innerHTML = '<img src="'+data_uri+'"/>';
            
            // echo $i;
            // if(i!===2){
            if(i<60){
                i++;
            }else{
                alert("Sorry, the limit has been reached");
            }
        } );
    }
</script>
 
</body>
</html>