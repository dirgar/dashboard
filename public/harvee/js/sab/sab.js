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

        $('#jsSab').datagrid({
            onClickRow:function(index,row){
                var rute = row.PARAM;
                $("#jsGridSab").jsGrid({
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

function showModal(param){
    $("#bodyModal").load(param, function(response,status,xhr){
        if (status == "success"){
            $("#modal-lg").modal("show");
        }
    });
}



