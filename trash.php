
                <div>
                    <img src="images/apartment.jpg" alt="" width="300" height="200">
                    <p class="bold">SERVICED APARTMENTS</p>
                    <img class="imgloc" src="images/location.png" alt="location"><span class="bold">Lagos Island</span><br>
                    <button><a href="more.php">View More</a></button>
                </div>
                <div>
                    <img src="images/country.jpg" alt="" width="300" height="200">
                    <p class="bold">COUNTRY HOMES</p>
                    <img class="imgloc" src="images/location.png" alt="location"><span class="bold">Lagos Mainland</span><br>
                    <button><a href="more.php">View More</a></button>
                </div>
                <div>
                    <img src="images/condo.jpg" alt="" width="300" height="200">
                    <p class="bold">CONDOMINIUMS</p>
                    <img class="imgloc" src="images/location.png" alt="location"><span class="bold">Lagos Island</span><br>
                    <button><a href="more.php">View More</a></button>
                </div>





                <div class="col-md-4 mt-2">
            <form action="more.php" method="POST">
            <img src="images/oshodi.png" alt="" width="300" height="200">
            <p class="bold"></p>
            <img class="imgloc" src="images/location.png" alt="location"><span class="bold">Lagos</span><br>
            <button name="" type="submit">View More</button>
            </form>
        </div>
        <div class="col-md-4 mt-2">
            <form action="more.php" method="POST">
            <img src="images/oshodi.png" alt="" width="300" height="200">
            <p class="bold"></p>
            <img class="imgloc" src="images/location.png" alt="location"><span class="bold">Lagos</span><br>
            <button name="" type="submit">View More</button>
            </form>
        </div>
        <div class="col-md-4 mt-2">
            <form action="more.php" method="POST">
            <img src="images/oshodi.png" alt="" width="300" height="200">
            <p class="bold"></p>
            <img class="imgloc" src="images/location.png" alt="location"><span class="bold">Lagos</span><br>
            <button name="" type="submit">View More</button>
            </form>
        </div>
        <div class="col-md-4 mt-2">
            <form action="more.php" method="POST">
            <img src="images/oshodi.png" alt="" width="300" height="200">
            <p class="bold"></p>
            <img class="imgloc" src="images/location.png" alt="location"><span class="bold">Lagos</span><br>
            <button name="" type="submit">View More</button>
            </form>
        </div>
        <div class="col-md-4 mt-2">
            <form action="more.php" method="POST">
            <img src="images/oshodi.png" alt="" width="300" height="200">
            <p class="bold"></p>
            <img class="imgloc" src="images/location.png" alt="location"><span class="bold">Lagos</span><br>
            <button name="" type="submit">View More</button>
            </form>
        </div>
  
        
        $statement = $this->dbcon->prepare("SELECT DISTINCT images_apartments.apartments_id, images_apartments.url, apartments.title, apartments.price, apartments.status, apartment_location.location FROM apartments LEFT JOIN apartment_category ON apartment_category.category_id = apartments.category_id LEFT JOIN apartment_location ON apartment_location.location_id = apartments.location_id LEFT JOIN images_apartments ON images_apartments.apartments_id = apartments.apartments_id WHERE apartment_category.category_id=?"


        <div>
                    <img src="images/marina.jpg" alt="" width="300" height="200">
                    <p class="bold">MARINA - LAGOS</p>
                    <img class="imgloc" src="images/location.png" alt="location"><span class="bold">Lagos Island</span><br>
                    <button><a href="more.php">View More</a></button>
                </div>
                <div>
                    <img src="images/yaba.jpg" alt="" width="300" height="200">
                    <p class="bold">YABA - LAGOS</p>
                    <img class="imgloc" src="images/location.png" alt="location"><span class="bold">Lagos Mainland</span><br>
                    <button><a href="more.php">View More</a></button>
                </div>
                <div>
                    <img src="images/oshodi.jpg" alt="" width="300" height="200">
                    <p class="bold">OSHODI</p>
                    <img class="imgloc" src="images/location.png" alt="location"><span class="bold">Lagos Mainland</span><br>
                    <button><a href="more.php">View More</a></button>
                </div>


                if(isset($_FILES['image2'])){
                        //check file extension
                        $exterror = array();
                        $acceptfileext = ['png','jpg','svg','gif'];
                        $filename = $_FILES['image2']['name'];
                        $imgarray = explode('.', $filename);
                        $imgext = end($imgarray);
                        if(!in_array(strtolower($imgext),$acceptfileext)){
                            $exterror['ext'] = "Please upload only .png, .jpg, .svg and .gif files";
                        }elseif($_FILES['image2']['size'] > 10485760){
                            $exterror['ext'] = "Max file size of 10mb each";
                        }
                        return $exterror;
                    }
            
                    //
            
                    if(isset($_FILES['image3'])){
                        //check file extension
                        $exterror = array();
                        $acceptfileext = ['png','jpg','svg','gif'];
                        $filename = $_FILES['image3']['name'];
                        $imgarray = explode('.', $filename);
                        $imgext = end($imgarray);
                        if(!in_array(strtolower($imgext),$acceptfileext)){
                            $exterror['ext'] = "Please upload only .png, .jpg, .svg and .gif files";
                        }elseif($_FILES['image3']['size'] > 10485760){
                            $exterror['ext'] = "Max file size of 10mb each";
                        }
                        return $exterror;
                    }
            
                    //
            
                    if(isset($_FILES['image4'])){
                        //check file extension
                        $exterror = array();
                        $acceptfileext = ['png','jpg','svg','gif'];
                        $filename = $_FILES['image4']['name'];
                        $imgarray = explode('.', $filename);
                        $imgext = end($imgarray);
                        if(!in_array(strtolower($imgext),$acceptfileext)){
                            $exterror['ext'] = "Please upload only .png, .jpg, .svg and .gif files";
                        }elseif($_FILES['image4']['size'] > 10485760){
                            $exterror['ext'] = "Max file size of 10mb each";
                        }
                        return $exterror;
                    }
            
                    //
            
                    if(isset($_FILES['image5'])){
                        //check file extension
                        $exterror = array();
                        $acceptfileext = ['png','jpg','svg','gif'];
                        $filename = $_FILES['image5']['name'];
                        $imgarray = explode('.', $filename);
                        $imgext = end($imgarray);
                        if(!in_array(strtolower($imgext),$acceptfileext)){
                            $exterror['ext'] = "Please upload only .png, .jpg, .svg and .gif files";
                        }elseif($_FILES['image5']['size'] > 10485760){
                            $exterror['ext'] = "Max file size of 10mb each";
                        }
                        return $exterror;
                    }
            
                    //image validation
                   