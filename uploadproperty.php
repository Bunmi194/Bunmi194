<?php 
session_start();

    include_once "portalheader.php";
    include_once "shared/constants.php";
    include_once "shared/common.php";

    
    
    // $lg = new Common();
    // $record = $lg->getLg();
    // echo "<pre>";
    // print_r($_REQUEST);
    // echo "</pre>";
?>

<style>
    .upload{
        margin:;
        background-color: #F8F4F9;
        border-radius: 10px;
    }
    .new{
        margin-top: 100px;
    }
    .space{
        margin: 30px 0px;
    }
    .block p{
        text-align: center;
        padding: auto;
    }
    #close{
        margin: 0px 10px;
        border: 1px solid #000;
        background-color: green;
        padding: 0px 6px;
    }
    #close:hover{
        cursor: pointer;
    }
    .red{
        color: red;
    }
    .block{
        margin-top: 60px; 
    }
</style>
    <!-- new -->

    <?php
    // session_start();
    include_once "shared/landlord.php";
    $id = $_SESSION['id'];

    if(isset($_REQUEST['submit']) && ($_SERVER['REQUEST_METHOD']) == "POST" && isset($_SESSION['id']) && $_SESSION['logger'] = "K!NG_DAViD" && isset($_SESSION['landlord'])){
        $error = array();
        //validation here

        
        // echo "<pre>";
        // print_r($_REQUEST);
        // echo "</pre>";
        if(isset($_FILES['image1']) && ($_FILES['image1']['size'] > 40000000)){
            $error['size'] = "File size is too large";
        }
        if(isset($_FILES['image2']) && ($_FILES['image2']['size'] > 40000000)){
            $error['size'] = "File size is too large";
        }
        if(isset($_FILES['image3']) && ($_FILES['image3']['size'] > 40000000)){
            $error['size'] = "File size is too large";
        }
        if(isset($_FILES['image4']) && ($_FILES['image4']['size'] > 40000000)){
            $error['size'] = "File size is too large";
        }
        if(isset($_FILES['image5']) && ($_FILES['image5']['size'] > 40000000)){
            $error['size'] = "File size is too large";
        }


        if(empty($_REQUEST['title'])){
            $error['title'] = "Title field cannot be empty";
        }
        if(empty($_REQUEST['price'])){
            $error['price'] = "Price field cannot be empty";
        }
        if(empty($_REQUEST['address'])){
            $error['address'] = "Address field cannot be empty";
        }
        if(empty($_REQUEST['description'])){
            $error['description'] = "Please enter a detailed description";
        }
        if(empty($_REQUEST['category'])){
            $error['category'] = "Please select a category";
        }
        if(empty($_REQUEST['lcda'])){
            $error['lcda'] = "Please select an LCDA";
        }
        if(empty($_FILES['image1']['name'])){
            $error['image1'] = "Please select at least one image";
        }


        //validation here

                    //image validation
                
                    if(isset($_FILES['image1']) && !empty($_FILES['image1']['name'])){
                        //check file extension
                        
                        $acceptfileext = ['png','jpg','svg','gif'];
                        $filename = $_FILES['image1']['name'];
                        $imgarray = explode('.', $filename);
                        $imgext = end($imgarray);
                        if(!in_array(strtolower($imgext),$acceptfileext)){
                            $error['ext'] = "Please upload only .png, .jpg, .svg and .gif files";
                        }
                        if($_FILES['image1']['size'] > 10485760){
                            $error['ext'] = "Max file size of 10mb each";
                        }
                    }
                
                    //image2


                    if(isset($_FILES['image2']) && !empty($_FILES['image2']['name'])){
                        //check file extension
                        
                        $acceptfileext = ['png','jpg','svg','gif'];
                        $filename = $_FILES['image2']['name'];
                        $imgarray = explode('.', $filename);
                        $imgext = end($imgarray);
                        if(!in_array(strtolower($imgext),$acceptfileext)){
                            $error['ext'] = "Please upload only .png, .jpg, .svg and .gif files";
                        }
                        if($_FILES['image2']['size'] > 10485760){
                            $error['ext'] = "Max file size of 10mb each";
                        }
                    }

                    //image3
                    
                    if(isset($_FILES['image3']) && !empty($_FILES['image3']['name'])){
                        //check file extension
                        
                        $acceptfileext = ['png','jpg','svg','gif'];
                        $filename = $_FILES['image3']['name'];
                        $imgarray = explode('.', $filename);
                        $imgext = end($imgarray);
                        if(!in_array(strtolower($imgext),$acceptfileext)){
                            $error['ext'] = "Please upload only .png, .jpg, .svg and .gif files";
                        }
                        if($_FILES['image3']['size'] > 10485760){
                            $error['ext'] = "Max file size of 10mb each";
                        }
                    }
            
                    //image4

                    if(isset($_FILES['image4']) && !empty($_FILES['image4']['name'])){
                        //check file extension
                        
                        $acceptfileext = ['png','jpg','svg','gif'];
                        $filename = $_FILES['image4']['name'];
                        $imgarray = explode('.', $filename);
                        $imgext = end($imgarray);
                        if(!in_array(strtolower($imgext),$acceptfileext)){
                            $error['ext'] = "Please upload only .png, .jpg, .svg and .gif files";
                        }
                        if($_FILES['image4']['size'] > 10485760){
                            $error['ext'] = "Max file size of 10mb each";
                        }
                    }

                    //image5

                    if(isset($_FILES['image5']) && !empty($_FILES['image5']['name'])){
                        //check file extension
                        
                        $acceptfileext = ['png','jpg','svg','gif'];
                        $filename = $_FILES['image5']['name'];
                        $imgarray = explode('.', $filename);
                        $imgext = end($imgarray);
                        if(!in_array(strtolower($imgext),$acceptfileext)){
                            $error['ext'] = "Please upload only .png, .jpg, .svg and .gif files";
                        }
                        if($_FILES['image5']['size'] > 10485760){
                            $error['ext'] = "Max file size of 10mb each";
                        }
                    }
                        
            
                            //end image validation
            
        
        //image limit 6
            
            if(isset($_FILES['image6'])){
                $error['img'] = "Maximum of 6 images allowed";
            }

            if(!empty($_REQUEST['title']) && !empty($_REQUEST['price']) && !empty($_REQUEST['address']) && !empty($_REQUEST['description']) && !empty($_REQUEST['category']) && !empty($_REQUEST['lcda']) && empty($error)){


               
                //create new instance of landlord class
                $clean = new Common();
                
        $title = $clean->clean($_REQUEST['title']);
        $price = $clean->clean($_REQUEST['price']);
        $address = $clean->clean($_REQUEST['address']);
        $description = $clean->clean($_REQUEST['description']);
        $category = $clean->clean($_REQUEST['category']);
        $lcda = $clean->clean($_REQUEST['lcda']);
        $id = $_SESSION['id'];

        $upload = new Landlord();
        $output = $upload->uploadProperty($title, $address, $price, $description, $id, $category, $lcda);

        if(empty($output)){
            echo "<div class='alert alert-success block'><p>Your property has been successfully uploaded<span id='close'>&times;</span></p>
            </div>";
            include_once "uploadproperty.php";

        }else{
            echo "<div class='alert alert-danger block'>Property upload failed</div>";
            header("Location: uploadproperty.php");
            exit();
        }

        //image limit 6

        
        
        // echo $output;
        // echo "<pre>";
        // print_r($_FILES);
        // echo "</pre>";

    }
}
?>

    <!-- new ends -->
    <div class="container upload">
        <form action="uploadproperty.php" method="POST" enctype="multipart/form-data" class="form-control upload">
            <div class="row new">
                <div class="">
                    <h1>Upload Apartment</h1>
                </div>
            </div>
            <div class="row space">
            <p><?php 
                if(isset($error['img'])){
                    echo "<span class='red'>".$error['img']."</span>";
                    
                    }
                if(isset($error['ext'])){
                    echo "<span class='red'>".$error['ext']."</span>";
                        
                }
                if(isset($error['size'])){
                    echo "<span class='red'>".$error['size']."</span>";
                            
                }
                if(isset($status)){
                    echo $status;
                            
                }
                if(isset($_REQUEST['title'])){                    
                $datatitle = $_REQUEST['title'];
                }
                if(isset($_REQUEST['price'])){                    
                $dataprice = $_REQUEST['price'];
                }
                if(isset($_REQUEST['address'])){                    
                $dataaddress = $_REQUEST['address'];
                }
                if(isset($_REQUEST['description'])){                    
                $datadesc = $_REQUEST['description'];
                }
                    
                ?></p>
                <div class="col">
                    <label for="title" class="form-label">Title:</label>
                    <input class="form-control" type="text" name="title" id="title" placeholder="2 Bedroom Apartment" value="<?php if(isset($datatitle)){echo $datatitle;}?>">
                    <p><?php if(isset($error['title'])){echo "<span class='red'>".$error['title']."</span>";}?></p>
                </div>
                <div class="col">
                    <label class="form-label" for="title">Price:</label>
                    <span>&#8358;</span><input class="form-control" type="text" name="price" id="price" placeholder="300000" value="<?php if(isset($dataprice)){echo $dataprice;}?>">
                    <p><?php if(isset($error['price'])){echo "<span class='red'>".$error['price']."</span>";}?></p>
                </div>
            </div>
            <div class="row space">
                <div class="col">
                    <label for="address" class="form-label">Address:</label><br>
                    
                    <textarea class="form-control" name="address" id="address" cols="30" rows="3" placeholder="3, Allen Avenue, Ikeja, Lagos."><?php if(isset($dataaddress)){echo $dataaddress;}?></textarea>
                    <p><?php if(isset($error['address'])){echo "<span class='red'>".$error['address']."</span>";}?></p>
                </div>
                <div class="col">
                    <label for="description" class="form-label">Description:</label><br>
                    
                    <textarea class="form-control" name="description" id="description" cols="30" rows="3" placeholder="Fully serviced 2 Bedroom apartment with running taps, security and parking space."><?php if(isset($datadesc)){echo $datadesc;}?></textarea>
                    <p><?php if(isset($error['description'])){echo "<span class='red'>".$error['description']."</span>";}?></p>
                </div>
            </div>
            <div class="row space">
                <div class="col">
                    <label for="category" class="form-label">Category:</label>
                    <select class="form-control" name="category" id="category">
                        <option value="">Choose Category</option>
                        <?php 
                                                    
                            $lg = new Common();
                            $record = $lg->getApartment();
                            foreach ($record as $key => $value) {
                                $id = $value['category_id'];
                                $cat = $value['category'];
                                if (isset($_REQUEST['category']) && ($_REQUEST['category'] == $id)) {
                                    
                                    echo "<option value='$id'selected>$cat</option>";
                                }else{

                                
                               
                        ?>
                            <option value='<?php echo $id;?>'><?php echo $cat;?></option>
                        <?php
                                
                            }
                        }
                        ?>
                    </select>
                    <p><?php if(isset($error['category'])){echo "<span class='red'>".$error['category']."</span>";}?></p>
                </div>
                <div class="col">
                    <label class="form-label" for="lcda">LCDA:</label>
                    <select class="form-control" name="lcda" id="lcda">
                        <option value="">Choose LCDA</option>
                        <?php 
                                                    
                            $lg = new Common();
                            $record = $lg->getLg();
                            foreach ($record as $key => $value) {
                                $id = $value['location_id'];
                                $loc = $value['location'];
                                if (isset($_REQUEST['lcda']) && ($_REQUEST['lcda'] == $id)) {
                                    
                                    echo "<option value='$id'selected>$loc</option>";
                                }else{
                        ?>
                            <option value='<?php echo $id;?>'><?php echo $loc;?></option>
                        <?php
                                
                            }
                        }
                        ?>
                    </select>
                    <p><?php if(isset($error['lcda'])){echo "<span class='red'>".$error['lcda']."</span>";}?></p>
                </div>
            </div>
            <div class="row space">
                <div class="col">
                    <label class="form-label" for="image1">Cover Image</label>
                    <input class="form-control" type="file" name="image1" id="image1">
                    <p><?php if(isset($error['image1'])){echo "<span class='red'>".$error['image1']."</span>";}?></p>
                </div>
                <div class="col img" id="div">
                    <label class="form-label" for="image2">Image 2</label>
                    <input class="form-control" type="file" name="image2" id="image1">
                
                </div>
            </div>
            <div class="row space">
                <div class="col">
                    <button type="button" class="btn btn-primary" id="addimage">Add Image</button>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-danger" id="remimage">Remove Image</button>
                </div>
            </div><br>
            <div class="row space">
                <div class="col">
                    <button type="submit" name="submit">Submit</button>
                </div>
                <div class="col">
                </div>
            </div><br>
        </form>
    </div>
<script src="jquery/jquery.js" type="text/javascript"></script>
<script type="text/javascript">
    var i = 3;
    $(document).ready(function(){
        
        $('#addimage').click(function(){            
                var c = $(this).prop('disabled');
        if(i>=3 && i<=5){
            $(".img").append('<p class="removeimage"><label class="form-label" for="image'+i+'">Image '+i+'</label><input type="file" name="image'+i+'" class="image1 form-control"><p>');
            i++; 
        }else{
            $('#addimage').prop('disabled',true);   
        }
        //alert(i);
                  
            
        })
            
        $("#remimage").click(function(){
            if(i >= 4 && i<=6){
            var d = $(this).prop('disabled');
            if(i < 7){
                $('#addimage').prop('disabled',false);
            }
            $("#div .removeimage:last").remove();
            --i;
            //alert(i);

            }
        });

    });
            
    
</script>
<?php include_once "footer.php"?>