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

export type ImageProductOrderProps = {
    id: number;
    url: string;
    product_id: number;
}

export type ProductOrderProps = {
    id: number;
    name: string;
    short_description: string;
    pivot: {
        order_id: number;
        product_id: number;
        price_unit: number;
        subtotal: number;
        quantity: number;
        size_id: number;
        color_id: number;
        size: {
            id: number;
            name: string;
        },
        color: {
            id: number;
            name: string;
        }
    },
    image: ImageProductOrderProps[]
}

export type OrderProps = {
    id: number;
    user_id: number;
    shipping_cost: number;
    discount_amount: number;
    cupom_code: string | null;
    total_price: number;
    order_code: string;
    payment_method: string;
    paid_at: string | null;
    id_transition: string;
    shipping_method: string;
    tracking_code: string | null;
    status: string;
    created_at: string;
    updated_at: string;
    product: ProductOrderProps[];
    user: {
        name: string;
        id: number;
    },
    address: AddressProps;
}

export type ImageProps = {
    id: number;
    url: string;
    product_id: number;
}

export type SizeProps = {
    id: number;
    name: string;
    product_id: number;
}

export type ColorProps = {
    id: number;
    name: string;
    color: string;
    product_id: number;
}

export type ProductProps = {
    id: number;
    name: string;
    available: boolean,
    price: string;
    description: string;
    short_description: string;
    created_at: string | null;
    updated_at: string | null;
    total_reviews: number;
    review_avg_star: number | null;
    image: ImageProps[],
    color: ColorProps[],
    size: SizeProps[],
    review: ReviewProps[]
}

export type ReviewProps = {
    id: number;
    describe: string;
    star: string;
    product_id: string;
}

export type CartProps = {
    id: number;
    quantity: number;
    created_at: string;
    updated_at: string;
    size_id: number;
    color_id: number;
    product: {
        id: number;
        name: string;
        available: boolean;
        price: string;
        short_description: string;
        image: ImageProps[]
    }
}

export type AddressProps = {
    label: string;
    id: number;
    city: string;
    number: number;
    zipcode: string;
    street: string;
    obs: string | null;
    created_at: string;
    updated_at: string;
    user_id: number;
    state: string;
}
