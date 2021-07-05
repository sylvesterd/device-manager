<?php
include 'includes/initP.php';

?>


<div class="row">
    <div class="col-sm-12">
        <div class="tabbable">
            <ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
                <li class="active">
                    <a data-toggle="tab">CATEGORIES</a>
                </li>

            </ul>

            <div class="tab-content">
                <div id="listing" class="tab-pane in active">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="widget-box">
                                <div class="widget-header">
                                    <div class="pull-right">
                                       <div style="margin-right: 20px;">
                                           <div class="col-xs-12 col-sm-8 col-md-8">
                                               <!--                                            <label class="block clearfix">Brand Description</label>-->
                                                <span class="block input-icon input-icon-right">
                                                    <input type="hidden" id="cateditid" value="">
                                                    <input name="category" id="category" type="text" class="form-control"
                                                                       placeholder="Add new Category"/>
                                                </span>
                                           </div>
                                           <div class="col-xs-12 col-sm-4 col-md-4">
                                               <button onclick="addCategory(); return false;" id="addbrand" type="button"
                                                       class="centre btn btn-sm btn-success">
                                                   <span class="bigger-50">Submit</span>

                                                   <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                                               </button>
                                           </div>
                                       </div>
                                    </div>
                                    <h4 class="smaller pull-left">CATEGORY LISTING</h4>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="widget-body">
                                    <div class="widget-main">
                                        <div id="displayCategories">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div>
            </div>
        </div>
    </div><!-- /.col -->
</div>


<?php
include_once("includes/footer.php");
?>

