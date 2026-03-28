import { AppContent } from '@/components/app-content';
import { AppShell } from '@/components/app-shell';
import { AppSidebar } from '@/components/app-sidebar';
import { AppSidebarHeader } from '@/components/app-sidebar-header';
import { type BreadcrumbItem, type NavItem } from '@/types';

interface AppSidebarLayoutProps {
    children: React.ReactNode;
    breadcrumbs?: BreadcrumbItem[];
    navItems: NavItem[];
}

export default function AppSidebarLayout({ children, breadcrumbs = [], navItems }: AppSidebarLayoutProps) {
    return (
        <AppShell variant="sidebar">
            <AppSidebar navItems={navItems} />
            <AppContent variant="sidebar">
                <AppSidebarHeader breadcrumbs={breadcrumbs} />
                {children}
            </AppContent>
        </AppShell>
    );
}
