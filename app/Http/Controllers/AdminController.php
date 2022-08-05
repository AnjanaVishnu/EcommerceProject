<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Repository\EcommerceRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DataTables;
use Illuminate\Support\Facades\Crypt;

class AdminController extends Controller
{

    public  function __construct(EcommerceRepo $EcommerceRepo)
    {
        $this->EcommerceRepo = $EcommerceRepo;
    }

    public function dashbord()

    {

        return view('admin.dashboard');
    }

    public function admin_login()
    {

        return view('admin.login');
    }

    public function admin_authenticate(Request $request)
    {



        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashbord');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function signOut()
    {
        Auth::logout();
        return Redirect('admin_login');
    }



    public function index()

    {
        return view('admin.form');
    }

    public function create(Request $request)
    {


        $this->validate($request, [
            'category_name' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',


        ]);

        $data = $request->all();

        $result = $this->EcommerceRepo->insert($data);

        if ($result) {

            return redirect('/list');
        } else {

            echo ("error");
        }
    }

    public function list(Request $request)
    {

        $list = Category::all();

        return view('admin.list', ['list' => $list]);
    }

    public function newlist(Request $request)
    {

        if ($request->ajax()) {

            $data = Category::select('id', 'category_name', 'description', 'image')->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    // $prodID = Crypt::encrypt($row->id);
                    $btn = '<a href="edit/' . $row->id . '" class="btn btn-primary btn-sm">Edit</a>' . '<br><BR><a href="delete/' . $row->id . '" class="btn btn-danger btn-sm">Delete</a>' . '<Br><br><a href="add/' .helper($row->id). '" class="btn btn-success btn-sm">ADD</a>' . '<br><BR><a href="product_list/' . $row->id . '" class="btn btn-secondary btn-sm">View</a>';
                    return $btn;
                })
                ->addColumn('image', function ($row) {
                    $btn = '<div class="text-center"><img src="' . url('public/' . $row->image) . '" class="img-thumbnail img-fluid" 
                    style="max-width: 35%!important"><div>';
                    return $btn;
                })
                ->rawColumns(['action', 'image'])
                ->make(true);
        }

        return view('admin.newlist');
    }

    public function edit($id)
    {
        $editlist = Category::find($id);
        return view('admin.edit', ['editlist' => $editlist]);
    }

    public function update(Request $request, Category  $categoryid)
    {

        $data = $this->EcommerceRepo->updatecategory($request->all(), $categoryid);
        return redirect('/list');
    }
    public function destroy($id)
    {
        $delete = Category::find($id);
        $product_delete = Product::where('category_id',$id)->delete();
        $delete->delete();
        return redirect('/list');
    }
}
