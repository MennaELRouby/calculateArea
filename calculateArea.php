<?php
include_once("con_db.php");
include_once("area.php");
if($_SERVER["REQUEST_METHOD"]==="POST")
{
try{
  $sql = "INSERT INTO `area`(`width`, `height`, `raduis`, `shape`, `area`) VALUES (?,?,?,?,?)";
  $width = $_POST["width"];
  $height = $_POST["height"];
  $raduis = $_POST["raduis"];
  $shape = $_POST["shape"];
  $area_shape = new Area();
  switch ($shape)
  {
    case "r":
      $area= $area_shape->rArea("$width", "$height");
      $rshape = "selected";
      $cshape="";
      $sshape="";
      break;
    case "c":
      $area= $area_shape->cArea("$raduis");
      $cshape="selected";
      $rshape="";
      $sshape="";
      break;
    case "s":
      $area= $area_shape->sArea("$width");
      $sshape="selected";
      $cshape="";
      $rshape="";
      break;

  }
  
  $stmt = $conn->prepare($sql);
  $stmt->execute([$width, $height, $raduis, $shape, $area]);
}catch(PDOException $e){
  echo "Connection Failed:" . $e->getMessage();
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Calculate Area</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Calculate Area</h2>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <div class="form-group">
      <label for="width">Width:</label>
      <input type="number" name ="width" class="form-control" id="width" placeholder="Enter Width">
    </div>
    <div class="form-group">
      <label for="height">Height:</label>
      <input type="number" name ="height" class="form-control" id="height" placeholder="Enter Height">
    </div>
    <div class="form-group">
      <label for="radius">Radius:</label>
      <input type="number" name ="raduis" class="form-control" id="radius" placeholder="Enter Radius">
    </div>
    <div class="form-group">
      <label for="shape">Shape:</label>
      <select name="shape" id="shape">
        <option value="r" <?php echo $rshape?>>Rectangle</option>
        <option value="c" <?php echo $cshape?>>Circle</option>
        <option value="s" <?php echo $sshape?>>Square</option>
      </select>
    </div>
    <div class="form-group">
      <label for="radius">Area:</label>
      <input type="number" name ="area" class="form-control" id="area" placeholder="Area is" value ="<?php echo $area ?>" >
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>
</body>
</html>
