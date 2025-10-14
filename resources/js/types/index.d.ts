import { InertiaLinkProps } from '@inertiajs/react';
import { LucideIcon } from 'lucide-react';

export interface Auth {
    user: User;
}

export interface BreadcrumbItem {
    title: string;
    href: string;
}

export interface NavGroup {
    title: string;
    items: NavItem[];
}

export interface NavItem {
    title: string;
    href: NonNullable<InertiaLinkProps['href']>;
    icon?: LucideIcon | null;
    isActive?: boolean;
}

export interface SharedData {
    name: string;
    quote: { message: string; author: string };
    auth: Auth;
    sidebarOpen: boolean;
    [key: string]: unknown;
}

export interface User {
    id: number;
    name: string;
    email: string;
    avatar?: string;
    email_verified_at: string | null;
    two_factor_enabled?: boolean;
    created_at: string;
    updated_at: string;
    [key: string]: unknown; // This allows for additional properties...
}

export type OrderProps = {
    id: number;
    total_price: number;
    payment_method: string;
    shipping_method: string;
    status: boolean,
    created_at: string
}

export type ImagesProps = {
    id: number;
    url: string;
}

export type ProductProps = {
    id: number;
    name: string;
    available: boolean,
    short_description: string;
    description: string;
    price: number;
    url: string;
    created_at: string | null;
    updated_at: string | null;
    images: ImagesProps[]
}
