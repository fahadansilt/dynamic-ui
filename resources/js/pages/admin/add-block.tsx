import { PlaceholderPattern } from '@/components/ui/placeholder-pattern';
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, router, useForm } from '@inertiajs/react';
import { UiBlock } from '@/types/ui-block';
import { BlockType } from '@/types/block-type';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: route('admin.dashboard'),
    },
];

interface prop {
    block: UiBlock,
    elements: BlockType
}
export default function AddBlock({block, elements} : prop) {
    const {data, setData} = useForm({
        title: block?.title || '',
        type: block?.type || 'banner',
        is_active: block?.is_active ?? true,
        content: JSON.stringify(block?.content || {}, null, 2), // string
    })

    const submit = () => {
        if (block) {
            router.put(route('admin.update-block', {
                id: block.id
            }), data);
        } else {
            router.post(route('admin.store-block'), data);
        }
    };


    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Add Block" />
            <div className="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
                <div
                    className="border-sidebar-border/70 p-4 dark:border-sidebar-border relative min-h-[100vh] flex-1 rounded-xl border md:min-h-min">
                    <div className="p-6 max-w-xl">
                        <h1 className="text-xl font-bold mb-4">
                            {block ? 'Edit Block' : 'Create Block'}
                        </h1>


                        <input
                            type="text"
                            placeholder="Title"
                            value={data.title}
                            onChange={(e) => setData('title', e.target.value)}
                            className="border w-full mb-3 p-2"
                        />

                        <select
                            value={data.type}
                            onChange={(e) => setData('type', e.target.value as "banner" | "card" | "list" | "stats")}
                            className="border w-full mb-3 p-2"
                        >
                            {elements.map((type) => (
                                    <option key={type} value={type}>{type}</option>
                                ))}
                        </select>

                        <label className="flex items-center gap-2 mb-3">
                            <input
                                type="checkbox"
                                checked={data.is_active}
                                onChange={(e) => setData('is_active', e.target.checked)}
                            />
                            Active
                        </label>

                        <textarea
                            placeholder="Content (JSON)"
                            value={data.content}
                            onChange={(e) => setData('content', e.target.value)}
                            className="border w-full mb-3 p-2 min-h-[100px]"
                        />

                        <button
                            type="submit"
                            onClick={submit}
                            className="bg-white p-4 py-2 text-black border-2 rounded-md hover:bg-gray-200 transition"
                        >
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </AppLayout>
    );
};
