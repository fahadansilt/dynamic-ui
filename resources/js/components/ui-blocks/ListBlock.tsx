import { UiBlock } from '@/types/ui-block';

interface ListBlockProps {
    block: UiBlock;
}

export default function ListBlock({ block }: ListBlockProps) {
    const content = block.content || {};
    
    return (
        <div className="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
            <h3 className="text-xl font-semibold text-gray-900 mb-4">{block.title}</h3>
            {content.description && (
                <p className="text-gray-600 mb-4">{content.description}</p>
            )}
            {content.items && Array.isArray(content.items) && (
                <ul className="space-y-3">
                    {content.items.map((item: any, index: number) => (
                        <li key={index} className="flex items-start">
                            <span className="flex-shrink-0 w-6 h-6 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center text-sm font-medium mr-3 mt-0.5">
                                {index + 1}
                            </span>
                            <div className="flex-1">
                                {typeof item === 'string' ? (
                                    <span className="text-gray-700">{item}</span>
                                ) : (
                                    <>
                                        {item.title && (
                                            <h4 className="font-medium text-gray-900">{item.title}</h4>
                                        )}
                                        {item.description && (
                                            <p className="text-gray-600 text-sm mt-1">{item.description}</p>
                                        )}
                                    </>
                                )}
                            </div>
                        </li>
                    ))}
                </ul>
            )}
        </div>
    );
}
