<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\APIBaseController as APIBaseController;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PostAPIController extends APIBaseController
{
    public function index()
    {
        Log::info('app.requests', ['request' => 'index']);
        $posts = Post::all('id', 'title', 'body');
        //$posts = Post::all();

        return response()->json($posts);
        //$posts = Post::latest()->paginate(5);
        //return $this->sendResponse($posts->toArray(), 'Posts retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Log::info('app.requests', ['request' => 'store']);
        $input = json_decode($request->getContent(), true);

        $post = new Post();
        $post->title = $input['title'];
        $post->body = $input['body'];

        $post->save();
        // return response()->json([
        //     'success' => true,
        //     'message' => 'Post created successfully!!!',
        // ]);
        return $this->sendResponse($post->toArray(), 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        if (is_null($post)) {
            return $this->sendError('Product not found.');
        }
        return $this->sendResponse($post->toArray(), 'Product retrieved successfully.');
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

        $product = Post::find($id);
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
        $post = Post::find($id);
        if (is_null($post)) {
            return $this->sendError('Product not found.');
        }

        Log::info('app.requests', ['request' => $id]);

        Post::where('id', $post->id)
            ->delete();
        return $this->sendResponse($id, 'Product deleted successfully.');
    }

}
