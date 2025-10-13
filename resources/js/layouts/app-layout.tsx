import AppDefaultTemplate from '@/layouts/app/app-default-layout';
import { type ReactNode } from 'react';

interface AppDefaultProps {
    children: ReactNode,
    sticky?: boolean
}

export default ({ children, sticky, ...props }: AppDefaultProps) => (
    <AppDefaultTemplate sticky={sticky} {...props}>
        {children}
    </AppDefaultTemplate>
);
