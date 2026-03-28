import { PlaceholderPattern } from '@/components/ui/placeholder-pattern';
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem, NavItem } from '@/types';
import { Head, Link, router } from '@inertiajs/react';
import { UiBlock } from '@/types/ui-block';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: route('admin.dashboard'),
    },
];

interface useProps {
    uiBlocks: UiBlock[];
}

export default function Dashboard({ uiBlocks }: useProps) {
    const toggleStatus = (block: UiBlock) => {
        router.put(route('admin.toggle-status', block.id), {
            is_active: !block.is_active
        });
    };

    const deleteBlock = (block: UiBlock) => {
        if (confirm('Are you sure you want to delete this block?')) {
            router.delete(route('admin.delete-block', block.id));
        }
    };

    const moveUp = (block: UiBlock) => {
        router.put(route('admin.reorder-block', block.id), {
            direction: 'up'
        });
    };

    const moveDown = (block: UiBlock) => {
        router.put(route('admin.reorder-block', block.id), {
            direction: 'down'
        });
    };

    const navItem: NavItem[] = [
        {
            title: 'Dashboard',
            url: route('admin.dashboard'),
        },
    ];
    return (
        <AppLayout breadcrumbs={breadcrumbs} navItem={navItem}>
            <Head title="Dashboard" />
            <div className="flex justify-end p-2 g-5 mt-4 pe-5">
                <Link type='button' href={route('admin.add-block')} className="bg-white p-1 text-black border-2 rounded-md hover:bg-gray- transition">
                    Add Block
                </Link>
            </div>
            <div className="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
                <div
                    className="border-sidebar-border/70 p-4 dark:border-sidebar-border relative min-h-[100vh] flex-1 rounded-xl border md:min-h-min">
                    <table className="w-full border ">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Order</th>
                            <th>Actions</th>
                        </tr>
                        </thead>

                        <tbody>
                        {uiBlocks.map((block) => (
                            <tr key={block.id} className="border-t">
                                <td className='text-center'>{block.title}</td>
                                <td className='text-center'>{block.type}</td>
                                <td className='text-center'>
                                    <button
                                        onClick={() => toggleStatus(block)}
                                        className={block.is_active ? 'text-green-600' : 'text-red-600'}
                                    >
                                        {block.is_active ? 'Active' : 'Inactive'}
                                    </button>
                                </td>
                                <td className='text-center'>{block.order}</td>
                                <td className='text-center'>
                                    <div className="flex justify-center gap-2">
                                        <Link
                                            href={route('admin.edit-block', block.id)}
                                            className="text-blue-600 hover:text-blue-800"
                                        >
                                            Edit
                                        </Link>
                                        <button
                                            onClick={() => deleteBlock(block)}
                                            className="text-red-600 hover:text-red-800"
                                        >
                                            Delete
                                        </button>
                                        <button
                                            onClick={() => moveUp(block)}
                                            className="text-gray-600 hover:text-gray-800"
                                            disabled={block.order === 1}
                                        >
                                            ↑
                                        </button>
                                        <button
                                            onClick={() => moveDown(block)}
                                            className="text-gray-600 hover:text-gray-800"
                                        >
                                            ↓
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        ))}
                        </tbody>
                    </table>
                </div>
            </div>
        </AppLayout>
    );
};
