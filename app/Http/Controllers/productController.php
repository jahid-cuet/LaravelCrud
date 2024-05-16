<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class productController extends Controller
{
    //
    public function index(Request $request){
        $search = $request['search'] ?? "";
        if ($search != "") {
            $products = Product::where('name', 'LIKE', "%$search")->get();
        } else {
            $products = Product::paginate(5);
        }
        $data = compact('products', 'search');
        return view('products.index', $data);
    }
    

    public function create(){
        
    return view('products.create');
    }
    public function store(Request $request){

        // validate data
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000'


        ]);



        $imageName=time().'.'.$request->image->extension();
        $request->image->move(public_path('products'),$imageName);

    $product=new product;
    
    $product->image=$imageName;
    $product->name=$request->name;
    $product->description=$request->description;
    $product->save();
    return back()->withSuccess('Product Created!!!!!');

    }
    public function Edit($id){
        $pro=product::where('id',$id)->first();
        return view('products.edit',['product'=>$pro]);
    }
    public function update(Request $request,$id){

        // validate data
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000'


        ]);
        $product=product::where('id',$id)->first();
        if(isset($request->image)){
    $imageName=time().'.'.$request->image->extension();
    $request->image->move(public_path('products'),$imageName);
    $product->image=$imageName;

}
    $product->name=$request->name;
    $product->description=$request->description;
    $product->save();
    return back()->withSuccess('Product Updated!!!!!');
    }
    public function Delete($id){
        $pro=product::find($id);
        if(!is_null($pro)){
            $pro->delete();
        }
        return redirect('/');
    }

}
