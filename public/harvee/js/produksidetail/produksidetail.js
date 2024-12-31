$(function() {
    var rute = [];
    var tmprute = $(location).attr('href');    

    rute = tmprute.split('/');

        
        $( "#datepickerDetail" ).datepicker({
            showOtherMonths: true,
            selectOtherMonths: true,
            showButtonPanel: true,
            dateFormat: 'mm-dd-yy'
          });
          $("#datepickerDetail").datepicker("setDate", rute[4]);


});

$('#btnDateDetail').click(function() {
    $('#datepickerDetail').datepicker('show');
});


$(document).ready(function(){

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
        $("#selectAfd").html(html_code);

        $('#jsGridAfd').datagrid({
            onClickRow:function(index,row){
                var rute = row.PARAM;
                
                $("#jsGridDetail").jsGrid({
       
                    width: "100%",
                    height: "auto",
                    paging: true,
                    
                    pageLoading: true,
                    pageIndex: 1,
                    pageSize: 24,  
                    
                    filtering: false,
                    editing: false,
                    sorting: true,
                    autoload: true,
                    
                    controller: {
                        loadData: function(filter) {
                            var def = $.Deferred();
                            
                            $.ajax({
                            url: "http://10.20.10.246:8282/produksidetail2/"+rute,
                            dataType: "json"
                        }).done(function(response) {
                            var startIndex = (filter.pageIndex - 1) * filter.pageSize;
                            var da = {
                            data: response.slice(startIndex, startIndex + filter.pageSize),
                            itemsCount: response.length
                        };
                            def.resolve(da);
                        });
                        
                        return def.promise();
                    }
                    },
                        fields: [
                            { name: "DESC", title: "<p class='text-gray mt-2 mb-1 ml-1'>Detail Panen</p>", width: 540, type: "text", sorting: true, filtering: false }
                            
                        ],
                        loadIndication: true,
                        loadIndicationDelay: 500,
                        loadMessage: "Please, wait...",
                        loadShading: true
                 });

            }
        });
    });



});

function showModal(param){
  
    $("#bodyModal").load(param, function(response,status,xhr){
        if (status == "success"){
            $("#modal-lg").modal("show");
        }
    });
}

function closeModal(){
  
    //$('#modal-lg').modal().hide().fadeOut();
    $('#modal-lg').modal('hide');
}

$('#selectAfd').change(function() {
    $('#datepicker').datepicker('show');
});


