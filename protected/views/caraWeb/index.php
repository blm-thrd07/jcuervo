<script type="text/javascript" src="/php2/jcuervo/assets/11f59b72/jquery.js"></script>
<script type="text/javascript" src="/php2/jcuervo/js/jquery.Jcrop.js"></script>
<link rel="stylesheet" href="/php2/jcuervo/css/jquery.Jcrop.css" type="text/css" />

<script type="text/javascript">
  $(function(){

    $('#cropbox').Jcrop({
      aspectRatio: 1,
      onSelect: updateCoords
    });

  });
  function updateCoords(c)
  {
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
  };

  function checkCoords()
  {
    if (parseInt($('#w').val())) return true;
    alert('Please select a crop region then press submit.');
    return false;
  };

</script>

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
