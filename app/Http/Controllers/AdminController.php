<?php

namespace App\Http\Controllers;

use App\Constants\ElementConstant;
use App\Models\ui_blocks;
use App\Models\UiBlock;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function dashboard()
    {
        return inertia::render('admin/dashboard', [
            'uiBlocks' => UiBlock::orderBy('order')->get()
        ]);
    }

    function addBlock()
    {
        return Inertia::render('admin/add-block', [
            'elements' => ElementConstant::Elements
        ]);
    }

    function storeBlock()
    {
        $data = request()->validate([
            'title' => 'required|string',
            'type' => 'required|string',
            'is_active' => 'boolean',
            'content' => 'required|string'
        ]);

        $data['content'] = json_decode($data['content'], true);
        $data['order'] = UiBlock::max('order') + 1;
        UiBlock::create($data);
        return to_route('admin.dashboard');
    }

    function editBlock(UiBlock $uiBlock)
    {
        return Inertia::render('admin/add-block', [
            'elements' => ElementConstant::Elements,
            'block' => $uiBlock
        ]);
    }

    function updateBlock(UiBlock $block)
    {
        $data = request()->validate([
            'title' => 'required|string',
            'type' => 'required|string',
            'is_active' => 'boolean',
            'content' => 'required'
        ]);
        $data['content'] = json_decode($data['content'], true);
        $block->update($data);
        return to_route('admin.dashboard');
    }

    function toggleStatus(UiBlock $uiBlock)
    {
        $uiBlock->update([
            'is_active' => request('is_active')
        ]);
        return to_route('admin.dashboard');
    }

    function deleteBlock(UiBlock $uiBlock)
    {
        $uiBlock->delete();
        return to_route('admin.dashboard');
    }

    function reorderBlock(UiBlock $uiBlock)
    {
        $direction = request('direction');

        if ($direction === 'up') {
            $previousBlock = UiBlock::where('order', '<', $uiBlock->order)
                ->orderBy('order', 'desc')
                ->first();

            if ($previousBlock) {
                $tempOrder = $uiBlock->order;
                $uiBlock->update(['order' => $previousBlock->order]);
                $previousBlock->update(['order' => $tempOrder]);
            }
        } elseif ($direction === 'down') {
            $nextBlock = UiBlock::where('order', '>', $uiBlock->order)
                ->orderBy('order', 'asc')
                ->first();

            if ($nextBlock) {
                $tempOrder = $uiBlock->order;
                $uiBlock->update(['order' => $nextBlock->order]);
                $nextBlock->update(['order' => $tempOrder]);
            }
        }

        return redirect()->route('admin.dashboard')->with('success', 'Block order updated successfully');
    }
}
