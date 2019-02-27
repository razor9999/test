@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.influencer.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.influencer.fields.name')</th>
                            <td field-key='name'>{{ $influencer->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.influencer.fields.phone')</th>
                            <td field-key='phone'>{{ $influencer->phone }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.influencer.fields.nick-name')</th>
                            <td field-key='nick_name'>{{ $influencer->nick_name }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.influencers.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop


