<?php
class Pokemon
{
    // Declaración de una propiedad
    public $conf;

    private function getFunction($data){

        $url = $data['url'];

        $curl = curl_init();

        curl_setopt_array($curl, [
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_POSTFIELDS => "",
          CURLOPT_HTTPHEADER => [
            "User-Agent: insomnia/8.5.1"
          ],
        ]);
        
        $response = curl_exec($curl);
        return $response;

    }


    // Declaración de un método
    public function getPokemon($data) {
        $conf = parse_ini_file('../config/config.ini', TRUE);
        $conf = $conf['pokemon'];

        $searchPkm = $data['idPkm'];
        $url = $conf['urlPkm'].$searchPkm;
        
        $data = array(
            'url' => $url,
        );
        
        $pokemon = $this->getFunction($data);
        
        return $pokemon;
    }
}

?>