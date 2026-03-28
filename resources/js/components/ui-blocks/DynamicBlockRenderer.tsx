import { UiBlock } from '@/types/ui-block';
import BannerBlock from './BannerBlock';
import CardBlock from './CardBlock';
import ListBlock from './ListBlock';
import StatsBlock from './StatsBlock';

interface DynamicBlockRendererProps {
    block: UiBlock;
}

export default function DynamicBlockRenderer({ block }: DynamicBlockRendererProps) {
    if (!block.is_active) {
        return null;
    }

    switch (block.type) {
        case 'banner':
            return <BannerBlock block={block} />;
        case 'card':
            return <CardBlock block={block} />;
        case 'list':
            return <ListBlock block={block} />;
        case 'stats':
            return <StatsBlock block={block} />;
        default:
            return (
                <div className="bg-gray-100 p-4 rounded-lg border-2 border-dashed border-gray-300">
                    <p className="text-gray-600">Unknown block type: {block.type}</p>
                </div>
            );
    }
}
