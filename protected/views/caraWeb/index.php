

    <!-- This is the image we're attaching Jcrop to -->
    <img src="http://www.blogcdn.com/www.engadget.com/media/2012/09/400m-ios-devices.jpg" id="cropbox" />

    <!-- This is the form that our event handler fills -->
    <form action="crop.php" method="post" onsubmit="return checkCoords();">
      <input type="hidden" id="x" name="x" />
      <input type="hidden" id="y" name="y" />
      <input type="hidden" id="w" name="w" />
      <input type="hidden" id="h" name="h" />
      <input type="submit" value="Crop Image" class="btn btn-large btn-inverse" />
    </form>
