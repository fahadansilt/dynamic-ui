import { PlaceholderPattern } from '@/components/ui/placeholder-pattern';
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem, NavItem } from '@/types';
import { Head } from '@inertiajs/react';
import { UiBlock } from '@/types/ui-block';
import DynamicBlockRenderer from '@/components/ui-blocks/DynamicBlockRenderer';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: route('home'),
    },
];

interface DashboardProps {
    uiBlocks: UiBlock[];
}

const navItem: NavItem[] = [
    {
        title: 'Dashboard',
        url: route('home'),
    },
];

export default function Dashboard({ uiBlocks = [] }: DashboardProps) {
    return (
        <AppLayout breadcrumbs={breadcrumbs} navItem={navItem}>
            <Head title="Dashboard" />
            <div className="flex h-full flex-1 flex-col gap-6 rounded-xl p-4">
                {uiBlocks.length > 0 ? (
                    <div className="space-y-6">
                        {uiBlocks.map((block) => (
                            <div key={block.id} className="w-full">
                                <DynamicBlockRenderer block={block} />
                            </div>
                        ))}
                    </div>
                ) : (
                    <div className="border-sidebar-border/70 dark:border-sidebar-border relative min-h-[50vh] flex-1 rounded-xl border md:min-h-min flex items-center justify-center">
                        <div className="text-center">
                            <PlaceholderPattern className="absolute inset-0 size-full stroke-neutral-900/20 dark:stroke-neutral-100/20" />
                            <div className="relative z-10">
                                <h3 className="text-lg font-medium text-gray-900 mb-2">No UI Blocks Configured</h3>
                                <p className="text-gray-600">Contact your administrator to configure UI blocks for this dashboard.</p>
                            </div>
                        </div>
                    </div>
                )}
            </div>
        </AppLayout>
    );
}
