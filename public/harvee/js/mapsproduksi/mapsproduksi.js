$(function() {

    $("#mapsDatePicker").datepicker({
        showOtherMonths: true,
        selectOtherMonths: true,
        showButtonPanel: true,
        dateFormat: 'mm-dd-yy'
    });

    $("#mapsDatePicker").datepicker("setDate", "-1");


    $.getJSON('http://10.20.10.246:8282/listafd', function(data){
        var html_code = '';
        var rute = [];
        var tmprute = $(location).attr('href');    
    
        rute = tmprute.split('/');
    
        $.each(data, function(key, value){
            if (value.AFD == rute[5]){
                html_code += '<option value="'+value.AFD+'" selected>'+value.AFD+'</option>';
            }else {
                html_code += '<option value="'+value.AFD+'">'+value.AFD+'</option>';
            }
            
    
        });
        $("#selectMapsAfd").html(html_code);
    });

});

$('#mapsDatePicker').click(function() {
    $('#mapsDatePicker').datepicker('show');
});

function showModalMaps(param){
  
    $("#bodyModal").load(param, function(response,status,xhr){
        if (status == "success"){
            $("#modal-lg").modal("show");
        }
    });
}
