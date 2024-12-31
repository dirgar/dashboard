
function restanDetailCari(base_url){
 
    var tafd =  $('#selectRestanAfd').val();
    
    rute = base_url + tafd;

    $("#jsRestanDetail").datagrid("load",rute);
    $("#jsRestanDetail").datagrid("reload");
   
}

