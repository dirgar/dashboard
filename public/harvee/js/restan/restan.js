$(function() {

        $("#jsRestan").jsGrid({
           
                width: "100%",
                height: "auto",
                paging: true,
                
                pageLoading: true,
                pageIndex: 1,
                pageSize: 12,
                
                filtering: false,
                editing: false,
                sorting: true,
                autoload: true,
                
                controller: {
                    loadData: function(filter) {
                        var def = $.Deferred();
                        $.ajax({
                        url: "http://10.20.10.246:8282/restandata",
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
                { name: "NO", title: "<p class='text-gray mt-2 mb-1 ml-1'>#</p>", type: "number", width: 28, sorting: false, filtering: false},
                { name: "ESTATECODE", title: "<p class='text-gray mt-2 mb-1 ml-1'>Kebun</p>", type: "text", width: 60, sorting: false, filtering: false },
                { name: "AFD", title: "<p class='text-gray mt-2 mb-1 ml-1'>Afdeling</p>", type: "text", width: 70, sorting: false, filtering: false },
                { name: "TOTAL_JANJANG", title: "<p class='text-gray mt-2 mb-1 ml-1'>Total Janjang</p>", type: "number", width: 80, sorting: false, filtering: false },
                { name: "BRONDOLAN", title: "<p class='text-gray mt-2 mb-1 ml-1'>Brondolan</p>", type: "number", width: 90, sorting: false, filtering: false },
                { name: "BUAH_MASAK", title: "<p class='text-gray mt-2 mb-1 ml-1'>Buah Masak</p>", type: "number", width: 80, sorting: false, filtering: false },
                { name: "LEWAT_MASAK", title: "<p class='text-gray mt-2 mb-1 ml-1'>Lewat Masak</p>", type: "number", width: 80, sorting: false, filtering: false },
                { name: "BUAH_MENTAH", title: "<p class='text-gray mt-2 mb-1 ml-1'>Buah Mentah</p>", type: "number", width: 80, sorting: false, filtering: false }
                
            ],
            loadIndication: true,
            loadIndicationDelay: 500,
            loadMessage: "Please, wait...",
            loadShading: true
        });
        
        $( "#dateRestan1" ).datepicker({
            showOtherMonths: true,
            selectOtherMonths: true,
            showButtonPanel: true,
            dateFormat: 'mm-dd-yy'
          });
          $("#dateRestan1").datepicker("setDate", "-90");

          $( "#dateRestan2" ).datepicker({
            showOtherMonths: true,
            selectOtherMonths: true,
            showButtonPanel: true,
            dateFormat: 'mm-dd-yy'
        });
        $("#dateRestan2").datepicker("setDate", "-1");

});


$('#btnDateRestan1').click(function() {
    $('#dateRestan1').datepicker('show');
});

$('#btnDateRestan2').click(function() {
    $('#dateRestan2').datepicker('show');
});



