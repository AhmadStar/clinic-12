<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">
            <a href="#collapseNurse" data-parent="#accordion" data-toggle="collapse">
                <i class="icon icon-nurse icons" style="font-size:25px;"></i>
                <?php trP('Nurses');?>
            </a>
        </h4>
    </div>
    <div class="panel-collapse collapse" id="collapseNurse">
        <div class="panel-body">
            <table class="table">
                <tbody>
                    <tr>
                        <td>
<!--                            <div class="icon icon-nurse" style="top:2px"></div>-->
                            <i class="icon icon-nurse materialsidebar" style="top:2px"></i>
                            <?php echo anchor('nurse',tr('NursesList'));?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span><i class="small material-icons materialsidebar" style="margin-right: 3px">add_box</i> </span>
                            <?php echo anchor('nurse/new_nurse',tr('NewNurse'));?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span><i data-icon="k" class="icon materialsidebar" style="margin-right: 3px"></i> </span>
                            <?php echo anchor('nurse/new_schedule',tr('NewNurseSchedule'));?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span><i class="icon icon-incentive materialsidebar" style="margin-right: 3px; font-size:25px"></i> </span>
                            <?php echo anchor('nurse/new_incentive',tr('NewNurseIncentive'));?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
