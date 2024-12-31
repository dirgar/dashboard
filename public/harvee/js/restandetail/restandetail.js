$(document).ready(function(){

    $.getJSON('http://10.20.10.246:8282/listafdrestan', function(data){
        var html_code = '';
        var rute = [];
        var tmprute = $(location).attr('href');    
    
        rute = tmprute.split('/');
     
        $.each(data, function(key, value){
            if (value.AFD == rute[4]){
                html_code += '<option value="'+value.AFD+'" selected>'+value.AFD+'</option>';
            }else {
                html_code += '<option value="'+value.AFD+'">'+value.AFD+'</option>';
            }
            

        });
        $("#selectRestanAfd").html(html_code);

        $('#jsRestanDetail').datagrid({
            onClickRow:function(index,row){
                var rute = row.PARAM;
             
                $("#jsGridRestanDetail").jsGrid({
       
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
                            url: rute,
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

/*
function showModal(param){

    $("#bodyModal").load("http://10.20.10.246:8282/"+ param, function(response,status,xhr){
        if (status == "success"){
            $("#modal-lg").modal("show");
        }
    });
}
*/


