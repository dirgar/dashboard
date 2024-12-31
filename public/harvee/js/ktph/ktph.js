$(function() {
    var rute = [];
    var tmprute = $(location).attr('href');    

    rute = tmprute.split('/');
       
        $( "#datepickerSab" ).datepicker({
            showOtherMonths: true,
            selectOtherMonths: true,
            showButtonPanel: true,
            dateFormat: 'mm-dd-yy'
          });
          $("#datepickerSab").datepicker("setDate", "-1");

          
          
});

$('#btnDateSab').click(function() {
    $('#datepickerSab').datepicker('show');
});


$(document).ready(function(){
    
    $.getJSON('http://10.20.10.246:8282/listafd', function(data){
        var html_code = '';
     
        $.each(data, function(key, value){
            if (value.AFD == "AFD-I"){
                html_code += '<option value="'+value.AFD+'" selected>'+value.AFD+'</option>';
            }else {
                html_code += '<option value="'+value.AFD+'">'+value.AFD+'</option>';
            }            
        });
    
         $("#selectKtphAfd").html(html_code);
    });

    $('#jsKtph').datagrid({
        onClickRow:function(index,row){
            var rute = row.PARAM;
            
            $("#jsKtphDetail2").datagrid("load",rute);

            $("#jsKtphDetail2").datagrid("reload");

           
        }
    });

});

function showModal(param){
    $("#bodyModal").load(param, function(response,status,xhr){
        if (status == "success"){
            $("#modal-lg").modal("show");
        }
    });
}


function ktphCari(base_url){
    //var iscek = $("#jsKtphDetail2").datagrid("getChecked");
    rute = $('#baseUrl').val() +"qrktph/";

    var ss = "";
    var rows = $('#jsKtphDetail2').datagrid('getSelections');
    for(var i=0; i<rows.length; i++){
        var row = rows[i];
        //ss.push(row.PARAM);
        if (i==0){
            ss = ss + row.PARAM + row.INPUTBY;
        }else {
            ss = ss + "_"+ row.PARAM + row.INPUTBY;
        }
        
    }
    //window.location.href = rute + ss;
    window.open(rute + ss, '_blank');
    //alert(ss);
}

$('#selectKtphAfd').change(function() {
    rute = $('#baseUrl').val() +"ktphdata/" + $('#selectKtphAfd').val();
  
    $("#jsKtph").datagrid("load",rute);
    $("#jsKtph").datagrid("reload");
});