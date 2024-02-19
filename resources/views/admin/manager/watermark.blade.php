<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>HTML2Canvas</title>
	<script src="https://code.jquery.com/jquery-3.6.0.js" ></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    <style>
    	.image-input{
				margin: 0 0 10px 0;
			}
			.wrapper{
				width: 400px;
				height: 400px;
				background-color: #ccc;
			}
			.form-preview{
				position: relative;
				border: 5px solid #4e1864;
			    background-position: top center;
			    background-repeat: no-repeat;
			    background-size: cover;
			}
			.form-preview .banner-logo{
				position: absolute;
				top: 0;
				left: 50px;
				width: 300px;
				height: 40px;
				background-color: #4e1864;
				display: flex;
				align-items: center;
				justify-content: center;
				clip-path: polygon(0 0, 100% 0, 90% 100%, 10% 100%);
				text-align: center;
				font-weight: bold;
				color: #fff;
				font-size: 24px;
			}
    </style>		
</head>
<body>
	<input type="file" class="image-input" accept="image/*">
	<div class="wrapper form-preview" id="imagesave">
		<div class="banner-logo">株式会社６７８９</div>
	</div>
	<button id="save_image_locally">Download</button>
</body>
<script defer="">
	
	$(document).on('change', '.image-input', function(e) {
    var father = $(this).parent().parent()
    if(this.files[0].size > 5242880){
       alert("File quá lớn, dung lượng upload tối đa 5 MB!");
    }else{
        var img = new Image;
        img.src = URL.createObjectURL(e.target.files[0]);
        img.onload = function() {
            father.find('.form-preview').css({
                'background-image' : `url('${URL.createObjectURL(e.target.files[0])}')`
            })
        }
    }
});

  $('#save_image_locally').click(function(){
    html2canvas(document.querySelector('#imagesave')).then(function(canvas) {

        saveAs(canvas.toDataURL(), 'file-name.png');
    });
    // html2canvas($('#imagesave')[0], 
    // {
    //   onrendered: function (canvas) {
    //     var a = document.createElement('a');
    //     // toDataURL defaults to png, so we need to request a jpeg, then convert for file download.
    //     a.href = canvas.toDataURL("image/jpeg").replace("image/jpeg", "image/octet-stream");
    //     a.download = 'somefilename.jpg';
    //     a.click();
    //   }
    // });
  });
  
function saveAs(uri, filename) {

    var link = document.createElement('a');

    if (typeof link.download === 'string') {

        link.href = uri;
        link.download = filename;

        //Firefox requires the link to be in the body
        document.body.appendChild(link);

        //simulate click
        link.click();

        //remove the link when done
        document.body.removeChild(link);

    } else {

        window.open(uri);

    }
}
</script>
</html>