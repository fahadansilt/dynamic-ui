<?php

namespace App\Http\Controllers;

use App\Constants\ElementConstant;
use App\Http\Requests\ReorderBlockRequest;
use App\Http\Requests\StoreBlockRequest;
use App\Http\Requests\ToggleStatusRequest;
use App\Http\Requests\UpdateBlockRequest;
use App\Models\UiBlock;
use App\Services\AdminService;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function __construct(public AdminService $adminService)
    {}

    public function dashboard()
    {
        return inertia::render('admin/dashboard', [
            'uiBlocks' => $this->adminService->getAllBlocks()
        ]);
    }

    function addBlock()
    {
        return Inertia::render('admin/add-block', [
            'elements' => ElementConstant::Elements
        ]);
    }

    function storeBlock(StoreBlockRequest $storeBlockRequest)
    {
        $this->adminService->storeBlock($storeBlockRequest->validated());
        return to_route('admin.dashboard');
    }

    function editBlock(UiBlock $uiBlock)
    {
        return Inertia::render('admin/add-block', [
            'elements' => ElementConstant::Elements,
            'block' => $uiBlock
        ]);
    }

    function updateBlock(UpdateBlockRequest $updateBlockRequest, UiBlock $block)
    {
        $this->adminService->updateBlock($block, $updateBlockRequest->validated());
        return to_route('admin.dashboard');
    }

    function toggleStatus(ToggleStatusRequest $toggleStatusRequest, UiBlock $uiBlock)
    {
        $this->adminService->toggleStatus($uiBlock, $toggleStatusRequest->validated()['is_active']);
        return to_route('admin.dashboard');
    }

    function deleteBlock(UiBlock $uiBlock)
    {
        $this->adminService->deleteBlock($uiBlock);
        return to_route('admin.dashboard');
    }

    function reorderBlock(ReorderBlockRequest $reorderBlockRequest, UiBlock $uiBlock)
    {
        $success = $this->adminService->reorderBlock($uiBlock, $reorderBlockRequest->validated()['direction']);

        $message = $success ? 'Block order updated successfully' : 'Unable to reorder block';
        return redirect()->route('admin.dashboard')->with('success', $message);
    }
}
