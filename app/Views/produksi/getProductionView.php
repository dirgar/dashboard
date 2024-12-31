<?php
   // header('Content-Type: application/json');
    //echo '{"total":"28", "rows": '.json_encode($orcldata).'}';
  // echo json_encode($orcldata, TRUE);

  $this->respond(json_encode($orcldata), 200);
?>