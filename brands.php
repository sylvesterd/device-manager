<?php
include 'includes/initP.php';

?>


<div class="row">
    <div class="col-sm-12">
        <div class="tabbable">
            <ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
                <li class="active">
                    <a data-toggle="tab" href="#listing">BRANDS</a>
                </li>

               <!-- <li>
                    <a data-toggle="tab" href="#newbrand">NEW BRAND</a>
                </li>-->

            </ul>

            <div class="tab-content">
                <div id="listing" class="tab-pane in active">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="widget-box">
                                <div class="widget-header">
                                    <div class="pull-right">
                                       <div style="margin-right: 10px; margin-top: 3px;">
                                           <div class="col-xs-12 col-sm-8 col-md-8">
                                               <div class="row">
                                                   <div class="col-xs-12 col-sm-6 col-md-6">
                                                       <?php
                                                       $query = "SELECT * FROM " . TBL_CATEGORY;

                                                       $result = $dbase->dbquery($query);
                                                       ?>
                                                       <!--<label class="block clearfix">Brand Description</label>-->
                                                       <select name="category" id="category" class=" chosen-select form-control" style="width: 100% !important;" required>

                                                           <option value="" selected disabled>Select Category</option>
                                                           <?php foreach($result as $data){ ?>
                                                               <option value="<?= $data['CId'] ?>"><?= $data['CDescription'] ?></option>
                                                           <?php } ?>
                                                       </select>
                                                   </div>
                                                   <div class="col-xs-12 col-sm-6 col-md-6">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="hidden" id="txteditid" value="">
                                                            <input name="brandname" id="brandname" type="text" class="form-control" placeholder="Add new brand name"/>
                                                        </span>
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="col-xs-12 col-sm-4 col-md-4">
                                               <button onclick="addBrand(); return false;" id="addbrand" type="button"
                                                       class="centre btn btn-sm btn-success">
                                                   <span class="bigger-50">Submit</span>

                                                   <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                                               </button>
                                           </div>
                                       </div>
                                    </div>
                                    <h4 class="smaller pull-left">BRANDS LISTING</h4>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="widget-body">
                                    <div class="widget-main">
                                        <?php
                                        $sql = "SELECT b.BId,b.BDescription, c.CDescription 
                                                FROM ".TBL_BRAND." b JOIN ".TBL_CATEGORY." c on c.CId=b.BCatId";

                                        $rec = $dbase->dbquery($sql);

                                        ?>

                                        <table id="brandtable"  class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th class="center" width="50">S/No</th>
                                                <th>Brand Name</th>
                                                <th>Category Name</th>

                                                <th width="120">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php

                                            $sn = 0;
                                            foreach ($rec as $row) {
                                                $sn++;
                                                ?>
                                                <tr>
                                                    <td class="center"><?= $sn; ?></td>
                                                    <td><?= $row['BDescription']; ?></td>
                                                    <td><?= $row['CDescription']; ?></td>
                                                    <td>
                                                        <div class="action-buttons center">
                                                            <a  class="green" onclick="editBrand(<?= $row['BId']; ?>)"
                                                               href="#">
                                                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                            </a>
                                                            <a class="red" href="#"
                                                               onclick="deleteBrand(<?= $row['BId'] ?>);return false;">
                                                                <i class="ace-icon fa fa-trash bigger-130"></i>
                                                            </a>
                                                        </div>

                                                    </td>
                                                </tr>
                                                <?php


                                            }
                                            ?>
                                            </tbody>
                                        </table>
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

