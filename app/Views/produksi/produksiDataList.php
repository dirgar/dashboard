<?php echo view('style/styleDatagrid'); ?>
<table class="easyui-datagrid" style="width:760px;height:450px"
data-options="singleSelect:true,collapsible:true,url:'<?= base_url(); ?>harvee/plugins/easyui/datagrid_data1.json',method:'get'">
    <thead>
        <tr>
            <th data-options="field:'itemid',width:80">Item ID</th>
            <th data-options="field:'productid',width:100">Product</th>
            <th data-options="field:'listprice',width:80,align:'right'">List Price</th>
            <th data-options="field:'unitcost',width:80,align:'right'">Unit Cost</th>
            <th data-options="field:'attr1',width:250">Attribute</th>
            <th data-options="field:'status',width:60,align:'center'">Status</th>
        </tr>
    </thead>
</table>