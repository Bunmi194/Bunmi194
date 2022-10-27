<?php include_once "portalheader.php"?>
<style>
    #divform{
        margin: 100px 10px;
    }
    .buttonstyle{
        margin-right: 30px;
    }
    .red{
        color: red;
        font-size: 14px;
    }
</style>
<?php
    echo "<pre>";
    print_r($_REQUEST);
    echo "</pre>";
?>
<div class="container mt-5">
    <div class="row">
        <div class="col form-control" id="divform">
            <h2>Choose a date and time slot</h2>
            
                <?php
                    if (isset($error['field'])) {
                        echo "<p class='red'>".$error['field']."</p>";
                    }

                    if (isset($error['dateinterval'])) {
                        echo "<p class='red'>".$error['dateinterval']."</p>";
                    }

                    
                ?>
            
            <form action="processinspection.php?id=<?php echo $_REQUEST['id']?>" method="POST" class="form-control mt-5 mb-5 pt-5">
                <div>
                    <label for="date" class="form-label">Select a date</label>
                    <input type="date" name="date" id="date" class="form-control mt-2 mb-2">
                </div>
                <div>
                    <label for="time" class="form-label">Select time</label>
                    <input type="time" name="time" id="time" class="form-control mt-2 mb-2">
                </div>
                <div>
                    <button type="submit" name="btncancel" class="btn btn-danger mt-3 mb-3 mr-3 buttonstyle">Cancel</button>
                    <button type="submit" name="btnaccept" class="btn btn-success mt-3 mb-3 mr-3 buttonstyle">Book</button>
                </div>
            </form>
        </div>

    </div>
</div>
<?php include_once "footer.php"?>