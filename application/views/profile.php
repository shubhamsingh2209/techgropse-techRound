<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  /*flex: 75%;*/
      margin-left: 25%;
}

.col-25,
.col-50,
.col-75 {
  /*padding: 0 16px;*/
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

.error{
  color: red;
    font-size: 12px;
    margin-bottom: 12px;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
</head>
<body>

<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="/ProfileDetail/submit" method="POST" enctype='multipart/form-data'>
        <div class="row">
          <div class="col-50">
            <h3>Profile Details</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <?php if(isset($formdata['firstname']) && $formdata['firstname']!='') : ?>
              <input type="text" id="fname" name="firstname" value="<?php echo $formdata['firstname']; ?>">
            <?php else: ?>
              <input type="text" id="fname" name="firstname" value="" placeholder="John M. Doe">
            <?php endif; ?>

            <?php if(isset($error['name'])): ?>
                <span class="error"><?php echo $error['name'] ?></span>
            <?php endif; ?>
            

            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <?php if(isset($formdata['email']) && $formdata['email']!=''): ?>
              <input type="text" id="email" name="email" value="<?php echo $formdata['email']; ?>">
            <?php else: ?>
              <input type="text" id="email" name="email" value="" placeholder="john@example.com">
            <?php endif; ?>
            
            <?php if(isset($error['email'])): ?>
                <span class="error"><?php echo $error['email'] ?></span>
            <?php endif; ?>
            
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <?php if(isset($formdata['address']) && $formdata['address']!=''): ?>
              <input type="text" id="adr" name="address" value="<?php echo $formdata['address']; ?>">
            <?php else: ?>
              <input type="text" id="adr" name="address" value="" placeholder="542 W. 15th Street">
            <?php endif; ?>

            <?php if(isset(   $error['address'])): ?>
                <span class="error"><?php echo $error['address'] ?></span>
            <?php endif; ?>

            <label for="city"><i class="fa fa-institution"></i> City</label>
            <?php if(isset($formdata['city']) && $formdata['city']!=''): ?>
              <input type="text" id="city" name="city" value="<?php echo $formdata['city'] ?>" placeholder="New York">
            <?php else: ?>
              <input type="text" id="city" name="city" value="" placeholder="New York">
            <?php endif; ?>
            
            <?php if(isset(   $error['city'])): ?>
                <span class="error"><?php echo $error['city'] ?></span>
            <?php endif; ?>
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <?php if(isset(   $error['image'])): ?>
                <div class="error"><?php echo $error['image'] ?></div>
            <?php endif; ?>             
        <input type="submit" value="Submit" class="btn">
      </form>
    </div>
  </div>
</div>

</body>
</html>
