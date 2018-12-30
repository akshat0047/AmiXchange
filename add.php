<?php include_once "header.php"; ?>

<section class="container-fluid profile-section">

  <div class="row">
    <div class=" offset-md-3 offset-lg-3 col-sm-12 col-md-6 col-lg-6 text-center">
      <div class="add-form ">
    <form class="text-center" action="includes/add.inc.php" method="POST" enctype="multipart/form-data">
      <h4 id="Log-head" class="log-head text-center">ADD DETAILS</h4>
      <input class="inputs" type="text" value="<?php if(isset($_GET['pnerr'])){echo($_GET['pnerr']);} else if(isset($_GET['pn'])){echo($_GET['pn']);}?>" name="productname" placeholder="Product Name" required/><br/>
      <select class="inputs xyz" name="producttype" required>
      <option>Product Type</option>
      <option value="Study Material Hardcopy">Study Material Hardcopy</option>
      <option value="Study Material Softcopy">Study Material Softcopy</option>
      <option value="Stationary">Stationary</option>
      <option value="Skill Work(Sketching,Designing,Blogging)">Skill Work(Sketching,Designing,Blogging)</option>
      <option value="Electronics">Electronics</option>
      <option value="Electronics Accessories">Electronics Accessories</option>
      <option value="Vehicle">Vehicle</option>
      <option value="Shoes">Shoes</option>
      <option value="Clothes">Clothes</option>
      </select><br/>
      <input class="inputs" type="date" name="tsp" placeholder="Time Since Purchase" required/><br/>
      <input class="inputs" type="text" name="price" placeholder="Price" required/><br/>
      <input class="inputs" type="textarea" name="description" placeholder="Description" required/><br/>
      <input class="inputs file_input" id="productfile" type="file" name="productpic" placeholder="Select a picture" required/><br/>
      <label class="inputs file_label" for="productfile">CHOOSE A PICTURE</label>
      <button id="submit-btn"  name="submit" type="submit" >SUBMIT</button>
  </form>

  </div>

   </div>
   </div>

  </section>

<?php  include_once "footer.php"; ?>
