
$(function() {

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
                    url: "http://10.20.10.246:8282/produksidetail2index",
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
    
    $( "#datepickerDetail" ).datepicker({
        showOtherMonths: true,
        selectOtherMonths: true,
        showButtonPanel: true,
        dateFormat: 'mm-dd-yy'
      });

});
