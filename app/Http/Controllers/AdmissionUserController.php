<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdmissionUser;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\RegisterResource;
use App\Http\Requests\RegisterUserRequest;
use Illuminate\Support\Facades\Auth;

class AdmissionUserController extends Controller
{
    public function loginpage(){
        return view('auth.login');
    }
    public function register(RegisterUserRequest $request){
        try{
            $user = new AdmissionUser();
            $user->mobile = $request->mobile;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            return response()->json([
                'data'=>new RegisterResource($user),
                'message'=>'User created'
            ],201);
        }catch(Exception $e){
            return response()->json([
                'message'=>'User cannot be created'
            ],404);
        }
    }
    // public function login(LoginRequest $request){
    //     try{
    //         //select * from admission_users where mobile = $request->mobile
    //         // limit 1
    //         $user = AdmissionUser::where('mobile',$request->mobile)->first();
    //         if($user){
    //             if(Hash::check($request->password,$user->password)){
    //                 return response()->json([
    //                     'data'=>new RegisterResource($user),
    //                     'message'=>'User logged in'
    //                 ],200);
    //             }else{
    //                 return response()->json([
    //                     'message'=>'Incorrect user credential'
    //                 ],404);
    //             }
    //         }else{
    //             return response()->json([
    //                 'message'=>'Incorrect user credential'
    //             ],404);
    //         }
    //     }catch(Exception $e){
    //         return response()->json([
    //             'message'=>'User cannot be logged in'
    //         ],404);
    //     }
    // }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['mobile', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
