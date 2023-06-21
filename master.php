<?php 
    include("header.php");
    include("sidebar.php");
?>
<style type="text/css">
.masterBtns
{
    border-color:#137a8a !important;
    background-color: #fff !important;
    color: #137a8a;
    display: inline-block;
    font-weight: bold;
    line-height: 1.25;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    cursor: pointer;
    user-select: none;
    border: 1px solid transparent;
    padding: 0.75rem 1rem;
    font-size: 1rem;
    border-radius: 20rem;
    transition: all 0.2s ease-in-out; 
    font-family:"ubuntu";
    margin-top: 4%;
}
html body .content .content-wrapper .content-header-title {
    text-transform: uppercase;
    font-weight: 500;
    letter-spacing: 1px;
    color: #1B2942;
    text-align: center;
    margin-bottom: 5px;
}
hr {
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 1px solid rgba(110, 69, 139, 0.46)!important;
}
hr.head-line {
    margin-bottom: 7px;
    margin-top: 7px;
}
/*.navbar-container.content.container-fluid {
    background: aqua;
}*/

/*.app-content
{
    position: relative !important;
    top:0px !important;
    left :20px !important;
}*/
</style>
<style type="text/css">
 

</style>
<div class="app-content content container-fluid" >
    <div class="content-wrapper">
        <div class="content-header row">
            
        </div>
        <!-- Basic form layout section start -->
        <div class="content-body">
            <section id="basic-form-layouts" style="">
                <div class="card" style="">
                    <div class="card-body collapse in">
                        <div class="card-block">
                            <div class="content-header-left col-md-12 col-xs-12">
                               <hr class="head-line"> <h3 class="content-header-title">Masters</h3><hr class="head-line">
                            </div>
                            <h6 class="content-header-title" style="font-weight: bold;">Products</h6>
                            <div class="row">
                                <div class = "col-md-4">
                                    <a class="masterBtns"  style = "width: 100%" href= "product_group.php">PRODUCT GROUP</a>
                                </div>
                                <div class = "col-md-4">    
                                    <a class="masterBtns"   style = "width: 100%"  href= "product_details.php">PRODUCTS</a>
                                </div>
                                <!-- <div class = "col-md-4">
                                    <a class="masterBtns"  style = "width: 100%" href= "product_type.php">TYPE</a>
                                </div>
                                <div class = "col-md-4">
                                    <a class="masterBtns"  style = "width: 100%" href= "packing.php">PACKING</a>
                                </div> -->
                            </div>  
                            
                            
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<?php 
  include("footer.php");
?>
