<?php

namespace App\Http\Controllers;
use App\Http\Requests\LoginUser;
use App\Http\Requests\LogUserRequest;
use App\Models\ClasseEvent;
use App\Models\Event;
use App\Models\Inscription;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class UserController extends Controller
{
    public function register(LoginUser $request)
    {
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->role = $request->role;
            $user->save();

            return response()->json([
                'status_code' => 200,
                'status_message' => 'Utilisateur enregistré avec succès',
                'user' => $user
            ]);
        } catch (Exception $e) {

        }

    }

    public function index()
    {
        // $users = User::paginate(2);
        $users = User::all();
        return response()->json(['users' => $users]);
    }

    public function login(LogUserRequest $request)
    {
        if (auth()->attempt($request->only(['email', 'password']))) {

            $user = auth()->user();
            $token = $user->createToken('Clé_Visible_En_BackEnd')->plainTextToken;

            return response()->json([
                'status_code' => 202,
                'status_message' => 'Utilisateur connecté',
                'user' => $user,
                'token' => $token
            ]);
        }else{
            return response()->json([
                'status_code' => 403,
                'status_message' => 'Informations saisies non valides'
            ]);
        }
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $user->tokens()->delete();
        return response()->json(['message' => 'Utilisateur déconnecté']);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json(['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return response()->json(['message' => 'Mis à jour effectuée avec succès', 'user' => $user]);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['message' => 'User supprimé avec succès']);
    }

    public function getEvents($id)
    {
        // return auth()->user()->role;
        if(auth()->user()->role === 'admin' || auth()->user()->role === 'prof' || auth()->user()->role === 'attache'){
            $events = Event::where('user_id', $id)->first();
            return $events;
        }else{
            return response()->json(['message' => "Vous n'avez pas l'autorisation nécessaire"]);
        }
    }

    public function getParts($id)
    {
        $classe = Inscription::where('eleve_id', $id)->select('classe_id')->first();
        $parts = ClasseEvent::where('classe_id', $classe->classe_id)->select('event_id')->get()->pluck('event_id');
        $tabs=[];
        foreach ($parts as $part)
        {
            $tabs[] = Event::findOrFail($part);
        }
        return $tabs;
    }


}
