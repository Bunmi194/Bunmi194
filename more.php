<?php
    include_once "header.php";
?>
<style>
    #header{
        margin-top: 100px;
    }
    .morewrapper{
        display: flex;
    }
    .morewrapperchild{
        width: 20%;
        height: inherit;
    }
    .slider{
        width: 60% !important;

    }
    .description{
        margin-top: 100px;
    }
    
</style>
    <div id="header">
        <h2>House title: Fully Detached Duplex</h2>
        <h3>Category: Duplex</h3>
        <h6>Location: Ibeju Lekki</h6>
    </div>
    <div class="morewrapper">
        <div class="morewrapperchild">
            left
        </div>
        <div class="morewrapperchild slider">
            <?php include_once "shared/slider.php"?>
            <div class="description">
                Description
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex repellendus ratione odit, corrupti adipisci porro fugiat mollitia amet minima, asperiores atque odio commodi soluta dolores. Quo nihil iure corporis nostrum.</p>
                
                <div class="action">
                        
                        <button>Book Inspection</button>
                        <button>Rent</button>
                </div>
            </div>
        </div>
        <div class="morewrapperchild">
            right
        </div>
    </div>
        
    
<?php
    include_once "footer.php";
?>