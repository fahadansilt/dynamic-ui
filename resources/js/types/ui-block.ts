export interface UiBlock{
    id: number;
    title: string;
    type: 'banner' | 'card' | 'list' | 'stats';
    is_active: boolean;
    order: number;
    content?: Record<string, any>;
}
