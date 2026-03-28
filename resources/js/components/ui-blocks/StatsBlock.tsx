import { UiBlock } from '@/types/ui-block';

interface StatsBlockProps {
    block: UiBlock;
}

export default function StatsBlock({ block }: StatsBlockProps) {
    const content = block.content || {};
    
    return (
        <div className="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
            <h3 className="text-xl font-semibold text-gray-900 mb-6">{block.title}</h3>
            {content.description && (
                <p className="text-gray-600 mb-6">{content.description}</p>
            )}
            {content.stats && Array.isArray(content.stats) && (
                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    {content.stats.map((stat: any, index: number) => (
                        <div key={index} className="text-center">
                            <div className="text-3xl font-bold text-blue-600 mb-2">
                                {stat.value}
                            </div>
                            <div className="text-sm font-medium text-gray-900 mb-1">
                                {stat.label}
                            </div>
                            {stat.description && (
                                <div className="text-xs text-gray-500">
                                    {stat.description}
                                </div>
                            )}
                        </div>
                    ))}
                </div>
            )}
        </div>
    );
}
