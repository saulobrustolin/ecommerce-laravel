import AppDefaultTemplate from '@/layouts/app/app-default-layout';
import { type ReactNode } from 'react';

interface AppDefaultProps {
    children: ReactNode;
}

export default ({ children, ...props }: AppDefaultProps) => (
    <AppDefaultTemplate {...props}>
        {children}
    </AppDefaultTemplate>
);
