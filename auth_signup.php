
<?php
include 'includes/initP.php';
?>


<div class="row">
    <div class="col-sm-12">  
        <div id="listing" class="tab-pane in active">
            <div class="row">
                <div class="col-sm-12">
                    <div class="widget-box">
                        <div class="widget-header">
                            <h4 class="smaller">AUTHORIZE USER ACCOUNT</h4>
                        </div>

                        <div class="widget-body">
                            <div class="widget-main">
                                <span id="status"></span>
                                        <?php
                                         $sql = "SELECT * FROM " . TBL_USERS . " WHERE UApprovalStatus = 'N' OR UApprovalStatus = 'P'";

                                        $rec = $dbase->dbquery($sql);

                                        ?>

                                          <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="center">S/N</th>
                                                        <th>Username</th>
                                                        <th>Full Name</th>
                                                        <th>Email</th>
                                                        <th>Approval Level</th>
                                                        <th>Approval Status</th>
                                                        <th>Authorize</th>
                                                    </tr>
                                                </thead>

                                        <tbody>
                                        <?php
                                            $sn=0;
                                          foreach($rec as $row){
                                            $sn++;
                                            ?>
                                            <tr>
                                                <td class="center"><?= $sn; ?></td>
                                                <td><?= $row['UUsername'] ?></td>
                                                <td><?= $row['ULastname'] . " " . $row['UFirstname'] . " " . $row['UMiddlename'] ?></td>
                                                <td><?= $row['UEmail'] ?></td>
                                                <td><?= $row['UApprovalLevel'] ?></td>
                                                <td><?= $row['UActivated'] = 'PENDING' ?></td>
                                                <td>
                                                    <a class="btn btn-minier btn-primary" href="activateUser.php?data=<?= $row['UId'] ?>">
                                                        Authorize
                                                    </a>
                                                </td>

                                            </tr>
                                            
                                          <?php } ?>
                                          </tbody>
                                          </table>

                                <div style="margin-top: 2px;">
                                    <button type="button" id="btnauthorize" onclick="authorizeSelected()" class="btn btn-xs btn-primary" style="border-radius: 6px; border:none;">
                                        <i class="ace-icon fa fa-trash white fa-1x"></i>
                                        Authorize selected
                                    </button>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div><!-- /.col -->
</div>



<?php
include_once("includes/footer.php");
?>