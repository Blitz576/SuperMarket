<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\StoreUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
//use App\Models\Wishlist;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    use UploadImageTrait;

    function __construct()
    {
        /*$this->middleware('permission:List Users|Add User|Update User|Delete User', ['only' => ['index','store']]);
        $this->middleware('permission:Show User', ['only' => ['show']]);
        $this->middleware('permission:Add User', ['only' => ['create','store']]);
        $this->middleware('permission:Update User', ['only' => ['edit','update']]);
        $this->middleware('permission:Delete User', ['only' => ['destroy']]);*/
    }

    
    public function index()
    {
        $request = request();

        $fields = ['email','name','mobile_number'];
        $searchQuery = trim($request->query('search'));

        $users = User::where(function($query) use($searchQuery, $fields) {
            foreach ($fields as $field)
                $query->orWhere($field, 'like',  '%' . $searchQuery .'%');
        })
            ->orderBy('id', 'DESC')
            ->paginate(30);

        return view('dashboard.users.index', compact('users'));
    }

    public function create()
    {
        $user = new User();

        return view('dashboard.users.create' , compact('user'));
    }

    public function store(StoreUserRequest $request)
    {
        $data = $request->except('image' , '_token', '_method');

        $data['image'] = $this->uploadImage($request, 'image', 'users');
        
        User::create($data);

        toastr()->success('User Add Successfully');

        return redirect()->route('users.index');
    }


    public function show(User $user)
    {
        //$products_favorite = Wishlist::where('user_id' , $user->id)->with('user','product')->get();
        $user_orders = Order::where('user_id' , $user->id)->with('user')->get();
        $cart_products = Cart::where('user_id' , $user->id)->with('user')->get();

        return view('dashboard.users.show', compact('user' , 'user_orders' , 'cart_products'));
    }


    public function edit(User $user)
    {
        return view('dashboard.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request , User $user)
    {
        $old_image = $user->image;
        $data = $request->except('image' , '_token', '_method');

        $data['image'] = $this->uploadImage($request, 'image', 'users');

        if(!$request->hasFile('image')){
            unset($data['image']);
        }

        /*if($request->password){
            $data['password'] = $request->password;
        }else{
            unset($data['password']);
        }*/

        $user->update($data);

        if ($old_image && isset($data['image'])) {
            Storage::disk('public')->delete($old_image);
        }

        toastr()->success('User Updated Successfully');

        return redirect()->route('users.index');
    }

    
    public function destroy(User $user)
    {
        $user -> delete();
        if ($user->image) {
            Storage::disk('public')->delete($user->image);
        }

        toastr()->success('User Deleted Successfully');

        return redirect()->route('users.index');
    }

    public function changeStatus(Request $request, User $user)
    {
        $request->validate([
            'status' => 'required|string|in:available,unavailable',
        ]);

        try {
            $user->status = $request->status;
            $user->save();

            return response()->json([
                'message' => 'User status updated successfully.',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update user status.',
            ], 500);
        }
    }
}