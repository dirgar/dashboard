<?php 
    
    namespace App\Libraries;

    use App\Models\Select;

class formelement
{
    protected $mdl;
    public function selectAfd()
    {
        $mdl = new Select;

        $uri = service('uri');
        $rute = $uri->getSegment(2);
        //$rute .= "/".$uri->getSegment(3);

        $data['option'] = $mdl->select($rute);

        return view('formelement/selectAfd', $data);
    }
}