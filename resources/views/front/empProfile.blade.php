@extends('front.layouts.frontlayout')

@section('head')

    {{--{!! HTML::style("assets/global/css/components.css")!!}--}}
    {!! HTML::style("assets/global/css/plugins.css")!!}
    {!! HTML::style("assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css")!!}
    {!!  HTML::style('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')!!}

@stop

@section('mainarea')
    <div class="col-md-9">
        <!--Profile Body-->
        <div class="profile-body">
            <div class="row">
        
 

                </div><!--/end row-->


                <div class="col-sm-12 ">
                    <div class="panel panel-profile no-bg">
                        <div class="panel-heading overflow-h  service-block-u">
                            <h2 class="panel-title heading-sm pull-left">@lang('core.documents')</h2>
                        </div>
                        <!-- @if($documents['resume1'] == 0 || $documents['offerLetter'] == 0 || $documents['joiningLetter'] == 0
                        ||$documents['contract'] == 0 || $documents['IDProof'] == 0 ) -->
                        <div class="actions">
                            <button onclick="UpdateDetails('{!! $employee->id !!}','documents')"

                                    class="btn btn-sm btn-success ">
                                <i class="fa fa-save"></i> {{trans('core.btnDocuments')}} </button>
                        </div>
                        <!-- @endif -->

                        <div class="panel-body panelHolder">
                        <div class="portlet-body">
                        <div class="portlet-body">
                            {{--------------------Documents Info Form--------------------------------------------}}

                            {!! Form::open(['method' => 'POST','route'=> ['front.profileemppost',$employee->employeeID ],'class'   =>  'form-horizontal','id'  =>  'documents_details_form','files'=>true])!!}

                            <input type="hidden" name="updateType" class="form-control" value="documents">


                            <div class="form-body">
                                <!-- <div class="form-group">
                                    <label class="control-label col-md-2">{{trans('core.resume')}}</label>

                                    <div class="col-md-5">
                                    @if(isset($documents['resume1'] ) && $documents['resume1'] == 2 || $documents['resume1'] == 0)

                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="input-group input-large">
                                                <div class="form-control uneditable-input" data-trigger="fileinput">
                                                    <i class="fa fa-file fileinput-exists"></i>&nbsp; <span
                                                            class="fileinput-filename">
												</span>
                                                </div>
                                                <span class="input-group-addon btn default btn-file">
												<span class="fileinput-new">
													{{trans('core.selectFile')}} </span>
												<span class="fileinput-exists">
													{{trans('core.change')}} </span>
												<input type="file" name="resume">

											</span>
                                                <a href="#" class="input-group-addon btn red fileinput-exists"
                                                   data-dismiss="fileinput">
                                                    {{trans('core.remove')}} </a>
                                            </div>
                                        </div>
                                        @endif

                                    </div>
                                    <div class="col-md-3">
                                        @if(isset($documents['resume']) && $documents['resume'] != '')
                                            <a href="{{$documents['resume']}}"
                                               target="_blank" class="btn btn-sm purple">@lang("core.viewResume")</a>
                                        @endif

                                    </div>
                                </div> -->
                           

                                <div class="form-group">
                                    <label class="control-label col-md-2">@lang("core.offerLetter")</label>

                                    <div class="col-md-5">
                                    @if(isset($documents['offerLetter1'] ) && $documents['offerLetter1'] == 0 || $documents['offerLetter1'] == 2)

                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="input-group input-large">
                                                <div class="form-control uneditable-input" data-trigger="fileinput">
                                                    <i class="fa fa-file fileinput-exists"></i>&nbsp; <span
                                                            class="fileinput-filename">
												</span>
                                                </div>
                                                <span class="input-group-addon btn default btn-file">
												<span class="fileinput-new">
													{{trans('core.selectFile')}} </span>
												<span class="fileinput-exists">
													{{trans('core.change')}} </span>
												<input type="file" name="offerLetter">
											</span>
                                                <a href="#" class="input-group-addon btn red fileinput-exists"
                                                   data-dismiss="fileinput">
                                                    {{trans('core.remove')}} </a>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-md-3">
                                        @if(isset($documents['offerLetter'])  && $documents['offerLetter'] != '')
                                            <a  href="{{$documents['offerLetter']}} "
                                               target="_blank" class="btn btn-sm purple">@lang("core.viewOfferLetter")</a>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">@lang("core.joiningLetter")</label>

                                    <div class="col-md-5">
                                    @if(isset($documents['joiningLetter1'] ) && $documents['joiningLetter1'] == 0 || $documents['joiningLetter1'] == 2)

                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="input-group input-large">
                                                <div class="form-control uneditable-input" data-trigger="fileinput">
                                                    <i class="fa fa-file fileinput-exists"></i>&nbsp; <span
                                                            class="fileinput-filename">
												</span>
                                                </div>
                                                <span class="input-group-addon btn default btn-file">
												<span class="fileinput-new">
													{{trans('core.selectFile')}} </span>
												<span class="fileinput-exists">
													{{trans('core.change')}} </span>
												<input type="file" name="joiningLetter">
											</span>
                                                <a href="#" class="input-group-addon btn red fileinput-exists"
                                                   data-dismiss="fileinput">
                                                    {{trans('core.remove')}} </a>
                                            </div>
                                        </div>
                                        @endif

                                    </div>
                                    <div class="col-md-3">
                                        @if(isset($documents['joiningLetter']) && $documents['joiningLetter'] != '')
                                            <a  href="{{$documents['joiningLetter']}}"
                                               target="_blank" class="btn btn-sm purple">@lang("core.viewJoiningLetter")</a>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2">@lang("core.contractOrAgreement")</label>

                                    <div class="col-md-5">
                                    @if(isset($documents['contract1'] ) && $documents['contract1'] == 0 || $documents['contract1'] == 2)

                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="input-group input-large">
                                                <div class="form-control uneditable-input" data-trigger="fileinput">
                                                    <i class="fa fa-file fileinput-exists"></i>&nbsp; <span
                                                            class="fileinput-filename">
												</span>
                                                </div>
                                                <span class="input-group-addon btn default btn-file">
												<span class="fileinput-new">
													{{trans('core.selectFile')}} </span>
												<span class="fileinput-exists">
													{{trans('core.change')}} </span>
												<input type="file" name="contract">
											</span>
                                                <a href="#" class="input-group-addon btn red fileinput-exists"
                                                   data-dismiss="fileinput">
                                                    {{trans('core.remove')}} </a>
                                            </div>
                                        </div>
                                        @endif

                                    </div>
                                    <div class="col-md-3">
                                        @if(isset($documents['contract']) && $documents['contract'] != '')
                                            <a  href="{{$documents['contract']}}"
                                               target="_blank"
                                               class="btn btn-sm purple">@lang("core.viewContractOrAgreement")</a>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2">@lang("core.idProof")</label>

                                    <div class="col-md-5">
                                    @if(isset($documents['IDProof1'] ) && $documents['IDProof1'] == 0 || $documents['IDProof1'] == 2)

                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="input-group input-large">
                                                <div class="form-control uneditable-input" data-trigger="fileinput">
                                                    <i class="fa fa-file fileinput-exists"></i>&nbsp; <span
                                                            class="fileinput-filename">
												</span>
                                                </div>
                                                <span class="input-group-addon btn default btn-file">
												<span class="fileinput-new">
													{{trans('core.selectFile')}} </span>
												<span class="fileinput-exists">
													{{trans('core.change')}} </span>
												<input type="file" name="IDProof">
											</span>
                                                <a href="#" class="input-group-addon btn red fileinput-exists"
                                                   data-dismiss="fileinput">
                                                    {{trans('core.remove')}} </a>
                                            </div>
                                        </div>
                                        @endif

                                    </div>
                                    <div class="col-md-3">
                                        @if(isset($documents['IDProof'])  && $documents['IDProof'] != '')
                                            <a  href="{{$documents['IDProof']}}"
                                               target="_blank" class="btn btn-sm purple">@lang("core.viewIDProof")</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}

                        </div>
                    </div>
                        </div>
                    </div>
                </div>


            </div> 
            <!--End Profile Body-->
        </div>

    </div>

 

@stop



@section('footerjs')


    <!-- BEGIN PAGE LEVEL PLUGINS -->
    {!! HTML::script('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')!!} 

    <!-- END PAGE LEVEL PLUGINS -->
    <script>
      
    
        // Javascript function to update the company info and Bank Info
        function UpdateDetails(id, type) {   
            var form_id = '#' + type + '_details_form';
            var alert_div = '#' + type + '_alert';

            var url = "{{ route('front.profileemppost',':id') }}";
            url = url.replace(':id', id); 
            $.easyAjax({
                type: 'POST',
                url: url,
                container: form_id,
                file: true,
                alertDiv: alert_div
            });
        }

    </script>
<style>
    .fileinput .input-group {
        display:flex!important;
        align-items: baseline;
        
    }
    .btn-block,.all-button ,button ,.input-group-addon{
        border-radius: 2rem !important;
        font-size: 1.55rem;
        color: white!important;
        background-color: orange!important;
        border-color: orange!important;
        width: auto!important;
    }
</style>

@stop
