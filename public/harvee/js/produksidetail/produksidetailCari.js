
function produksiDetailCari(base_url){
    var td1 = $('#datepickerDetail').datepicker({dateFormat: 'mm-dd-yy'}).datepicker('getDate');
    var tafd =  $('#selectAfd').val();

    var tmon1 = td1.getMonth()+1;
    var tday1 = td1.getDate();
    var tyear1 = td1.getFullYear();

    var tdate1 = tmon1+"-"+tday1+"-"+tyear1;
    
    rute = base_url+tdate1 +"/"+ tafd;

    $("#jsGridAfd").datagrid("load",rute);
    $("#jsGridAfd").datagrid("reload");
   
}

