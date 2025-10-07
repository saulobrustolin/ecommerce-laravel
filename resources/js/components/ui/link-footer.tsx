type LinkFooterProps = {
    href: string,
    children: React.ReactNode
}

export default function LinkFooter({ href, children }: LinkFooterProps) {
    return (
        <a 
            href={href}
            className="text-sm text-white/75 uppercase hover:underline hover:underline-offset-2 hover:text-white transition-colors duration-150"
        >
            {children}
        </a>
    )
}