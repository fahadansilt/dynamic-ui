import { UiBlock } from '@/types/ui-block';

interface BannerBlockProps {
    block: UiBlock;
}

export default function BannerBlock({ block }: BannerBlockProps) {
    const content = block.content || {};
    
    return (
        <div className="bg-gradient-to-r from-blue-500 to-purple-600 text-white p-8 rounded-lg shadow-lg">
            <h2 className="text-3xl font-bold mb-4">{block.title}</h2>
            {content.subtitle && (
                <p className="text-xl mb-4">{content.subtitle}</p>
            )}
            {content.description && (
                <p className="text-lg opacity-90">{content.description}</p>
            )}
            {content.buttonText && content.buttonUrl && (
                <a
                    href={content.buttonUrl}
                    className="inline-block mt-6 bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors"
                >
                    {content.buttonText}
                </a>
            )}
        </div>
    );
}
