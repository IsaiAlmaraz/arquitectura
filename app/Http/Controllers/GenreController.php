<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{

    public function obtenerGeneros()
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.deezer.com/genre",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT =>30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "x-rapidapi-host: deezerdevs-deezer.p.rapidapi.com",
                "x-rapidapi-key: SIGN-UP-FOR-KEY"
            ],

        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if($err){
            echo "cURL Error #:". $err;
        }else{
            $objeto = json_decode($response);

            foreach($objeto->data as $genero){

                //echo json_encode($genero);
                
                $verificar = Genre::where('name',$genero->name)->first();

               //echo $genero->name;
                if(!$verificar)
                    $nuevoGenero = new Genre();
                    $nuevoGenero->name = "ok";
                    $nuevoGenero->picture="ok";
                    $nuevoGenero->picture_small= "ok";
                    $nuevoGenero->picture_medium= "ok";
                    $nuevoGenero->picture_big= "ok";
                    $nuevoGenero->picture_xl= "ok";
                //$nuevoGenero->name = $genero->name;
                $nuevoGenero->save();
               
                
//                  if(isset($genero->picture))
//                 echo "<img src='$genero->picture' alt=''>";

//                 if(isset($genero->picture_small))
//                 echo "<img src='$genero->picture_small' alt=''>";

//                 if(isset($genero->picture_medium))
//                 echo "<img src='$genero->picture_medium' alt=''>";

//                 if(isset($genero->picture_big))
//                 echo "<img src='$genero->picture_big' alt=''>";

//                 if(isset($genero->picture_xl))
//                 echo "<img src='$genero->picture_xl' alt=''>";

//             echo "<hr>";

                //echo $genero->name;
            }
        }

    }


}
