<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerGames extends Controller
{
    public function getGames()
    {
        //$game = new \App\Games();
        //$game->games = \App\Games::all();
        //return $game;
        return \App\Games::all();
    }

    public function getGame($id)
    {
        $game = \App\Games::find($id);
        if(!empty($game)){
            return $game;
        }else{
            return response()->json(['Status' => 'Id não existente'],404);
        }
    }

    public function postGames(Request $request){

        $regex = "((https?|ftp|http)\:\/\/)?"; // SCHEME 
        $regex .= "([a-z0-9+!*(),;?&=\$_.-]+(\:[a-z0-9+!*(),;?&=\$_.-]+)?@)?"; // User and Pass 
        $regex .= "([a-z0-9-.]*)\.([a-z]{2,3})"; // Host or IP 
        $regex .= "(\:[0-9]{2,5})?"; // Port 
        $regex .= "(\/([a-z0-9+\$_-]\.?)+)*\/?"; // Path 
        $regex .= "(\?[a-z+&\$_.-][a-z0-9;:@&%=+\/\$_.-]*)?"; // GET Query 
        $regex .= "(#[a-z_.-][a-z0-9+\$_.-]*)?"; // Anchor 

        $game = new \App\Games();
        $game->nome = $request->nome;
        $game->url = $request->url;
        if(!empty($game->nome) && !empty($game->url)){
            if(preg_match("/^$regex$/i",$game->url)){
                $game->save();
                return response()->json(['Status' => 'Ok'],201);
            }else{
                return response()->json(['Status' => 'Insira uma url válida!'],404);
            }
        } else {
            return response()->json(['Status' => 'Erro ao salvar'],404);
        }
    }

    public function putGame(Request $request,$id)
    {
        $game = \App\Games::find($id);
        if(!empty($game)){
            $game->nome = $request->nome;
            $game->url = $request->url;
            $game->save();
            return response()->json(['Status' => 'Ok'],201);
        }else{
            return response()->json(['Status' => 'Id não existente'],404);
        }
    }
}
