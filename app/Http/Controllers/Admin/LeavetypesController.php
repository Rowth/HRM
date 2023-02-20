<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Reply;
use App\Http\Controllers\AdminBaseController;
use App\Http\Requests\Admin\LeaveType\DeleteRequest;
use App\Http\Requests\Admin\LeaveType\StoreRequest;
use App\Http\Requests\Admin\LeaveType\UpdateRequest;
use App\Models\Leavetype;
// use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\Facades\DataTables;

/**
 * Class LeavetypesController
 * @package App\Http\Controllers\Admin
 */
class LeavetypesController extends AdminBaseController
{


    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = 'LeaveType';
        $this->attendanceOpen = 'active';
        $this->leaveTypeActive = 'active open';
        $this->pageTitle = trans('pages.awards.indexTitle');
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $this->leaveTypes = Leavetype::all();
        return View::make('admin.leavetypes.index', $this->data);
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function ajaxLeaveType()
    {
        $result = Leavetype::select('id', 'leaveType', 'num_of_leave', 'status');
        return DataTables::of($result)
            ->editColumn('status', function ($row) {
                $color = ['active' => 'success', 'inactive' => 'danger'];

                return "<span id='status{$row->id}' class='label label-{$color[$row->status]}'>" . trans("core." . $row->status) . "</span>";
            })->addColumn('edit', function ($row) {
                $display_accept = '';
                $display_reject = '';

                if ($row->status == 'inactive') {
                    $display_reject = 'style="display:none"';
                } elseif ($row->status == 'active') {
                    $display_accept = 'style="display:none"';
                }
                $string = '';
                $accept = '<a ' . $display_accept . ' id="acive' . $row->id . '"  data-container="body" data-placement="top" data-original-title="Active" href="javascript:;" onclick="changeStatus(' . $row->id . ',\'active\');return false;" class="btn green btn-sm tooltips margin-bottom-10"><i class="fa fa-check"></i> Active</a>';
                $reject = '<a ' . $display_reject . ' id="inactive' . $row->id . '" data-placement="top" data-original-title="Inactive"  href="javascript:;" onclick="changeStatus(' . $row->id . ',\'inactive\');return false;" class="btn red btn-sm tooltips margin-bottom-10"><i class="fa fa-close"></i> Inactive</a>';
                $string .= '' . $accept . $reject . '';

                $string .= '<a  class="btn purple btn-sm margin-bottom-10"  onclick="showEdit(' . $row->id . ',\'' . addslashes($row->leaveType) . '\',\'' . $row->num_of_leave . '\')"><i class="fa fa-edit"></i> <span class="hidden-sm hidden-xs">' . trans("core.btnViewEdit") . '</span></a>
                <a href="javascript:;" onclick="del(' . $row->id . ',\'' . $row->leaveType . '\')" class="btn red btn-sm margin-bottom-10">
                <i class="fa fa-trash"></i> <span class="hidden-sm hidden-xs">' . trans("core.btnDelete") . '</span></a>';

                return $string;
                // return '<a  class="btn purple btn-sm margin-bottom-10"  onclick="showEdit(' . $row->id . ',\'' . addslashes($row->leaveType) . '\',\'' . $row->num_of_leave . '\')"><i class="fa fa-edit"></i> <span class="hidden-sm hidden-xs">' . trans("core.btnViewEdit") . '</span></a>
                //           <a href="javascript:;" onclick="del(' . $row->id . ',\'' . $row->leaveType . '\')" class="btn red btn-sm margin-bottom-10">
                //         <i class="fa fa-trash"></i> <span class="hidden-sm hidden-xs">' . trans("core.btnDelete") . '</span></a>';
            })
            ->removeColumn('id')
            ->rawColumns(['edit', 'status'])
            ->escapeColumns(['edit'])
            ->make();
    }

    /**
     * @param CreateRequest $request
     * @return array
     */

    public function change_status(Request $request, $id)
    {
        $leave = Leavetype::findOrFail($id);
        $leave->status = $request->status;
        $leave->save();
        
        return Reply::success("messages.leaveStatusChangeMessage");
    }

    public function store(StoreRequest $request)
    {
        Leavetype::create($request->toArray());

        return Reply::success('Leave Type added successfully');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $this->leavetype = Leavetype::find($id);
        return View::make('admin.leavetypes.edit', $this->data);
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return View::make('admin.leavetypes.create');
    }

    /**
     * @param UpdateRequest $request
     * @param $id
     * @return array
     */
    public function update(UpdateRequest $request, $id)
    {
        $leavetype = Leavetype::findOrFail($id);
        $leavetype->update($request->toArray());
        return Reply::success('Leavetype updated successfully');
    }

    /**
     * @param DeleteRequest $request
     * @param $id
     * @return array
     */
    public function destroy(DeleteRequest $request, $id)
    {
        Leavetype::destroy($id);

        return Reply::success('messages.leaveTypeDeleteMessage');
    }
}
