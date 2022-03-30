<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    private $imagePath = "uploads/images/";


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $response = [];

        $request->validate([
            "name" => "required ",
            "email" => "required |unique:users,email",
            "phone" => "int | required ",
            "cnic" => "int| required ",
            "password" => "required ",
        ]);

        $password = Hash::make($request->input("password"));

        $user =  User::create([
            "name" => $request->input("name"),
            "email" => $request->input("email"),
            "phone" => $request->input("phone"),
            "cnic" => $request->input("cnic"),
            "password" => $password,
        ]);

        if ($user) {
            $user = User::where("email", $request->input("email"))->first();
            $response = [
                "message" => "User Registor Successfully",
                "code" => 200,
                "status" => "success",
                "imgPath" => asset($this->imagePath),
                "user" => $user,
            ];
        } else {
            $response = [
                "message" => "Error While Registor Please Try Again.",
                "code" => 400,
                "status" => "danger",
                "user" => null,
            ];
        }

        return $response;
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $request->validate([
            "id" => "required"
        ]);

        $response = [];
        $user = User::where("id", $request->input("id"))->first();
        if ($user) {
            $response = [
                "message" => "User Data",
                "code" => 200,
                "status" => "success",
                "imgPath" => asset($this->imagePath),
                "user" => $user,
            ];
        } else {
            $response = [
                "message" => "User Not Found",
                "code" => 404,
                "status" => "danger",
                "user" => null,
            ];
        }
        return $response;
    }



    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $request->validate([
            "email" => "required",
            "password" => "required",
        ]);

        $user = User::where("email", $request->input("email"))->first();

        if ($user) {
            if (Hash::check($request->input("password"), $user->password)) {
                $response = [
                    "message" => "Login Successfully",
                    "code" => 200,
                    "status" => "success",
                    "imgPath" => asset($this->imagePath),
                    "user" => $user,
                ];
            } else {
                $response = [
                    "message" => "Invalid Password",
                    "code" => 400,
                    "status" => "danger",
                    "user" => null,
                ];
            }
        } else {
            $response = [
                "message" => "User Not Found",
                "code" => 400,
                "status" => "danger",
                "user" => null,
            ];
        }
        return $response;
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            "id" => "required ",
            "name" => "required ",
            "phone" => "int | required ",
            "cnic" => "int| required ",
        ]);

        $user = User::where("id", $request->input("id"))->update([
            "name" => $request->input("name"),
            "phone" => $request->input("phone"),
            "cnic" => $request->input("cnic"),
            "donations_num" => $request->input("donations_num"),
            "achievements" => $request->input("achievements"),
            "donated_money" => $request->input("donated_money")
        ]);
        if ($user) {
            $user = User::where("id", $request->input("id"))->first();
            $response = [
                "message" => "User Profile Updated",
                "code" => 200,
                "status" => "success",
                "imgPath" => asset($this->imagePath),
                "user" => $user,
            ];
        } else {
            $response = [
                "message" => "User Not Found",
                "code" => 400,
                "status" => "danger",
                "user" => null,
            ];
        }
        return $response;
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'email' => "required",
        ]);
        $user = User::where("email", $request->input("email"))->first();
        if ($user !== null) {
            if ($user->delete()) {
                $response = [
                    "message" => "User Deleted",
                    "code" => 200,
                    "status" => "success",
                    "user" => null,
                ];
            } else {
                $response = [
                    "message" => "Error While Processing",
                    "code" => 400,
                    "status" => "danger",
                    "user" => null,
                ];
            }
        } else {
            $response = [
                "message" => "User Not Found",
                "code" => 400,
                "status" => "danger",
                "user" => null,
            ];
        }
        return $response;
    }

    /**
     * Update User Profile Image.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateImg(Request $request)
    {
        $request->validate([
            "id" => "required",
            "userImage" => "required |max:128|mimes:png, jpg, jpeg, JPEG, PNG, JPG"
        ]);

        $path = public_path() . "/uploads/images/";
        $fileExt = $request->file("userImage")->getClientMimeType();
        $fileExt = explode('/', $fileExt);
        $fileExt = $fileExt[1];
        $fileName = uniqid() . "." . $fileExt;
        $uplaodImage = $request->file("userImage")->move($path, $fileName);
        if ($uplaodImage) {
            $updateImage = User::where("id", $request->input("id"))->update([
                "img" => $fileName,
            ]);
            if ($updateImage) {
                $user = User::where("id", $request->input("id"))->first();
                $response = [
                    "message" => "User image updated successfully",
                    "code" => 200,
                    "status" => "success",
                    "user" => $user,
                ];
            } else {
                $response = [
                    "message" => "User image not updated",
                    "code" => 400,
                    "status" => "danger",
                    "user" => null,
                ];
            }
        } else {
            $response = [
                "message" => "Error while uploading user image",
                "code" => 400,
                "status" => "danger",
                "user" => null,
            ];
        }
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function resetPass(Request $request)
    {
        $request->validate([
            "id" => "required",
            "password" => "required",
            "newPassword" => "required",
            "confirmPassword" => "required"
        ]);

        $user = User::where("id", $request->input("id"))->first();
        if ($user) {
            if (Hash::check($request->input("password"), $user->password)) {
                if ($request->input("newPassword") === $request->input("confirmPassword")) {
                    $password = Hash::make($request->input("newPassword"));
                    $updatePassword = User::where("id", $request->input("id"))->update([
                        "password" => $password,
                    ]);
                    if ($updatePassword) {
                        $response = [
                            "message" => "Password Reset Successfully",
                            "code" => 200,
                            "status" => "success",
                            "user" => $user,
                        ];
                    } else {
                        $response = [
                            "message" => "Error while Reset User Password",
                            "code" => 400,
                            "status" => "danger",
                            "user" => null,
                        ];
                    }
                } else {
                    $response = [
                        "message" => "Both new password and confirm password not match",
                        "code" => 400,
                        "status" => "danger",
                        "user" => null,
                    ];
                }
            } else {
                $response = [
                    "message" => "Invalid Password",
                    "code" => 400,
                    "status" => "danger",
                    "user" => null,
                ];
            }
        } else {
            $response = [
                "message" => "User Not Found",
                "code" => 400,
                "status" => "danger",
                "user" => null,
            ];
        }
        return $response;
    }
}
