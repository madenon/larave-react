<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCarnetRequest;
use App\Http\Requests\EditCarnetRequest;
use App\Models\Carnet;
use Exception;
use Illuminate\Http\Request;

class CarnetController extends Controller
{

    // voir la liste des carnets
    public function index()
    {
        try {
            return response()->json([
                'staus_code' => 200,
                'status_message' => 'La liste complète de vos carnet d adresse',
                'data' => Carnet::all(),
            ]);
        } catch (Exception $e) {
            return response()->json([]);
        }
    }


    //Ajouter un contact
    public function Ajouter(CreateCarnetRequest $request)
    {
        try {

            $post = new Carnet();
            $post->nom = $request->nom;
            $post->email = $request->email;
            $post->contact = $request->contact;
            $post->save();

            return response()->json([
                'staus_code' => 200,
                'status_message' => 'vos informations ont bien été  ajouté avec succès',
                'data' => $post,
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }
    public function Modifier(EditCarnetRequest $request, Carnet $post)
    {

        try {

            $post->nom = $request->nom;
            $post->email = $request->email;
            $post->contact = $request->contact;
            $post->save();

            return response()->json([
                'staus_code' => 200,
                'status_message' => 'vos informations ont bien été  modifié avec succès',
                'data' => $post,
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function Supprimer(Carnet $post)
    {

        try {
            $post->delete();

            return response()->json([
                'staus_code' => 200,
                'status_message' => 'vos informations ont bien été suuprimé avec succès',
                'data' => $post,
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }
}
