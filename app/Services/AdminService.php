<?php

namespace App\Services;

use App\Models\UiBlock;

class AdminService
{
    /**
     * Store a new UI block
     */
    public function storeBlock(array $data): UiBlock
    {
        $data['content'] = json_decode($data['content'], true);
        $data['order'] = UiBlock::max('order') + 1;
        
        return UiBlock::create($data);
    }

    /**
     * Update an existing UI block
     */
    public function updateBlock(UiBlock $block, array $data): UiBlock
    {
        $data['content'] = json_decode($data['content'], true);
        $block->update($data);
        
        return $block;
    }

    /**
     * Toggle the status of a UI block
     */
    public function toggleStatus(UiBlock $uiBlock, bool $isActive): UiBlock
    {
        $uiBlock->update(['is_active' => $isActive]);
        
        return $uiBlock;
    }

    /**
     * Delete a UI block
     */
    public function deleteBlock(UiBlock $uiBlock): bool
    {
        return $uiBlock->delete();
    }

    /**
     * Reorder a UI block
     */
    public function reorderBlock(UiBlock $uiBlock, string $direction): bool
    {
        if ($direction === 'up') {
            $previousBlock = UiBlock::where('order', '<', $uiBlock->order)
                ->orderBy('order', 'desc')
                ->first();

            if ($previousBlock) {
                $tempOrder = $uiBlock->order;
                $uiBlock->update(['order' => $previousBlock->order]);
                $previousBlock->update(['order' => $tempOrder]);
                return true;
            }
        } elseif ($direction === 'down') {
            $nextBlock = UiBlock::where('order', '>', $uiBlock->order)
                ->orderBy('order', 'asc')
                ->first();

            if ($nextBlock) {
                $tempOrder = $uiBlock->order;
                $uiBlock->update(['order' => $nextBlock->order]);
                $nextBlock->update(['order' => $tempOrder]);
                return true;
            }
        }

        return false;
    }

    /**
     * Get all UI blocks ordered by their order field
     */
    public function getAllBlocks()
    {
        return UiBlock::orderBy('order')->get();
    }
}
