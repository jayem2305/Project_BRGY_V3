<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forum;
use Illuminate\Validation\ValidationException;
use App\Models\Comment;
use App\Models\Reply;
class AdminController extends Controller
{
    public function sample()
    {
        return view('Admin.sample');
        //return "Hello, this is the welcome page!";
    }
    public function statisticalreport()
    {
        return view('admin.statisticalreport');
        //return "Hello, this is the welcome page!";
    }
    public function certificate()
    {
        return view('admin.certificate');
        //return "Hello, this is the welcome page!";
    }
    public function indigency()
    {
        return view('admin.indigency');
        //return "Hello, this is the welcome page!";
    }
    public function ftj()
    {
        return view('admin.ftj');
        //return "Hello, this is the welcome page!";
    }
    public function cessation()
    {
        return view('admin.cessation');
        //return "Hello, this is the welcome page!";
    }
    public function permit()
    {
        return view('admin.permit');
        //return "Hello, this is the welcome page!";
    }
    public function soloparent()
    {
        return view('admin.soloparent');
        //return "Hello, this is the welcome page!";
    }
    public function contentmanager()
    {
        return view('admin.contentmanager');
        //return "Hello, this is the welcome page!";
    }
    public function event()
    {
        return view('admin.event');
        //return "Hello, this is the welcome page!";
    }

    public function project()
    {
        return view('admin.project');
        //return "Hello, this is the welcome page!";
    }
    public function announcement()
    {
        return view('admin.announcement');
        //return "Hello, this is the welcome page!";
    }
    public function addresident()
    {
        return view('admin.addresident');
    }
    public function addofficer()
    {
        return view('admin.addofficer');
    }
    public function resident()
    {
        return view('admin.resident');
        //return "Hello, this is the welcome page!";
    }
    public function forum()
    {
        return view('Admin.forum');
        //return "Hello, this is the welcome page!";
    }
    public function pendingaccount()
    {
        return view('admin.pendingaccount');
        //return "Hello, this is the welcome page!";
    }
    public function forumpost(Request $request)
    {
        try {
            $request->validate([
                'topic' => 'required|string|max:255|regex:/^[a-zA-Z0-9\s\W]+$/',
                'description' => 'nullable|string|regex:/^[a-zA-Z0-9\s\W]+$/',
                'name' => 'required|string|regex:/^[a-zA-Z0-9\s\W]+$/',
            ]);
            
            $forum = new Forum();
            $forum->name = $request->name;
            $forum->topic = $request->topic;
            $forum->description = $request->description;
            $forum->reg_num = "REG_000000_00";
            $forum->save();
            
            return response()->json(['message' => 'Forum created successfully']);
        } catch (ValidationException $e) {
            $errors = $e->validator->errors();
            $topicError = $errors->first('topic');
            
            if ($topicError === 'The topic has already been taken.') {
                // Topic is already taken
                return response()->json(['message' => $topicError], 422); // 422 Unprocessable Entity status code
            } else {
                // Other validation errors
                return response()->json(['message' => 'Validation failed', 'errors' => $errors], 422);
            }
        }
    }
public function getForumData(Request $request)
{
    if ($request->has('id')) {
        // Fetch forum details based on ID
        $forum = Forum::find($request->id);
        return response()->json($forum);
    } else {
        // Fetch all forum data
        $forums = Forum::all();
        return response()->json(['forums' => $forums]);
    }
}
public function store(Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
        'comment' => 'required|string',
        'adminname' => 'required|string',
        'profile' => 'required|string',
        'id_form' => 'required|exists:forums,id', // Assuming the foreign key is 'id_form' referencing the 'id' column of the 'forms' table
    ]);

    // Create a new comment
    $comment = new Comment();
    $comment->comment = $validatedData['comment'];
    $comment->name = $validatedData['adminname'];
    $comment->id_form = $validatedData['id_form']; 
    $comment->profile = $validatedData['profile']; 
    // Add any other necessary fields

    // Save the comment
    $comment->save();
    
    // Optionally, return a success response
    return response()->json(['message' => 'Comment posted successfully'], 200);
}
public function show(Request $request, $forumId)
{
    // Assuming you want to load related comments along with the forum
    $forum = Forum::with('comments')->findOrFail($forumId);

    // Assuming you want to check if the request is AJAX
    if ($request->ajax()) {
        return response()->json(['forum' => $forum]);
    }

    // If it's not an AJAX request, return the view with the forum data
    return view('Admin.forum', compact('forum'));
}
public function fetchComments($forumId)
{
    $comments = Comment::where('id_form', $forumId)->get();
    return response()->json(['comments' => $comments]);
}
public function saveReply(Request $request) {
    // Validate the request data
    $request->validate([
        'comment_id' => 'required|exists:comments,id',
        'reply_text' => 'required|string',
        'replyimage' => 'required|string',
        'replyname' => 'required|string',
    ]);

    // Create a new reply instance
    $reply = new Reply();
    $reply->comment_id = $request->comment_id;
    $reply->reply_text = $request->reply_text;
    $reply->replyimage = $request->replyimage;
    $reply->replyname = $request->replyname;
    $reply->save();

    // Optionally, you can return a response (e.g., success message)
    return response()->json(['message' => 'Reply saved successfully']);
}
public function fetchreplies($commentid)
{
    $Reply = Reply::where('comment_id', $commentid)->get();
    return response()->json(['reply' => $Reply]);
}

public function archiveForum(Request $request, $id)
{
    $forum = Forum::find($id);
    if (!$forum) {
        return response()->json(['error' => 'Forum not found'], 404);
    }

    // Update forum status
    $forum->status = 'archived'; // Assuming 'status' is a column in your 'forums' table
    $forum->save();

    return response()->json(['message' => 'Forum archived successfully'], 200);
}
public function getForumStatuses()
{
    $forums = Forum::all();
    $statuses = [];

    foreach ($forums as $forum) {
        $statuses[$forum->id] = $forum->status;
    }

    return response()->json($statuses);
}
public function restore($id)
{
    // Find the forum by ID
    $forum = Forum::findOrFail($id);

    // Update the status to "active"
    $forum->status = 'active';
    $forum->save();

    return response()->json(['message' => 'Forum restored successfully'], 200);
}

}
