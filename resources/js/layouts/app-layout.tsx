import AppDefaultTemplate from '@/layouts/app/app-default-layout';
import { type ReactNode } from 'react';
import { Toaster } from 'sonner';

interface AppDefaultProps {
    children: ReactNode,
    sticky?: boolean,
    className?: string,
}

export default ({ children, sticky, className, ...props }: AppDefaultProps) => (
    <AppDefaultTemplate sticky={sticky} className={className} {...props}>
        {children}
        <Toaster/>
    </AppDefaultTemplate>
);
