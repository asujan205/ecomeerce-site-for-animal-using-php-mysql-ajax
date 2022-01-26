<!DOCTYPE html>
<html>
<head>
    <title></title>
    
    <style type="text/css">



</style>

<script type="text/javascript">
$(document).ready(function() {
  $.uploadPreview({
    input_field: "#image-upload",
    preview_box: "#image-preview",
    label_field: "#image-label"
  });
});
</script>

<script type="text/javascript">
$(document).ready(function() {
  $.uploadPreview1({
    input_field: "#image-upload1",
    preview_box: "#image-preview1",
    label_field: "#image-label1"
  });
});
</script>

<script type="text/javascript">
$(document).ready(function() {
  $.uploadPreview2({
    input_field: "#image-upload2",
    preview_box: "#image-preview2",
    label_field: "#image-label2"
  });
});
</script>
    
    <script type="text/javascript" src="js/jquery.uploadPreview.min.js"></script>
    <script type="text/javascript" src="js/jquery.uploadPreview1.min.js"></script>
    <script type="text/javascript" src="js/jquery.uploadPreview2.min.js"></script>


    <script type="text/javascript">
       $(document).ready(function() {
       $.uploadPreview({
       input_field: "#image-upload",   // Default: .image-upload
       preview_box: "#image-preview",  // Default: .image-preview
       label_field: "#image-label",    // Default: .image-label
       label_default: "Choose File",   // Default: Choose File
       label_selected: "Change File",  // Default: Change File
       no_label: false                 // Default: false
       });
      });
    </script>

    <script type="text/javascript">
       $(document).ready(function() {
       $.uploadPreview1({
       input_field: "#image-upload1",   // Default: .image-upload
       preview_box: "#image-preview1",  // Default: .image-preview
       label_field: "#image-label1",    // Default: .image-label
       label_default: "Choose File",   // Default: Choose File
       label_selected: "Change File",  // Default: Change File
       no_label: false                 // Default: false
       });
      });
    </script>

<script type="text/javascript">
       $(document).ready(function() {
       $.uploadPreview2({
       input_field: "#image-upload2",   // Default: .image-upload
       preview_box: "#image-preview2",  // Default: .image-preview
       label_field: "#image-label2",    // Default: .image-label
       label_default: "Choose File",   // Default: Choose File
       label_selected: "Change File",  // Default: Change File
       no_label: false                 // Default: false
       });
      });
    </script>

    
    <script type="text/javascript">
      $(document).ready(function() {
      $.uploadPreview({
      input_field: "#callback-upload",
      preview_box: "#callback-preview",
      label_field: "#callback-label",
      success_callback: function() {
      alert("File will now be previewed");
      }
     });
    });
</script>


    <script type="text/javascript">
      $(document).ready(function() {
      $.uploadPreview1({
      input_field: "#callback-upload",
      preview_box: "#callback-preview",
      label_field: "#callback-label",
      success_callback: function() {
      alert("File will now be previewed");
      }
     });
    });
</script>


    <script type="text/javascript">
      $(document).ready(function() {
      $.uploadPreview2({
      input_field: "#callback-upload",
      preview_box: "#callback-preview",
      label_field: "#callback-label",
      success_callback: function() {
      alert("File will now be previewed");
      }
     });
    });
</script>



</head>
<body>
<form method="Post" enctype="multipart/form-data" action="up.php">
  <div class="container"> 
         <div>
            <p style="text-align: center;"><strong>Select the images here.</strong></p> 
         </div>
         <hr>
          <div style="columns: 3">
           <div id="image-preview">
            <label for="image-upload" id="image-label">Choose File</label>
             <input type="file" name="Image1" id="image-upload" required />
           </div>
            <div id="image-preview1">
            <label for="image-upload1" id="image-label1">Choose File</label>
             <input type="file" name="Image2" id="image-upload1" required />
           </div>
           <div id="image-preview2">
            <label for="image-upload2" id="image-label2">Choose File</label>
             <input type="file" name="Image3" id="image-upload2"  required />
           </div>
          </div>
          <hr>


          <div class="btn_grp" style="columns: 2;padding: 2px;position: relative;left: 5px;">
                  
           <input type="text" name="Categories"  id="button1" value="" placeholder="Enter categories" required  >
           <input type="text" name="Breed" id="button2" placeholder="Enter Breed" required  >
           <input type="text" name="Price" id="button3" placeholder="Enter Price" required  >
           <input type="text" name="Place" id="button4" placeholder="Enter Place" required >

          </div>
 

        <hr>
          <textarea rows='1' id="Info" name='Info' placeholder='Post additional information about your animal.' required></textarea>
        <hr>
        <script type="text/javascript">
           var textarea = document.querySelector('textarea');

           textarea.addEventListener('keydown', autosize);
             
             function autosize(){
              var el = this;
              setTimeout(function(){
                el.style.cssText = 'height:auto; padding:0';
                // for box-sizing other than "content-box" use:
                // el.style.cssText = '-moz-box-sizing:content-box';
                el.style.cssText = 'height:' + el.scrollHeight + 'px';
              },0);
            }
        </script>


           <div style="display: none;columns: 2" class='video-prev'>
               <video width="100" class="video-preview"  class="pull-right"  style="position: relative;left: 30px;top: 2px;"  autoplay> </video>
               <pre id="moto" style="font-family: serif;font-size: 18px;"></pre>
           </div>
            

         <div style="columns: 2;padding: 2px;position: relative;left: 5px;">
           
            
        
         
 
          <button type="button" class="button7" name="Video"  style="border-radius: 20px;"><div class="new_Btn" onclick="document.getElementById('moto').innerHTML='Your convenience \n      is our main \n          GOAL.'">Video</div></button><br>
            <input id="html_btn" id="Video" type='file' name="Video" required/>

            <script>
               $('.new_Btn').bind("click" , function () {
               $('#html_btn').click();
           });
           </script>

 <script type="text/javascript">
 $(function() {
    $('#html_btn').on('change', function(){
      if (isVideo($(this).val())){
        $('.video-preview').attr('src', URL.createObjectURL(this.files[0]));
        $('.video-prev').show();
      }
      else
      {
        $('.upload-video-file').val('');
        $('.video-prev').hide();
        alert("Only video files are allowed to upload.")
      }
    });
 });


 function isVideo(filename) {
    var ext = getExtension(filename);
    switch (ext.toLowerCase()) {
    case 'm4v':
    case 'avi':
    case 'mpg':
    case 'mp4':
    case 'mov':
    case 'mpg':
    case 'mpeg':
        // etc
        return true;
           }
    return false;
 }

 function getExtension(filename) {
    var parts = filename.split('.');
    return parts[parts.length - 1];
 }
 </script> 
 <?php
 if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] =true){
  
print('   <input type="submit" class="button5" name="Upload" value="Upload">');
			 
			 
			 
			 }
			 else
			 {
			 	print('<input type="button" class="button6" name="upload1" value="Upload" onclick="check();">');
				}
			 ?>
   </div> 
 </div>
</form>
<div id="id011" class="modal">
	
	<div class="modal-content"><span  class="close" title="Close ">&times;</span>
	<form action="indexe.php" method="post">username:<br>
	<input type="text" class="text1" name="email" required><br>
	password:<br>
	<input type="password" class="text1" name="psw" required>
	<input type="submit" class="btn" value="login" >
	<input type="button" class="btn cancel" value="cancel" >
	 </form>
	
	</div></div>
 <script>
 function check(){
 	document.getElementById("id011").style.display="block";
 };



  
  
 </script>
</body>
</html>