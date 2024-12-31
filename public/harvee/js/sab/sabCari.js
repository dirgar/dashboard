
function sabCari(base_url){
    var td1 = $('#datepickerSab').datepicker({dateFormat: 'mm-dd-yy'}).datepicker('getDate');

    var tmon1 = td1.getMonth()+1;
    var tday1 = td1.getDate();
    var tyear1 = td1.getFullYear();

    var tdate1 = tmon1+"-"+tday1+"-"+tyear1;
    
    rute = base_url + tdate1;
 
    $("#jsSab").datagrid("load",rute);
    $("#jsSab").datagrid("reload");
   
}

