<?php

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\API\APIBaseController as APIBaseController;
use Illuminate\Support\Facades\Log;
use App\Post;
use Validator;

class PostAPIController extends APIBaseController
{
    public function index()
    {

        header('Access-Control-Allow-Origin: *');
         header('Access-Control-Allow-Methods: *');
        header('Access-Control-Allow-Headers: *');
       $posts = Post::all('id','title','body');
        //$posts = Post::latest()->paginate(5);
        return $this->sendResponse($posts->toArray(), 'Posts retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        header('Access-Control-Allow-Origin: *'); header('Access-Control-Allow-Methods: *'); 
           header('Access-Control-Allow-Headers: Origin, X-Requested-With,Authorization,  Content-Type, Accept');
        //metoda 1
       $input = $request->all();
         //$input = json_decode($request->getContent());
      
        // dd($input)
        Log::info('app.requests', ['request' => $input, 'method' => $request->method()]);
      // $product = Post::create($input);
        //metoda 2
        // $product = new Post();
        // $product->title = $request->title;
        // $product->body = $request->body;
        
        // var_dump($product);die;
        // $product->save();
        // return response()->json([
        //     //'success' => true,
            
        //     'message' => 'Product created successfully!!!',
        // ]);
        //return $this->sendResponse($product->toArray(), 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product= Post::find($id);
        if (is_null($product)) {
            return $this->sendError('Product not found.');
}
        //return $this->sendResponse($product->toArray(), 'Product retrieved successfully.');
        $post=[];
        $post['title'] = $product->title;
        $post['id'] = $product->id;
        $post['userId'] = 1;
        $post['body'] = $product->body;
        
        return response()->json([
            //$product->toArray()
            $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        
        $product= Post::find($id);
        if (is_null($product)) {
            return $this->sendError('Product not found.');
        }
        $product->title = $input['title'];
        $product->body = $input['body'];
        
        $product->save();
        //return $this->sendResponse($product->toArray(), 'Product updated successfully.');
        return response()->json([
            'success' => true,
            'message' => 'Product Updated!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post= Post::find($id);
        if (is_null($post)) {
            return $this->sendError('Product not found.');
        }
//        Product::where('id', $product->id)
//            ->update([
//                'is_delete'=>'0'
//            ]);
        Post::where('id', $post->id)
            ->delete();
        return $this->sendResponse($id, 'Product deleted successfully.');
    }
    
}
