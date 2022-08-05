<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Repository\EcommerceRepo;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Crypt;

class CategoryController extends Controller
{

    public  function __construct(EcommerceRepo $EcommerceRepo)
    {
        $this->EcommerceRepo = $EcommerceRepo;
    }
    public function add($id)
    {

        $add = Category::all();
        return view('admin.add');
    }


    public function add_form(Request $request,$prodID)
    {

        $id= Crypt::decrypt($prodID);
        $this->validate($request, [
            'product'=>'required',
            'prize'=>'required',
            'img' => 'required',
            'desc' => 'required',
            'stock'=>'required',

        ]);
        $add = $request->all();

        $result = $this->EcommerceRepo->add($add, $id);
        $view = Product::all();

        if ($result) {

            return redirect('/list');
        } else {

            echo "error";
        }
    }

        
    public function product_list(Request $request,$id)
    {
        if ($request->ajax()) {
         
            $data = Product::select('id','product','prize','desc','stock','img')->where('category_id',$id)->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function($row){
                
                    $btn = '<a href="/ecommerce/edit_product/'.$row->id.'" class="btn btn-primary btn-sm">Edit</a>'.'<br><Br><a href="'. route('delete_product_by_admin',$row->id).'" class="btn btn-danger btn-sm">Delete</a>';
                    return $btn;
                })
                ->addColumn('img', function($row){
                    $btn = '<div class="text-center"><img src="'.url('public/'.$row->img).'" class="img-thumbnail img-fluid" ><div>';
                    return $btn;
                })
                ->addColumn('prize', function($row){
                    $btn = 'Rs.'.$row->prize;
                    return $btn;
                })
                
                ->rawColumns(['action','img','prize'])
                ->make(true);
        }

        return view('admin.product_list',compact('id'));
    }



    public function edit_product($id)
    {
        $product_edit = Product::find($id);
        return view('admin.product_edit', ['product_edit' => $product_edit]);
    }

    public function delete_product($id)
    {

        $delete = Product::find($id);
        $delete->delete();
        return redirect('/newlist');
    }

    public function product_update(Request $request, Product  $productid)
    {
   
        $data = $this->EcommerceRepo->update_product($request->all(), $productid);
        return redirect('/list');

    }
}