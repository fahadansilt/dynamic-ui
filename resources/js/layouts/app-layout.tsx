import AppLayoutTemplate from '@/layouts/app/app-sidebar-layout';
import { type BreadcrumbItem, NavItem } from '@/types';

interface AppLayoutProps {
    children: React.ReactNode;
    breadcrumbs?: BreadcrumbItem[];
    navItem: NavItem[]
}

export default ({ children, breadcrumbs, navItem, ...props }: AppLayoutProps) => (
    <AppLayoutTemplate breadcrumbs={breadcrumbs} navItems={navItem} {...props}>
        {children}
    </AppLayoutTemplate>
);
