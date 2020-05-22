<?php

namespace Bulkly\Http\Controllers;

use Bulkly\BufferPosting;
use Illuminate\Http\Request;

class BufferPostingController extends Controller
{
    public function index(Request $request)
    {

        $data = BufferPosting::orderBy('created_at', 'DESC');
        if ($request->has('search_item') && !empty($request->get('search_item'))){
            $data = $data->whereHas('groupInfo',function ($query) use ($request){
                $query->where('name','LIKE','%'.$request->get('search_item').'%')
                    ->orWhere('type','LIKE','%'.$request->get('search_item').'%')
                    ->orWhere('post_text','LIKE','%'.$request->get('search_item').'%');
            });
        }
        if ($request->has('sent_at') && !empty($request->get('sent_at'))){
            $data = $data->whereBetween('sent_at',[$request->get('sent_at').'00:00:01',$request->get('sent_at').'23:59:59']);
        }
        if ($request->has('type') && !empty($request->get('type'))){
            $data = $data->whereHas('groupInfo',function ($query) use ($request){
                $query->where('type',$request->get('type'));
            });
        }

            $data = $data->paginate(25);
        return view('bufferPosting.index',compact('data'));
    }
}
