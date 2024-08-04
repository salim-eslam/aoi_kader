<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComment;
use App\Http\Requests\UpdateComment;
use App\Models\Comment;
use App\Models\PreviosWork;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:comment-list|comment-create|comment-edit|comment-delete', ['only' => ['index','store']]);
         $this->middleware('permission:comment-create', ['only' => ['create','store']]);
         $this->middleware('permission:comment-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:comment-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        // $previos_work=PreviosWork::find($id)->comments();
        $comments=PreviosWork::find($id)->comments()->get();
        // dd($comments);
        return view('dashboard.comments.create',['comments'=>$comments,'previos_work_id'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComment $request)
    {
        //
        // dd($request);
        $comment = new Comment();
        $comment->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
        $comment->role = ['en' => $request->role_en, 'ar' => $request->role_ar];
        $comment->comment = ['en' => $request->comment_en, 'ar' => $request->comment_ar];
        $comment->status = $request->status;
        $comment->previos_work_id=$request->previos_work_id;
        $comment->save();
        return redirect()->route('comment.create',$request->previos_work_id)->with('Add','تم حفظ العمل بنجاح');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        return  view('dashboard.comments.edit',['comment'=>$comment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateComment $request, Comment $comment)
    {
        //
        // dd(1);
        $comment->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
        $comment->role = ['en' => $request->role_en, 'ar' => $request->role_ar];
        $comment->comment = ['en' => $request->comment_en, 'ar' => $request->comment_ar];
        $comment->status = $request->status;
        $comment->previos_work_id=$request->previos_work_id;
        $comment->update();
        return redirect()->back()->with('edit','تم تعديل التعليق بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        // dd($request->comment_id);
         Comment::find($request->comment_id)->delete();
        return redirect()->back()
                        ->with('delete','تم حذف التعليق بنجاح');
    }
}
