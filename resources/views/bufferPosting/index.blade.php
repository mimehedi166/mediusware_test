@extends('layouts.app')
@section('content')
    <div class="container-fluid app-body">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Recent Posts Sent to Buffer</h3>
            </div>
            <div class="panel-body">
                <div class="row" style="padding: 5px;">
                    <div class="col-md-12">
                        <form method="get" action="{{route('buffer.postings')}}">
                            <div class="col-md-4">
                                <input type="text" name="search_item" class="form-control" placeholder="Search here ..." value="{{isset($_GET['search_item'])  ? $_GET['search_item'] : ''}}">
                            </div>
                            <div class="col-md-4">
                                <input type="date" name="sent_at" class="form-control" placeholder="Select Date and Time" id="datetimepicker1">
                            </div>
                            <div class="col-md-3">
                                <select name="type" class="form-control">
                                    <option value="">Please Select</option>
                                    <option value="upload">Content Upload</option>
                                    <option value="curation">Content Curation</option>
                                    <option value="rss-automation">RSS Automation</option>
                                </select>
                            </div>
                            <div class="col-md-1">
                                <input type="submit" value="Search" class="btb btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-hover social-accounts">
                            <thead>
                            <tr>
                                <th>Group Name</th>
                                <th>Group Type</th>
                                <th>Account Name</th>
                                <th>Post Text</th>
                                <th>Time</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $type = ''; ?>
                            @forelse($data as $val)
<!--                                --><?php
//                                if (!empty($val->groupInfo && $val->groupInfo->type){
//                                    $type = $val->groupInfo->type;
//                                    if ($val->groupInfo->type == 'upload')
//                                    {
//                                        $type = 'Content Upload';
//                                    }
//                                    if ($val->groupInfo->type == 'rss-automation')
//                                    {
//                                        $type = 'RSS Automation';
//                                    }
//                                }
//                                ?>
                                <tr>

                                    <td>{{!empty($val->groupInfo && $val->groupInfo->name) ? $val->groupInfo->name: ''}}</td>
                                    <td>{{!empty($val->groupInfo && $val->groupInfo->type) ? $val->groupInfo->type: ''}}</td>
                                    <td>
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="">
                                                    <span class="fa fa-{{!empty($val->accountInfo && $val->accountInfo->type) ? $val->accountInfo->type: ''}}"></span>
                                                    <img width="50" class="media-object img-circle" src="{{!empty($val->accountInfo && $val->accountInfo->avatar) ? $val->accountInfo->avatar: ''}}" alt="">
                                                </a>
                                            </div>
                                            <div class="media-body media-middle" style="width: 180px;">
                                                <h4 class="media-heading">{{!empty($val->accountInfo && $val->accountInfo->name) ? $val->accountInfo->name: ''}}</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{$val->post_text}}</td>
                                    <td>{{$val->sent_at}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td>No Record Found</td>
                                </tr>
                            @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <span class="pull-right">{{ $data->links() }}</span>
    </div>
    <script type="text/javascript">
        $(function() {
            $('#datetimepicker1').datetimepicker({
                language: 'pt-BR'
            });
        });
    </script>
@endsection
