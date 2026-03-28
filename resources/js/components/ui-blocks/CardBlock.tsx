import { UiBlock } from '@/types/ui-block';

interface CardBlockProps {
    block: UiBlock;
}

export default function CardBlock({ block }: CardBlockProps) {
    const content = block.content || {};
    
    return (
        <div className="bg-white rounded-lg shadow-md p-6 border border-gray-200 hover:shadow-lg transition-shadow">
            <div className="flex items-start justify-between">
                <div className="flex-1">
                    <h3 className="text-xl font-semibold text-gray-900 mb-2">{block.title}</h3>
                    {content.description && (
                        <p className="text-gray-600 mb-4">{content.description}</p>
                    )}
                    {content.features && Array.isArray(content.features) && (
                        <ul className="space-y-2 mb-4">
                            {content.features.map((feature: string, index: number) => (
                                <li key={index} className="flex items-center text-sm text-gray-700">
                                    <span className="w-2 h-2 bg-blue-500 rounded-full mr-3"></span>
                                    {feature}
                                </li>
                            ))}
                        </ul>
                    )}
                </div>
                {content.icon && (
                    <div className="ml-4 text-3xl">{content.icon}</div>
                )}
            </div>
            {content.buttonText && content.buttonUrl && (
                <a
                    href={content.buttonUrl}
                    className="inline-block w-full text-center bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition-colors"
                >
                    {content.buttonText}
                </a>
            )}
        </div>
    );
}
